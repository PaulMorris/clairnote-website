/* (c) 2013-2017 Paul Morris */
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this file,
 * You can obtain one at http://mozilla.org/MPL/2.0/. */
// JavaScript Document
// version: 20161014

"use strict";

/*\
|*|  IE-specific polyfill (IE 9 and below)
|*|  which enables the passage of arbitrary arguments to the
|*|  callback functions of JavaScript timers (HTML5 standard syntax).
|*|  https://developer.mozilla.org/en-US/docs/Web/API/WindowTimers.setTimeout
\*/
if (document.all && !window.setTimeout.isPolyfill) {
    var __nativeST__ = window.setTimeout;
    window.setTimeout = function (vCallback, nDelay) {
        var aArgs = Array.prototype.slice.call(arguments, 2);
        return __nativeST__(vCallback instanceof Function ? function () {
            vCallback.apply(null, aArgs);
        } : vCallback, nDelay);
    };
    window.setTimeout.isPolyfill = true;
}

// https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/fill
if (!Array.prototype.fill) {
  Array.prototype.fill = function(value) {

    if (this == null) {
      throw new TypeError('this is null or not defined');
    }

    var O = Object(this);

    var len = O.length >>> 0;

    var start = arguments[1];
    var relativeStart = start >> 0;

    var k = relativeStart < 0 ?
      Math.max(len + relativeStart, 0) :
      Math.min(relativeStart, len);

    var end = arguments[2];
    var relativeEnd = end === undefined ?
      len : end >> 0;

    var final = relativeEnd < 0 ?
      Math.max(len + relativeEnd, 0) :
      Math.min(relativeEnd, len);

    while (k < final) {
      O[k] = value;
      k++;
    }

    return O;
  };
}


var avr = (function () {
    return {

        // UTILS ------------------------------------------

        // Like Guile Scheme, return an array containing 'count' numbers, starting from 'start'
        // and adding 'step' each time. Default start is 0. Default step is 1.
        iota: function (count, start, step) {
            start = start || 0;
            step = step || 1;
            return Array.apply(0, Array(count))
                .map(function (n, index) { return start + (index * step); });
        },

        removeElement: function (id) {
            var e = document.getElementById(id);
            if (e) {
                e.parentNode.removeChild(e);
            }
        },

        // INITIALIZING AUDIO ------------------------------------------

        // This playNote method is overwritten by loadAudio.
        // If loadAudio is not called then there is no audio support,
        // in that case playNote shows this alert once and then self-destructs.
        playNote: function () {
            alert("Clairnote.org says: your browser does not support HTML5 audio," +
                " so there will be no sound. The visuals should still work. " +
                "To hear the audio, please use the most recent version of a good" +
                "standards-compliant browser like Mozilla Firefox.");
            avr.playNote = function () {};
        },

        // Volume Control
        changeVolume: function (newLevel, newLabel) {
            document.getElementById('volumeControl').innerHTML = "Volume: " + newLabel;
            if (newLevel > 0) {
                Howler.unmute();
                Howler.volume(newLevel);
            } else {
                Howler.mute();
            }
        },

        piano: null,

        loadUI: function () {
            // for MNP site
            if (document.getElementById('load-message')) {
                document.getElementById('load-message').style.display = "none";
            }
            if (document.getElementById('load-content')) {
                document.getElementById('load-content').style.display = "block";
            }
            // for all
            if (document.getElementById('loadingAudio')) {
                document.getElementById('loadingAudio').style.display = "none";
            }
            if (document.getElementById('playButton')) {
                document.getElementById('playButton').style.display = "block";
            }
            // for game
            if (document.getElementById('feedback')) {
                document.getElementById('feedback').innerHTML = "&nbsp;";
            }
            // for both game and audiovisualizer
            if (document.getElementById('volumeControl')) {
                document.getElementById('volumeControl').style.display = "block";
            }

            // this function will self destruct.
            avr.loadUI = function () {};
        },

        // howler.js
        loadAudio: function (urlsArray) {
            /* create an object like this to define the audio sprite:
            {
                '32': [   0, 1500],  // E
                '33': [2000, 1500],  // F
                '34': [4000, 1500],  // F#
                ~~~~~~~~~~~~~~~~~~~~~~~~~~
                '68': [72000, 1500], // E
                '69': [74000, 1500]  // F
            }
            */
            var spriteObject = {},
                keys = avr.iota(38, 32, 1),
                vals = avr.iota(38, 0, 2000);

            keys.forEach(function (key, index) {
                spriteObject[key] = [vals[index], 1500];
            });

            avr.piano = new Howl({
                urls: urlsArray,
                autoplay: false,
                onload: function () {
                    avr.loadUI();
                },
                sprite: spriteObject
            });

            avr.playNote = function (n) {
                avr.piano.play(n.toString());
            };
        },

        // Check for audio support
        audioCheck: function (urlsArray) {
            var audioTest = document.createElement('audio');
            try {
                if (!!audioTest.canPlayType) {
                    // volume level 2
                    Howler.volume(0.35);
                    avr.loadAudio(urlsArray);
                }
                // else piano === null
            } catch (ignore) {
                console.log(ignore);
            }
            avr.audioCheck = null;
        },


        // APP STATE AND PERSISTENT DATA ------------------------------------------

        noteBank: [],
        // delayBank: default is half seconds
        delayBank: Array(14).fill(500),
        noteIds: [],

        noteXPositions: [],
        leftMarginDefault: 3.1347,
        noteXOffsetDefault: 5.3,

        // 15 notes in a melodic minor scale
        maxNotesOnStaff: 15,

        playingNoteColor: '#E3701A',
        intervals: 0,
        prevTimestamp: null,
        // needsReset: does the staff need to be cleared first or not?
        needsReset: true,
        playLoopTimer: null,

        // scales state - starts with C Major
        scaleRoot: 0,
        scaleModeShift: 0,
        scaleArray: [40, 42, 44, 45, 47, 49, 51, 52],
        scaleName: 'Major',
        scaleXOffset: 5.3,


        // intervals state
        intervalScaleName: 'Major Key',
        intervalTypeName: 'Major 3rds',
        intervalXOffset: 6.3,

        // avr.currentCaptions is set to default avr.sharpAndFlatCaptions below
        // avr.sharpCaptions and avr.flatCaptions are defined lazily below
        sharpAndFlatCaptions: [
            ['C'],
            ['C #', 'D b'],
            ['D'],
            ['D #', 'E b'],
            ['E'],
            ['F'],
            ['F #', 'G b'],
            ['G'],
            ['G #', 'A b'],
            ['A'],
            ['A #', 'B b'],
            ['B']],

        intervalCaptions: [
            [''],
            ['Minor', '2nd'],
            ['Major', '2nd'],
            ['Minor', '3rd'],
            ['Major', '3rd'],
            ['Perfect', '4th'],
            ['Tritone'],
            ['Perfect', '5th'],
            ['Minor', '6th'],
            ['Major', '6th'],
            ['Minor', '7th'],
            ['Major', '7th'],
            ['Octave']],


        // USER INTERFACE ------------------------------------------

        setNotesTitle: function (title) {
            if (document.getElementById('notes_title')) {
                document.getElementById('notes_title').innerHTML = title;
            }
        },

        clearStaff: function (svgId) {
            var kids = document.getElementById(svgId).children;
            for (var i = 0; i < kids.length; i += 1) {
                if (kids[i].getAttribute('class') !== 'staffline') {
                    kids[i].parentNode.removeChild(kids[i]);
                    i -= 1;
                }
            }
            avr.noteXPosition = 0;
        },

        clearStaffButton: function (svgId) {
            avr.clearStaff(svgId);
            avr.noteBank.length = 0;
            avr.delayBank.length = 0;
            avr.noteIds.length = 0;
            // stop the playback if it is on, and reset the play button
            avr.showPlayButton();
            avr.setNotesTitle("&nbsp;");
        },

        stopPlaybackButton: function (svgId) {
            // stops any playback, and resets the play button
            avr.showPlayButton();
            avr.clearStaff(svgId);

            var offStaffNotes = avr.noteBank.length > avr.maxNotesOnStaff;
            avr.drawNoteSeries(
                offStaffNotes ? avr.noteBank.slice(0, avr.maxNotesOnStaff)
                              : avr.noteBank,
                avr.noteXPositions,
                avr.intervals,
                avr.currentCaptions,
                avr.noteIds,
                svgId);

            avr.needsReset = true;
        },

        showStopButton: function () {
            document.getElementById('playButton').style.display = 'none';
            document.getElementById('stopButton').style.display = 'block';
        },

        showPlayButton: function () {
            window.clearTimeout(avr.playLoopTimer);
            document.getElementById('stopButton').style.display = 'none';
            document.getElementById('playButton').style.display = 'block';
        },

        instrumentToggler: function (tradPiano, sixSixPiano) {
            // args are 'none' or 'block'
            document.getElementById('keys_piano').style.display = tradPiano;
            document.getElementById('jankoLayoutButton').style.display = tradPiano;
            document.getElementById('keys_sixsix').style.display = sixSixPiano;
            document.getElementById('pianoLayoutButton').style.display = sixSixPiano;
        },

        // avr.uiToggler is in the audiovisualizer-clairnote.js and audiovisualizer-mnp.js files



        // JS DROP DOWN MENUS ------------------------------------------

        menuTimeout: 250,
        closetimer: 0,
        ddmenuitem: 0,

        // cancel close timer
        mcancelclosetime: function () {
            if (avr.closetimer) {
                window.clearTimeout(avr.closetimer);
                avr.closetimer = null;
            }
        },

        // open hidden layer
        mopen: function (id) {
            // cancel close timer
            avr.mcancelclosetime();
            // close old layer
            if (avr.ddmenuitem) {
                avr.ddmenuitem.style.visibility = 'hidden';
            }
            // get new layer and show it
            avr.ddmenuitem = document.getElementById(id);
            avr.ddmenuitem.style.visibility = 'visible';
        },

        // close showed layer
        mclose: function () {
            if (avr.ddmenuitem) {
                avr.ddmenuitem.style.visibility = 'hidden';
            }
        },

        // go close timer
        mclosetime: function () {
            avr.closetimer = window.setTimeout(avr.mclose, avr.menuTimeout);
        },

        // close layer when click-out
        // document.onclick = mclose;


        // DRAW STAFF AND NOTES ------------------------------------------

        drawStaff: function (svgNode, xPos, yPosns) {
            xPos = xPos || 0.3347;
            yPosns = yPosns || [1.6747, 3.1747, 6.1747, 7.6747];
            yPosns.forEach(function (yPos) {
                var line = avr.translate(avr.staffLine.cloneNode(), xPos, yPos);
                svgNode.appendChild(line);
            });
        },

        clairnoteSN: false,

        getLedgerPositions: function (note) {
            // takes a vertical note position and returns an array of
            // vertical ledger positions for that note
            // staff lines are: 44 48 (52) 56 60
            var ledgers = [];
            if (50 <= note && note <= 54) {
                ledgers.push(52);

            } else if (note < 43 || note > 61) {
                let line = note < 43 ? 44 : 60,
                    difference = note - line,
                    distance = Math.abs(difference),
                    direction = difference < 0 ? -1 : 1,
                    ledgerCount = Math.ceil((distance - 1) / 4);
                ledgers = avr.iota(ledgerCount, 4, 4)
                    .map((l) => line + (l * direction));
            }

            if (avr.clairnoteSN && note % 4 === 2) {
                // If the note is D, F#, or Bb, we add a ledger for the note.
                // (positions 30, 34, 38, 42, 46, 50, 54, 58, 62, 66, 70, 74)
                ledgers.push(note);
            }
            return ledgers;
        },

        makeNoteCaption: function (caption, captionNode, style) {
            caption.forEach(function (captionLine, i) {
                var ts = avr.svgElement("tspan");
                ts.appendChild(document.createTextNode(captionLine));
                ts.setAttribute("x", "0");
                ts.setAttribute("dy", i === 0 ? "0" : "1.2em");
                if (style) { ts.setAttribute("style", style); }
                captionNode.appendChild(ts);
            });
            return captionNode;
        },

        // YposInt (integer) indicates the vertical position of the note,
        // Xpos (number) the SVG coordinate for the note's horizontal position,
        // id (string) for the note
        // interval (integer)
        // caption (svg node) for the caption
        // returns an array of svg nodes
        getNoteSVG: function (YposInt, Xpos, id, caption, interval) {
            var solid = avr.clairnoteSN ? true : YposInt % 2 === 0,
                stemRightOffset = solid ? 1.2375 : 1.2624,
                Ypos = (YposInt * -0.375) + 24.1747,
                hasInterval = interval > 0,
                // noteNodes are grouped under a <g> tag, to be colored in
                // playback, otherNodes are not.
                noteNodes = [],
                allNodes = [],
                ledgerNodes = [],
                head = solid ? avr.solidNote.cloneNode() : avr.hollowNote.cloneNode();

            // note head 1
            noteNodes.push(avr.translate(head, Xpos, Ypos));

            // ledgers 1
            var ledgerX = Xpos - 0.5995,
                ledgers1 = avr.getLedgerPositions(YposInt);

            ledgers1.forEach(function (lp) {
                ledgerNodes.push(avr.translate(
                    avr.ledger.cloneNode(),
                    ledgerX,
                    // 24.1747 - 0.0740 = 24.1007
                    (lp * -0.375) + 24.1007));
            });

            // interval
            var stm = avr.stem.cloneNode(),
                intervalExtra = 0.375 * interval;
            if (hasInterval) {
                var intervalSolid = avr.clairnoteSN
                    ? true
                    : interval % 2 === 0 ? solid : !solid;
                // note head 2
                noteNodes.push(avr.translate(
                    intervalSolid ? avr.solidNote.cloneNode() : avr.hollowNote.cloneNode(),
                    interval > 2 ? Xpos : Xpos + stemRightOffset,
                    Ypos - intervalExtra));

                stm.setAttribute("height", (3.3133 + intervalExtra) + '');
                // ledgers 2
                var ledgerXinterval = ledgerX + (interval > 2 ? 0 : stemRightOffset),
                    ledgers2 = avr.getLedgerPositions(YposInt + interval);

                ledgers2.forEach(function (lp) {
                    ledgerNodes.push(avr.translate(
                        avr.ledger.cloneNode(),
                        ledgerXinterval,
                        // 24.1747 - 0.0740 = 24.1007
                        (lp * -0.375) + 24.1007));
                });
            }

            // stem
            if (YposInt > 51 && !hasInterval) {
                // down stem
                noteNodes.push(avr.translate(stm, Xpos, Ypos));
            } else {
                // up stem
                noteNodes.push(avr.translate(
                    stm,
                    Xpos + stemRightOffset,
                    Ypos - 3.5 - intervalExtra));
            }

            // caption
            // x offset for 'E' was originally 24.5892
            if (caption) {
                var captionXpos = Xpos + (stemRightOffset / 2),
                    captionPositioned = avr.translate(caption, captionXpos, 14.1748);

                captionPositioned.setAttribute('id', id + 'caption');
                allNodes.push(captionPositioned);
            }

            // group ledgers to assign an id
            if (ledgerNodes.length > 0) {
                var ledgerGNode = avr.svgElement('g');
                ledgerGNode.setAttribute('id', id + 'ledgers');

                ledgerNodes.forEach( function (node) {
                    ledgerGNode.appendChild(node);
                });
                allNodes.push(ledgerGNode);
            }

            // add noteGNode last so it is drawn on top of ledgers
            var noteGNode = avr.svgElement('g');
            noteGNode.setAttribute('id', id);

            noteNodes.forEach( function (node) {
                noteGNode.appendChild(node);
            });
            allNodes.push(noteGNode);

            return allNodes;

            // potential staff caption at top left
            // var staffText = avr.translate(staffCaption, 0.8347, 1.1582);
            // staffText.appendChild(document.createTextNode('Chromatic Scale'));
            // svg.appendChild(staffText);
        },

        // NOTE SERIES ------------------------------------------

        getNoteXPositions: function (length, first, offset) {
            return avr.iota(length).map(function (item) {
                return first + (offset * item);
            });
        },

        getNoteIds: function (length, staffId) {
            return avr.iota(length)
                .map(function (item) {
                    return staffId + 'note' + item;
                });
        },

        drawNoteSeries: function (notes, xPositions, intervals, captions, noteIds, svgId) {
            // notes (array): Y position integers for the notes in the series
            // xPositions (array): x positions of the notes
            // intervals (number): 0 or positive ints or (array): positive ints (for diatonic intervals)
            // noteIds (array): id strings
            // captions (array of arrays, or false for none) usually currentCaptions
            // svgId (string) id of an svg node

            var isIntervalArray = Array.isArray(intervals),
                isCaptionArray = Array.isArray(captions),
                svgNode = document.getElementById(svgId),
                fragment = document.createDocumentFragment(),
                captionNode,
                noteNodes = notes.map( function (note, index) {
                    var interval = isIntervalArray ? intervals[index] : intervals;

                    if (isCaptionArray) {
                        var cap = interval > 0 ? captions[interval] : captions[(note -4) % 12];
                        captionNode = avr.makeNoteCaption(cap, avr.noteCaption.cloneNode());
                    } else {
                        captionNode = null;
                    }

                    return avr.getNoteSVG(
                        note,
                        xPositions[index],
                        noteIds[index],
                        captionNode,
                        interval);
                });

            // flatten the array of arrays of nodes into an array of nodes
            var flattened = [].concat.apply([], noteNodes);
            flattened.forEach(function (node) {
                fragment.appendChild(node);
            });
            svgNode.appendChild(fragment);
        },

        getScaleCaptionData: function (scaleName, scaleRoot, scaleModeShift) {
            // determine note captions and scale root name
            // depends on whether the key is sharps or flats (or both)
            if (['Chromatic', 'Whole Tone', 'Blues'].indexOf(scaleName) !== -1) {

                var bothLookup = ['C','C#/Db','D','D#/Eb','E','F','F#/Gb','G','G#/Ab','A','A#/Bb','B'];
                return [avr.sharpAndFlatCaptions, bothLookup[scaleRoot]];

            } else {
                // normalize mode/root to major/ionian/root as if it were a major key
                // e.g. 7 Lydian --> 2 Ionian/Major
                var nmode = (scaleRoot - scaleModeShift + 12) % 12;

                // numbers correspond to sharp major keys: G D A E B F#
                // if nmode is one of these numbers --> sharps
                if ([7, 2, 9, 4, 11, 6].indexOf(nmode) !== -1) {

                    var sharpsLookup = ['C','C#','D','D#','E','F','F#','G','G#','A','A#','B'];
                    if (!avr.sharpCaptions) {
                        avr.sharpCaptions = avr.sharpAndFlatCaptions.map(function (c) {
                            return [c[0]];
                        });
                    }
                    return [avr.sharpCaptions, sharpsLookup[scaleRoot]];

                    // TODO?: 6 sharps or flats (n === 6)
                    // F needs to be E# (for sharps), else you get both F and F#
                    // ? or B needs to be Cb (for flats)

                } else {
                    var flatsLookup = ['C','Db','D','Eb','E','F','Gb','G','Ab','A','Bb','B'];
                    if (!avr.flatCaptions) {
                        avr.flatCaptions = avr.sharpAndFlatCaptions.map(function (c) {
                            return c[1] ? [c[1]] : c;
                        });
                    }
                    return [avr.flatCaptions, flatsLookup[scaleRoot]];
                }
            }
        },

        loadScale: function (svgId) {
            // stop any playback, and reset the play button
            avr.showPlayButton();
            avr.clearStaff(svgId);

            var scaleText = avr.scaleName === 'Whole Tone' ? 'Scales' : 'Scale',
                // captions for sharps, flats, or both
                captionsData = avr.getScaleCaptionData(
                    avr.scaleName,
                    avr.scaleRoot,
                    avr.scaleModeShift),
                rootName = captionsData[1];

            avr.setNotesTitle(rootName + ' ' + avr.scaleName + ' ' + scaleText);
            avr.currentCaptions = captionsData[0];

            avr.intervals = 0;
            avr.delayBank = Array(15).fill(500); // 15 for melodic minor
            avr.noteBank = avr.scaleArray.slice();

            avr.noteIds = avr.getNoteIds(avr.noteBank.length, svgId);
            avr.noteXPositions = avr.getNoteXPositions(
                avr.noteBank.length,
                avr.leftMarginDefault,
                avr.scaleXOffset);

            // change the scale (noteBank) to match the key (scaleRoot)
            if (avr.scaleRoot > 0) {
                avr.noteBank = avr.noteBank.map(function (note) {
                    return note + avr.scaleRoot;
                });
            }
            avr.drawNoteSeries(
                avr.noteBank,
                avr.noteXPositions,
                avr.intervals,
                avr.currentCaptions,
                avr.noteIds,
                svgId);
            avr.needsReset = true;
        },

        loadScaleType: function (pattern, xOffset, name, modeShift, svgId) {
            avr.scaleName = name;
            avr.scaleArray = pattern;
            avr.scaleXOffset = xOffset;
            avr.scaleModeShift = modeShift;
            avr.loadScale(svgId);
        },

        loadScaleRoot: function (root, svgId) {
            avr.scaleRoot = root;
            avr.loadScale(svgId);
        },

        loadIntervals: function (svgId) {
            // stop any playback, and reset the play button
            avr.showPlayButton();
            avr.clearStaff(svgId);

            var scaleLookup = {
                    'Whole Tone Scales': [40, 42, 44, 46, 48, 50, 41, 43, 45, 47, 49, 51],
                    'Chromatic Scale': [40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51],
                    'Major Key': [40, 42, 44, 45, 47, 49, 51, 52],
                    'Minor Key': [40, 42, 43, 45, 47, 48, 50, 52]
                },
                intervalLookup = {
                    // length is 14 to allow for minor scales that drop first 5,
                    '2nds': [2, 2, 1, 2, 2, 2, 1, 2, 2, 1, 2, 2, 2, 1],
                    '3rds': [4, 3, 3, 4, 4, 3, 3, 4, 3, 3, 4, 4, 3, 3],
                    '4ths': [5, 5, 5, 6, 5, 5, 5, 5, 5, 5, 6, 5, 5, 5],
                    '5ths': [7, 7, 7, 7, 7, 7, 6, 7, 7, 7, 7, 7, 7, 6],
                    '6ths': [9, 9, 8, 9, 9, 8, 8, 9, 9, 8, 9, 9, 8, 8],
                    '7ths': [11, 10, 10, 11, 10, 10, 10, 11, 10, 10, 11, 10, 10, 10],
                    // Octaves is the same for chromatic and diatonic
                    'Octaves': 12,
                    'Minor 2nds': 1,
                    'Major 2nds': 2,
                    'Minor 3rds': 3,
                    'Major 3rds': 4,
                    'Perfect 4ths': 5,
                    'Tritones': 6,
                    'Perfect 5ths': 7,
                    'Minor 6ths': 8,
                    'Major 6ths': 9,
                    'Minor 7ths': 10,
                    'Major 7ths': 11,
                };

            avr.setNotesTitle(avr.intervalScaleName + ', ' + avr.intervalTypeName);
            avr.currentCaptions = avr.intervalCaptions;

            avr.delayBank = Array(12).fill(1000);
            avr.noteBank = scaleLookup[avr.intervalScaleName];
            avr.noteXPositions = avr.getNoteXPositions(
                avr.noteBank.length,
                avr.leftMarginDefault,
                avr.intervalXOffset);

            avr.noteIds = avr.getNoteIds(avr.noteBank.length, svgId);
            avr.intervals = intervalLookup[avr.intervalTypeName];

            // for minor scales drop the first five to shift diatonic pattern 5 positions left (C -> A)
            if (avr.intervalScaleName === 'Minor Key' && avr.intervalTypeName !== 'Octaves') {
                avr.intervals = avr.intervals.slice(5);
            }
            avr.drawNoteSeries(
                avr.noteBank,
                avr.noteXPositions,
                avr.intervals,
                avr.currentCaptions,
                avr.noteIds,
                svgId);
            avr.needsReset = true;
        },

        loadChromaticIntervals: function (xOffset, name, svgId) {
            var lookup = {
                '2nds': 'Major 2nds',
                '3rds': 'Major 3rds',
                '4ths': 'Perfect 4ths',
                '5ths': 'Perfect 5ths',
                '6ths': 'Major 6ths',
                '7ths': 'Major 7ths'
            };
            document.getElementById('intervals_controls1').style.display = "block";
            document.getElementById('intervals_controls2').style.display = "none";

            // convert from diatonic to chromatic intervals if needed
            if (lookup.hasOwnProperty(avr.intervalTypeName)) {
                avr.intervalTypeName = lookup[avr.intervalTypeName];
            }

            avr.intervalScaleName = name;
            avr.intervalXOffset = xOffset;
            avr.loadIntervals(svgId);
        },

        loadDiatonicIntervals: function (xOffset, name, svgId) {
            var lookup = {
                'Minor 2nds': '2nds',
                'Major 2nds': '2nds',
                'Minor 3rds': '3rds',
                'Major 3rds': '3rds',
                'Perfect 4ths': '4ths',
                'Tritones': '5ths',
                'Perfect 5ths': '5ths',
                'Minor 6ths': '6ths',
                'Major 6ths': '6ths',
                'Minor 7ths': '7ths',
                'Major 7ths': '7ths',
            };
            document.getElementById('intervals_controls1').style.display = "none";
            document.getElementById('intervals_controls2').style.display = "block";

            // convert from chromatic to diatonic intervals if needed
            if (lookup.hasOwnProperty(avr.intervalTypeName)) {
                avr.intervalTypeName = lookup[avr.intervalTypeName];
            }

            avr.intervalScaleName = name;
            avr.intervalXOffset = xOffset;
            avr.loadIntervals(svgId);
        },

        loadIntervalType: function (name, svgId) {
            avr.intervalTypeName = name;
            avr.loadIntervals(svgId);
        },


        // KEYBOARD NOTE PLAYED ------------------------------------------

        // when a note is played, play it, add it to noteBank and draw it
        notePlayed: function (note, svgId) {
            // clear staff if playback was done since
            // the last note was entered,
            // otherwise LONG duration between notes
            if (avr.needsReset === true) {
                avr.clearStaff(svgId);
                avr.setNotesTitle("Notes Played on Keyboard");
                avr.currentCaptions = avr.sharpAndFlatCaptions;
                avr.noteXPositions = avr.getNoteXPositions(15, avr.leftMarginDefault, 4.25);
                avr.noteBank.length = 0;
                avr.delayBank.length = 0;
                avr.noteIds.length = 0;
                avr.intervals = 0;
                avr.needsReset = false;
                avr.noteXPosition = avr.leftMarginDefault;
                // stop the playback if it is on, and reset the play button
                avr.showPlayButton();
            }

            avr.playNote(note);
            avr.noteBank.push(note);
            avr.noteIds.push(svgId + 'note' + avr.noteBank.length);

            var max = avr.maxNotesOnStaff,
                count = avr.noteIds.length,
                offStaff = count > max,
                firstNote = offStaff ? count - max : 0,
                seriesIds = avr.noteIds.slice(firstNote, count);

            avr.clearStaff(svgId);
            avr.drawNoteSeries(
                avr.noteBank.slice(-avr.maxNotesOnStaff),
                avr.noteXPositions,
                0, // interval
                avr.currentCaptions,
                seriesIds,
                svgId);

            // get current time as number
            var newTimestamp = Number(new Date());
            avr.delayBank.push(newTimestamp - avr.prevTimestamp);
            avr.prevTimestamp = newTimestamp;
            avr.noteXPosition += avr.noteXOffsetDefault;
        },


        // AUDIO PLAYBACK ------------------------------------------

        // using if statement & recursion to play a series of notes or intervals
        // as long as there are more notes to play in noteBank
        // the function keeps calling itself at a given delay to correctly time the notes
        // avr.intervals is usually a number (0 or positive int)
        // for diatonic interval series it is an array
        //
        playLoop: function (count, note, interval, noteId, prevNoteId, svgId, svgNode) {
            var nextCount = count + 1;

            if (interval > 0) {
                // intervals
                var note2 = note + interval;
                avr.playNote(note);
                avr.playNote(note2);
            } else if (avr.noteBank.length > avr.maxNotesOnStaff) {
                // more notes than will fit on the staff
                var max = avr.maxNotesOnStaff,
                    offStaff = nextCount > max,
                    firstNote = offStaff ? nextCount - max : 0,
                    lastNote = offStaff ? nextCount : max,
                    series = avr.noteBank.slice(firstNote, lastNote),
                    seriesIds = avr.noteIds.slice(firstNote, lastNote);

                avr.playNote(note);
                avr.clearStaff(svgId);
                avr.drawNoteSeries(
                    series,
                    avr.noteXPositions,
                    interval,
                    avr.currentCaptions,
                    seriesIds,
                    svgId);
            } else {
                // standard scales etc.
                avr.playNote(note);
            }
            document.getElementById(noteId)
                .setAttribute("style", "fill: " + avr.playingNoteColor + ";");

            if (prevNoteId) {
                document.getElementById(prevNoteId)
                    .setAttribute("style", "fill: black;");
            }

            // prep the next iteration
            var nextInterval = Array.isArray(avr.intervals) ? avr.intervals[nextCount] : avr.intervals;

            if (nextCount < avr.noteBank.length) {
                avr.playLoopTimer = window.setTimeout(
                    avr.playLoop,
                    avr.delayBank[nextCount],
                    nextCount,
                    avr.noteBank[nextCount],
                    nextInterval,
                    avr.noteIds[nextCount],
                    noteId,
                    svgId,
                    svgNode);
            } else {
                avr.playLoopTimer = window.setTimeout(function (noteId) {
                        avr.showPlayButton();
                        document.getElementById(noteId)
                            .setAttribute("style", "fill: black;");
                    },
                    avr.delayBank[count],
                    noteId);
            }
        },

        playback: function (svgId) {
            if (avr.noteBank.length > 0) {
                avr.showStopButton();
                avr.needsReset = true;

                var note = avr.noteBank[0],
                    interval = Array.isArray(avr.intervals) ? avr.intervals[0] : avr.intervals,
                    noteId = avr.noteIds[0],
                    svgNode = document.getElementById(svgId);

                avr.playLoopTimer = window.setTimeout(
                    avr.playLoop,
                    500,
                    0,
                    note,
                    interval,
                    noteId,
                    null,
                    svgId,
                    svgNode);
            } else {
                alert("There are no notes to play.  Enter some notes and try again.");
            }
        }

    };
}());

// SVG UTILITIES AND RAW MATERIALS ------------------------------------------

avr.populateElement = function (elem, props) {
    props.forEach(function(prop) {
       elem.setAttribute(prop[0], prop[1]);
    });
    return elem;
};

avr.svgElement = function (name) {
    return document.createElementNS("http://www.w3.org/2000/svg", name);
};

avr.translate = function (elem, transX, transY) {
    elem.setAttribute("transform",
                      "translate(" + transX + "," + transY + ")");
    return elem;
};

avr.hollowNotePath = "M1.0265 -0.4999C1.2152 -0.4618 1.3372 -0.3515 1.3549 -0.2025C1.3692 -0.0828 1.3124 0.0767 1.2094 0.2063C1.0774 0.3724 0.8892 0.4721 0.6459 0.5049C0.5851 0.5131 0.5489 0.5134 0.4433 0.5068C0.3289 0.4996 0.3088 0.4966 0.2606 0.4798C0.1181 0.4300 0.0248 0.3354 0.0042 0.2196C-0.0154 0.1092 0.0352 -0.0503 0.1321 -0.1828C0.2682 -0.3692 0.4766 -0.4818 0.7307 -0.5063C0.8236 -0.5152 0.9655 -0.5122 1.0265 -0.4999zM0.8920 -0.3272C0.8019 -0.3059 0.6744 -0.2509 0.5172 -0.1656C0.1997 0.0069 0.1097 0.0977 0.1513 0.2039C0.1688 0.2487 0.1917 0.2776 0.2265 0.2986C0.3097 0.3488 0.4220 0.3375 0.6348 0.2572C0.9775 0.1280 1.2160 -0.0339 1.2240 -0.1427C1.2287 -0.2070 1.1849 -0.2813 1.1220 -0.3156C1.0837 -0.3365 1.0773 -0.3379 1.0151 -0.3393C0.9699 -0.3403 0.9308 -0.3364 0.8920 -0.3272z";
avr.solidNotePath = "M1.0162 -0.5005C1.1901 -0.4580 1.3000 -0.3601 1.3267 -0.2237C1.3473 -0.1188 1.3091 0.0324 1.2347 0.1410C1.1037 0.3322 0.8787 0.4644 0.6176 0.5036C0.5244 0.5176 0.3659 0.5121 0.2884 0.4921C-0.0297 0.4098 -0.0964 0.0918 0.1475 -0.1799C0.2984 -0.3479 0.5439 -0.4756 0.7758 -0.5066C0.8400 -0.5151 0.9696 -0.5119 1.0162 -0.5005z";

avr.noteProps = [
    ["stroke-width", "0.0001"],
    ["stroke-linejoin", "round"],
    ["stroke-linecap", "round"]
];

avr.solidNote = avr.populateElement(
    avr.svgElement("path"),
    avr.noteProps.concat([["d", avr.solidNotePath]]));

avr.hollowNote = avr.populateElement(
    avr.svgElement("path"),
    avr.noteProps.concat([["d", avr.hollowNotePath]]));

avr.stem = avr.populateElement(
    avr.svgElement("rect"),
    [
        ["width", "0.0948"],
        ["height", "3.3133"],
        ["ry", "0.0235"]
    ]);

avr.ledger = avr.populateElement(
    avr.svgElement("rect"),
    [
        ["width", "2.5313"],
        ["height", "0.1479"],
        ["ry", "0.0740"],
        ["fill", "currentColor"]
    ]);

avr.staffLine = avr.populateElement(
    avr.svgElement("line"),
    [
        ["stroke-linejoin", "round"],
        ["stroke-linecap", "round"],
        ["stroke-width", "0.0729"],
        ["stroke", "currentColor"],
        ["x1", "0.0365"],
        ["y1", "0"],
        ["x2", "66.0207"],
        ["y2", "0"],
        ["class", "staffline"]
    ]);

avr.noteCaption = avr.populateElement(
    avr.svgElement("text"),
    [
        ["color", "rgb(50%, 50%, 50%)"],
        ["font-family", "sans-serif"],
        ["font-size", "1.1"],
        ["text-anchor", "middle"],
        ["fill", "currentColor"]
    ]);

avr.staffCaption = avr.populateElement(
    avr.svgElement('text'),
    [
        ['color', "rgb(50%, 50%, 50%)"],
        ['font-family', "sans-serif"],
        ['font-size', "1.1000"],
        ['text-anchor', "start"],
        ['fill', "currentColor"]
    ]);

avr.currentCaptions = avr.sharpAndFlatCaptions;
