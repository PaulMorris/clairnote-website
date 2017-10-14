/* (c) 2013-2017 Paul Morris */
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this file,
 * You can obtain one at http://mozilla.org/MPL/2.0/. */
// JavaScript Document
// version: 20161014

// ngs: Notation Game State
var ngs = (function () {
    "use strict";
    return {
        // NOTE: commented properties with //// are set lazily later

        // UI game selection state - needs defaults
        gameType: "keyboard",
        notesGameType: 0,
        intervalsGameType: 0,
        // number of target notes or intervals at a time on the staff
        targetsAtATime: 4,

        // internal game selection state
        //// noteSet: 0,
        //// noteSource: [],
        //// intervalSource: [],

        // UI-output visible current game state
        //// rightTally: 0,
        //// wrongTally: 0,
        //// totalTally: 0,

        // internal current game state
        gameIsOn: false,
        key: Math.floor(Math.random() * 12),
        currentTarget: 0,
        noteTargets: [],
        //// intervalTargets: [],
        //// firstTry: true,
        //// correctItemsOnStaff: 0,
        //// targetsOnStaff: 4,
        gameLeftMarginDefault: 4.3,

        // internal timers - no need for defaults
        //// feedbackTimer: undefined,
        //// staffTimer: undefined,
        //// targetsTimer: undefined,
        //// countdownTimer: undefined,

        // DOM nodes - needs defaults
        feedback: document.getElementById('feedback'),
        gameSelector: document.getElementById("gameSelector"),
        notesSubGameSelector: document.getElementById("notesSubGameSelector"),
        intervalsSubGameSelector: document.getElementById("intervalsSubGameSelector"),
        totalTallyElem: document.getElementById('totalTally'),
        countdownElem: document.getElementById("countdown"),
        staff2: document.getElementById("staff2"),
    };
}());


// tng: The Notation Game (functions)
var tng = (function () {
    "use strict";
    return {

        randomInteger: function (n) { return Math.floor(Math.random() * n); },

        // use with Array.map to transpose up an octave
        upAnOctave: function (num) { return num + 12; },

        changeKey: function () {
            // "keyChanges" limits us to key changes that contain
            // 3 or more new notes that weren't in the last key,
            // for better note coverage.
            var keyChanges = [4, 6, 9, 11];
            ngs.key = (ngs.key + keyChanges[tng.randomInteger(4)]) % 12;
            return ngs.key;
        },

        transposeToNewKey: function (notes, newkey) {
            // transposes the note numbers in array "notes" by number "newkey"
            // lowest and mod let us use modulo/remainder operator
            // by effectively shifting the series, so it's as if it started at 0
            var lowest = notes[0],
                highest = notes[notes.length - 1],
                mod = highest + 1 - lowest,
                newNotes = notes.map(function (note) {
                    return ((note - lowest + newkey) % mod) + lowest;
                });
            return newNotes;
        },

        // A function for testing, should be moved into proper tests eventually
        /*
        anyRepeats: function(ary) {
            var i;
            for (i = 3; i < ary.length; i += 1) {
                if (ary[i] === ary[i-1] ||
                    ary[i] === ary[i-2] ||
                    ary[i] === ary[i-3]) {
                    // console.log("repeats!");
                    return true;
                }
            }
            return false;
        },
        */

        // The order of the notes is randomized using a recursive function.
        // We avoid repeated notes, and actually make it so that the closest the same
        // note can be to itself is 3 notes between them. We have to stop
        // when there are only 3 notes left in the set to avoid chance of infinite recursion
        // if the only notes left to choose from happen to be the same as the last 3 notes loaded.

        pickRandom: function (src, last3) {
            // pick a value randomly from src and return its index if it is not in
            // last3 (the last 3 notes or intervals), else recurse and try again.
            var rnd = tng.randomInteger(src.length),
                n = src[rnd];
            if (last3.indexOf(n) === -1) {
                return rnd;
            }
            return tng.pickRandom(src, last3);
        },

        shuffle: function (ary, last3) {
            var i,
                oldAry = ary.slice(),
                len = oldAry.length - 3,
                newAry = last3.slice(),
                index;

            // randomize the order of notes.
            for (i = 0; i < len; i += 1) {
                // pick a semi-random note from oldAry, add it to newAry, remove it from oldAry
                index = tng.pickRandom(oldAry, newAry.slice(-3));
                newAry.push(oldAry[index]);
                oldAry.splice(index, 1);
            }

            // for testing purposes...
            // if (tng.anyRepeats(newAry)) { return tng.shuffle(ary, last3); }

            // don't return the first three items, they are already in the queue
            return newAry.slice(3);
        },

        getMoreTargets: function (source, last3) {
            // double up
            var newAry = source.slice().concat(source.slice());
            // randomize
            newAry = tng.shuffle(newAry, last3);
            return newAry;
        },

///////////////////////////////////

        // interval is the interval
        // lowNotes is the array to search for the lower note
        // highNotes is the array to search for the higher note
        getNoteForInterval: function (interval, lowNotes, highNotes) {
            // console.log("lowNotes: " + lowNotes + " highNotes: " + highNotes);
            var r = tng.randomInteger(lowNotes.length),
                lowNote = lowNotes[r];
            if (highNotes.indexOf(lowNote + interval) !== -1) {
                return lowNote;
            }
            lowNotes.splice(r, 1);
            if (lowNotes.length === 0) {
                // this should never happen, all intervals should always be
                // possible between some pair of notes from lowNotes and highNotes
                return false;
            }
            return tng.getNoteForInterval(interval, lowNotes, highNotes);
        },

        getNotesForIntervals: function (noteSource, intervals) {
            var lowNotes = tng.transposeToNewKey(noteSource.slice(), tng.changeKey()),
                highNotes = lowNotes.slice().concat(lowNotes.map(tng.upAnOctave)),
                i,
                moreNotes = [];

            // get notes to go with intervals
            for (i = 0; i < intervals.length; i += 1) {
                moreNotes[i] = tng.getNoteForInterval(intervals[i], lowNotes.slice(), highNotes.slice());
            }

            return moreNotes;
        },

/////////////////////////////////////

        // addMoreTargets refers either to addMoreNotes or addMoreIntervals
        addMoreTargets: null,

        addMoreNotes: function () {
            var source,
                newNotes;

            // for "all notes" games, change the key of the source notes
            if ([2, 5].indexOf(ngs.noteSet) !== -1) {
                source = tng.transposeToNewKey(ngs.noteSource, tng.changeKey());
            } else {
                source = ngs.noteSource;
            }

            newNotes = tng.getMoreTargets(source, ngs.noteTargets.slice(-3));

            if ([5].indexOf(ngs.noteSet) !== -1) {
                // for 2-octave, all notes, reduce length so we aren't in the same key too long
                newNotes = newNotes.slice(0, 14);
            }

            Array.prototype.push.apply(ngs.noteTargets, newNotes);
        },

        addMoreIntervals: function () {
            var newIntervals = tng.getMoreTargets(ngs.intervalSource, ngs.intervalTargets.slice(-3)),
                newNotes = tng.getNotesForIntervals(ngs.noteSource, newIntervals);

            Array.prototype.push.apply(ngs.noteTargets, newNotes);
            Array.prototype.push.apply(ngs.intervalTargets, newIntervals);
        },


        // displays a series of target notes/intervals chosen semi-randomly
        // targetsAtATime is the number of notes to show on the staff
        showTargets: function () {

            // if there aren't enough targets in noteTargets then get more
            if (ngs.noteTargets.length < ngs.currentTarget + 1 + ngs.targetsAtATime) {
                // do it twice so there are plenty (i.e. for '10 at a time')
                tng.addMoreTargets();
                tng.addMoreTargets();
            }

            var notes = ngs.noteTargets.slice(ngs.currentTarget, ngs.currentTarget + ngs.targetsAtATime),
                xPositions = avr.getNoteXPositions(ngs.targetsAtATime, ngs.gameLeftMarginDefault, avr.scaleXOffset),

                intervals = ngs.gameType !== "intervals" ? 0
                    : ngs.intervalTargets.slice(ngs.currentTarget, ngs.currentTarget + ngs.targetsAtATime),

                noteIds = avr.getNoteIds(ngs.targetsAtATime, 'staff1');

            ngs.targetsOnStaff = ngs.targetsAtATime;
            avr.drawNoteSeries(notes, xPositions, intervals, false, noteIds, 'staff1');
        },

        clearBothStaves: function () {
            avr.clearStaff("staff1");
            avr.clearStaff("staff2");
        },

      handleAttempt: function (correct, note, message, interval) {
            var id = 'staff2note' + (ngs.correctItemsOnStaff + 1),
                Xpos = (ngs.correctItemsOnStaff * avr.noteXOffsetDefault) + ngs.gameLeftMarginDefault;

            // if not the first attempt, clear the previous attempt
            if (!ngs.firstTry) {
                var nodes = [id, id + 'ledgers', id + 'caption'];
                nodes.forEach(avr.removeElement);
            }

            if (interval) {
                var note2 = note + interval;
                avr.playNote(note);
                avr.playNote(note2);
            } else {
                avr.playNote(note);
            }

            // caption
            var caption = avr.makeNoteCaption(
                [[message]],
                avr.noteCaption.cloneNode(),
                correct ? "font-weight: bold; fill: green;" : "font-weight: bold; fill: #E3701A;");

            var noteNodes = avr.getNoteSVG(note, Xpos, id, caption, interval);

            noteNodes.forEach( function (node) {
                ngs.staff2.appendChild(node);
            });

            if (correct) {
                ngs.firstTry = true;
                ngs.rightTally += 1;
                ngs.currentTarget += 1;
                ngs.correctItemsOnStaff += 1;
                ngs.feedbackTimer = setTimeout(avr.removeElement, 800, id + 'caption');

                // reload the target staff if needed
                if (ngs.correctItemsOnStaff >= ngs.targetsOnStaff) {
                    ngs.gameIsOn = false;
                    ngs.staffTimer = setTimeout(tng.clearBothStaves, 600);
                    ngs.targetsTimer = setTimeout(function () {
                            ngs.gameIsOn = true;
                            ngs.correctItemsOnStaff = 0;
                            tng.showTargets();
                        }, 850);
                }
            } else {
                // incorrect
                ngs.firstTry = false;
                ngs.wrongTally += 1;
            }
            tng.updateTally();
        },

        noteClicked: function (note) {
            if (!ngs.gameIsOn) {
                // if game is not on, let them play music
                avr.playNote(note);
                return;
            }
            var noteCaptions = ["G# / Ab", "A", "A# / Bb", "B", "C", "C# / Db",
                    "D", "D# / Eb", "E", "F", "F# / Gb", "G"],
                correct = note === ngs.noteTargets[ngs.currentTarget],
                message = correct ? "Yes! " + noteCaptions[note % 12]
                    : "Try again...";
                    // note < ngs.noteTargets[ngs.currentTarget] ? "Too low..." : "Too high...";

            tng.handleAttempt(correct, note, message, null);
        },

        noteFromTrumpetValves: function (valves, noteTarget) {
            var lookup = {
                    "•••": [32, 39], // e, b,
                    "•◦•": [33, 40], // f, c
                    "◦••": [34, 41, 46, 58],
                    "••◦": [35, 42, 47, 51, 59], // g, d, g, b, g
                    "•◦◦": [36, 43, 48, 52, 55, 60],
                    "◦•◦": [37, 44, 49, 53, 56, 61], // a, e, a, e, a
                    "◦◦◦": [38, 45, 50, 54, 57, 62]
                },
                valveMatches = lookup[valves];

            // return the closest note to the target note
            return valveMatches.reduce(function (prev, curr) {
                return Math.abs(prev - noteTarget) < Math.abs(curr - noteTarget) ? prev : curr;
            });
        },

        trumpetClicked: function (valves) {
            if (!ngs.gameIsOn) {
                // if game is not on, let them play the trumpet
                avr.playNote(tng.noteFromTrumpetValves(valves, 42));
                return;
            }
            var noteCaptions = ["G# / Ab", "A", "A# / Bb", "B", "C",
                    "C# / Db", "D", "D# / Eb", "E", "F", "F# / Gb", "G"],
                lookup = {
                    "32": "•••", // e
                    "33": "•◦•", // f
                    "34": "◦••",
                    "35": "••◦", // g
                    "36": "•◦◦",
                    "37": "◦•◦", // a
                    "38": "◦◦◦", // b-flat
                    "39": "•••", // b
                    "40": "•◦•", // c
                    "41": "◦••",
                    "42": "••◦", // d
                    "43": "•◦◦",
                    "44": "◦•◦", // e
                    "45": "◦◦◦", // f
                    "46": "◦••",
                    "47": "••◦", // g
                    "48": "•◦◦",
                    "49": "◦•◦", // a
                    "50": "◦◦◦", // b-flat
                    "51": "••◦", // b
                    "52": "•◦◦", // c
                    "53": "◦•◦",
                    "54": "◦◦◦", // d
                    "55": "•◦◦",
                    "56": "◦•◦", // e
                    "57": "◦◦◦", // f
                    "58": "◦••",
                    "59": "••◦", // g
                    "60": "•◦◦",
                    "61": "◦•◦", // a
                    "62": "◦◦◦" // b-flat
                    // "63": "◦◦◦" // b (unused)
                },
                noteTarget = ngs.noteTargets[ngs.currentTarget],
                targetValves = lookup[noteTarget],
                correct = valves === targetValves,
                message, wrongNote;

            if (correct) {
                message = "Yes! " + noteCaptions[noteTarget % 12] + "  " + valves;
                tng.handleAttempt(correct, noteTarget, message, null);
            } else {
                wrongNote = tng.noteFromTrumpetValves(valves, noteTarget);
                // message = wrongNote < noteTarget ? "Too low..." : "Too high...";
                tng.handleAttempt(correct, wrongNote, "Try again...", null);
            }
        },

        intervalClicked: function (interval) {
            if (!ngs.gameIsOn) {
                // if game is not on, let them play some intervals
                var note2 = 7 + interval;
                avr.playNote(7);
                avr.playNote(note2);
                return;
            }
            var intervalCaptions = [0, 'Minor 2nd', 'Major 2nd', 'Minor 3rd', 'Major 3rd', 'Perfect 4th',
                    'Tritone', 'Perfect 5th', 'Minor 6th', 'Major 6th', 'Minor 7th', 'Major 7th', 'Octave'],
                noteTarget = ngs.noteTargets[ngs.currentTarget],
                correct = interval === ngs.intervalTargets[ngs.currentTarget],
                message = correct ? "Yes! " + intervalCaptions[interval]
                    : "Try again...";
                    // interval < ngs.intervalTargets[ngs.currentTarget] ? "Too small..." : "Too large...";

            tng.handleAttempt(correct, noteTarget, message, interval);
        },

        updateTally: function () {
            document.getElementById("score").title = ngs.rightTally + " correct, " + ngs.wrongTally + " incorrect";
            ngs.totalTally = ngs.rightTally - ngs.wrongTally;
            ngs.totalTallyElem.innerHTML = ngs.totalTally;
        },

        clearFeedback: function () {
            ngs.feedback.innerHTML = "&nbsp;";
        },


        changeToGame: function (whichGame) {
            tng.clearGame();
            ngs.gameType = whichGame;

            document.getElementById('notesSubGameSelector').style.display = "none";
            document.getElementById('intervalsSubGameSelector').style.display = "none";
            document.getElementById('intervalsbuttons').style.display = "none";
            document.getElementById('keyboard_div').style.display = "none";
            // document.getElementById('guitarButtons').style.display = "none";
            document.getElementById('trumpetButtons').style.display = "none";

            if (whichGame === "keyboard") {
                document.getElementById('notesSubGameSelector').style.display = "block";
                document.getElementById('keyboard_div').style.display = "block";
                ngs.gameSelector.innerHTML = "Notes: Keyboard";

            } else if (whichGame === "intervals") {
                document.getElementById('intervalsSubGameSelector').style.display = "block";
                document.getElementById('intervalsbuttons').style.display = "block";
                ngs.gameSelector.innerHTML = "Intervals";
                tng.changeToIntervalsGame(ngs.intervalsGameType);

            } else if (whichGame === "trumpet") {
                document.getElementById('notesSubGameSelector').style.display = "block";
                document.getElementById('trumpetButtons').style.display = "block";
                ngs.gameSelector.innerHTML = "Notes: Trumpet";

            } else if (whichGame === "guitar") {
                document.getElementById('notesSubGameSelector').style.display = "block";
                document.getElementById('guitarButtons').style.display = "block";
                ngs.gameSelector.innerHTML = "Notes: Guitar";
            }
        },

        changeToNotesGame: function (notesGameType) {
            // notesGameType is integer 0-5 indicating what noteSet to use
            tng.clearGame();
            ngs.notesGameType = notesGameType;

            document.getElementById('piano-octave2a').style.display = "none";
            document.getElementById('piano-octave2b').style.display = "none";
            document.getElementById('sixsix-octave2a').style.display = "none";
            document.getElementById('sixsix-octave2b').style.display = "none";

            if (notesGameType === 0) {
                ngs.notesSubGameSelector.innerHTML = "1 Octave: Naturals";
            } else if (notesGameType === 1) {
                ngs.notesSubGameSelector.innerHTML = "1 Octave: Sharps & Flats";
            } else if (notesGameType === 2) {
                ngs.notesSubGameSelector.innerHTML = "1 Octave: All";
            } else if (notesGameType === 3) {
                ngs.notesSubGameSelector.innerHTML = "2 Octaves: Naturals";
                document.getElementById('piano-octave2a').style.display = "inline";
                document.getElementById('piano-octave2b').style.display = "inline";
                document.getElementById('sixsix-octave2a').style.display = "inline";
                document.getElementById('sixsix-octave2b').style.display = "inline";
            } else if (notesGameType === 4) {
                ngs.notesSubGameSelector.innerHTML = "2 Octaves: Sharps & Flats";
                document.getElementById('piano-octave2a').style.display = "inline";
                document.getElementById('piano-octave2b').style.display = "inline";
                document.getElementById('sixsix-octave2a').style.display = "inline";
                document.getElementById('sixsix-octave2b').style.display = "inline";
            } else if (notesGameType === 5) {
                ngs.notesSubGameSelector.innerHTML = "2 Octaves: All";
                document.getElementById('piano-octave2a').style.display = "inline";
                document.getElementById('piano-octave2b').style.display = "inline";
                document.getElementById('sixsix-octave2a').style.display = "inline";
                document.getElementById('sixsix-octave2b').style.display = "inline";
            }
        },

        changeToIntervalsGame: function (intervalsGameType) {
            // noteSet is currently always integer 6, indicating what noteSet to use
            // intervalsGameType is integer 0-2 indicating what intervalSet to use
            tng.clearGame();
            ngs.intervalsGameType = intervalsGameType;

            if (intervalsGameType === 0) {
                ngs.intervalsSubGameSelector.innerHTML = "Even Number of Semitones";
                document.getElementById('odd-intervals').style.display = "none";
                document.getElementById('even-intervals').style.paddingLeft = "0px";
                document.getElementById('even-intervals').style.display = "inline";
            } else if (intervalsGameType === 1) {
                ngs.intervalsSubGameSelector.innerHTML = "Odd Number of Semitones";
                document.getElementById('odd-intervals').style.display = "inline";
                document.getElementById('even-intervals').style.display = "none";
            } else if (intervalsGameType === 2) {
                ngs.intervalsSubGameSelector.innerHTML = "All Intervals";
                document.getElementById('odd-intervals').style.display = "inline";
                document.getElementById('even-intervals').style.paddingLeft = "45px";
                document.getElementById('even-intervals').style.display = "inline";
            }
        },

        changeTotalTargets: function (targ) {
            document.getElementById('totalTargetsControl').innerHTML = targ + " at a Time";
            ngs.targetsAtATime = targ;
        },

        countItDown: function (countdown) {
            ngs.countdownElem.innerHTML = countdown;
            if (countdown > 0) {
                ngs.countdownTimer = setTimeout(function () {
                    tng.countItDown(countdown -= 1);
                }, 1000);
            } else {
                // game over
                tng.endGame();
                ngs.feedback.innerHTML = "Game Over &mdash; Score: " + ngs.totalTally;
            }
        },

        getNoteSet: function (whichSet) {
            return [
                [40, 42, 44, 45, 47, 49, 51], // [0] 1 octave: 7 natural notes,  (also intervals)
                [41, 43, 46, 48, 50], // [1] 1 octave: 5 sharps and flats
                [40, 42, 44, 45, 47, 49, 51], // [2] for 1 octave: all
                [40, 42, 44, 45, 47, 49, 51, 52, 54, 56, 57, 59, 61, 63], // [3] 2 octaves: 14 natural notes
                [41, 43, 46, 48, 50, 53, 55, 58, 60, 62], // [4] 2 octaves: 10 sharps and flats
                [40, 42, 44, 45, 47, 49, 51, 52, 54, 56, 57, 59, 61, 63] // [5] for 2 octaves: all
            ][whichSet];
        },

        getGuitarNoteSet: function (whichSet) {
            return [
            [40, 42, 44, 45, 47, 49, 51], // [0] 1 octave: 7 natural notes,  (also intervals)
            [41, 43, 46, 48, 50], // [1] 1 octave: 5 sharps and flats
            [40, 42, 44, 45, 47, 49, 51], // [2] for 1 octave: all
            [32, 33, 35, 37, 39, 40, 42, 44, 45, 47, 49, 51, 52, 54, 56, 57, 59], // [3] 2 octaves: 14 natural notes
            [34, 36, 38, 41, 43, 46, 48, 50, 53, 55, 58, 60], // [4] 2 octaves: 10 sharps and flats
            [32, 33, 35, 37, 39, 40, 42, 44, 45, 47, 49, 51, 52, 54, 56, 57, 59] // [5] for 2 octaves: all
            ][whichSet];
        },

        getTrumpetNoteSet: function (whichSet) {
            return [
                [40, 42, 44, 45, 47, 49, 51], // [0] 1 octave: natural notes
                [41, 43, 46, 48, 50], // [1] 1 octave, sharps and flats
                [40, 42, 44, 45, 47, 49, 51], // [2] 1 octave, all notes, random key
                [32, 33, 35, 37, 39, 40, 42, 44, 45, 47, 49, 51, 52, 54, 56, 57], // [3] 2 octaves, naturals (57 is high f)
                [34, 36, 38, 41, 43, 46, 48, 50, 53, 55], // [4] 2 octaves, sharps and flats
                [32, 33, 35, 37, 39, 40, 42, 44, 45, 47, 49, 51, 52, 54, 56, 57] // [5] 2 octaves, all notes, random key
            ][whichSet];
        },

        getIntervalSet: function (whichSet) {
            return [
                [2, 4, 6, 8, 10, 12], // [0] even intervals
                [1, 3, 5, 7, 9, 11], // [1] odd intervals
                [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12] // [2] all intervals
            ][whichSet];
        },

        startButton: function () {
            if (ngs.gameIsOn) {
                // stop
                tng.clearGame();
            } else {
                // start
                tng.clearBothStaves();
                tng.clearFeedback();
                tng.resetScore();
                document.getElementById('startButton').innerHTML = "Stop";

                // reset internal game state
                ngs.firstTry = true;
                ngs.noteTargets = [];
                ngs.intervalTargets = [];
                ngs.currentTarget = 0;
                ngs.correctItemsOnStaff = 0;
                ngs.targetsOnStaff = 0;

                if (ngs.gameType === "intervals") {
                    tng.addMoreTargets = tng.addMoreIntervals;
                    ngs.noteSource = tng.getNoteSet(0);
                    ngs.intervalSource = tng.getIntervalSet(ngs.intervalsGameType);
                    ngs.noteSet = 0;
                } else if (ngs.gameType === "keyboard") {
                    tng.addMoreTargets = tng.addMoreNotes;
                    ngs.noteSource = tng.getNoteSet(ngs.notesGameType);
                    ngs.noteSet = ngs.notesGameType;
                } else if (ngs.gameType === "trumpet") {
                    tng.addMoreTargets = tng.addMoreNotes;
                    ngs.noteSource = tng.getTrumpetNoteSet(ngs.notesGameType);
                    ngs.noteSet = ngs.notesGameType;
                } else {
                    // guitar
                    tng.addMoreTargets = tng.addMoreNotes;
                    ngs.noteSource = tng.getGuitarNoteSet(ngs.notesGameType);
                    ngs.noteSet = ngs.notesGameType;
                }

                ngs.feedback.innerHTML = "Ready...";
                ngs.feedbackTimer = setTimeout(function () {
                    ngs.feedback.innerHTML = "Go!";
                    ngs.feedbackTimer = setTimeout(function () {
                        tng.countItDown(60);
                        tng.showTargets();
                        ngs.gameIsOn = true;
                        tng.clearFeedback();
                    }, 500);
                }, 1000);
            }
        },

        endGame: function () {
            clearTimeout(ngs.staffTimer);
            clearTimeout(ngs.targetsTimer);
            clearTimeout(ngs.countdownTimer);
            ngs.gameIsOn = false;
            ngs.countdownElem.innerHTML = "0";
            tng.clearFeedback();
            document.getElementById('startButton').innerHTML = "Start";
        },

        clearGame: function () {
            // called when a different game is selected, or stop button clicked
            tng.endGame();
            tng.clearBothStaves();
        },

        resetScore: function () {
            ngs.rightTally = 0;
            ngs.wrongTally = 0;
            ngs.totalTally = 0;
            document.getElementById('score').title = "0 correct, 0 incorrect";
            document.getElementById('totalTally').innerHTML = "0";
        }
    };
}());

// initial setup

avr.drawStaff(document.getElementById("staff1"));
avr.drawStaff(ngs.staff2);

avr.audioCheck([
    'http://clairnote.org/audio/sprites-3octaves-2secs-mono.mp3',
    'http://clairnote.org/audio/sprites-3octaves-2secs-mono.ogg'
]);

if (avr.piano === null) {
    avr.loadUI();
}
