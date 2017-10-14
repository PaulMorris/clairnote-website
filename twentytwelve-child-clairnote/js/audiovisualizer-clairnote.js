/* (c) 2013-2017 Paul Morris */
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this file,
 * You can obtain one at http://mozilla.org/MPL/2.0/. */
// JavaScript Document
// version: 20161014

// INITIAL SETUP ------------------------------------------

avr.drawStaff(document.getElementById("staff1"));

avr.loadScaleType(
    [40, 42, 44, 46, 48, 50, 41, 43, 45, 47, 49, 51],
    5.3, 'Whole Tone', 0, 'staff1');

// other possibilities
/*
avr.loadScaleType(
    [40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52],
    4.9, 'Chromatic', 0, 'staff1');

avr.loadScaleType(
    [40, 42, 44, 45, 47, 49, 51, 52, 51, 49, 47, 45, 44, 42, 40],
    4.25, 'Major', 0, 'staff1');
*/

// initialize audio and UI ----------------------------------

avr.uiToggler = function (anId) {
    ['scalesbuttons', 'modesbuttons', 'intervalsbuttons', 'keyboard_div']
        .forEach(function (id) {
             document.getElementById(id).style.display = "none";
         });

    document.getElementById('main_controls_wrapper').style.minHeight = "190px";
    document.getElementById(anId).style.display = "block";

    var displayScaleRoots = (anId === 'modesbuttons' || anId === 'scalesbuttons') ? 'block' : 'none';
    document.getElementById('scaleRootButtonsTopRow').style.display = displayScaleRoots;
    document.getElementById('scaleRootButtonsBottomRow').style.display = displayScaleRoots;
}

avr.audioCheck([
    'http://clairnote.org/wp/wp-content/themes/twentytwelve-child-two/audio/sprites-3octaves-2secs-mono.mp3',
    'http://clairnote.org/wp/wp-content/themes/twentytwelve-child-two/audio/sprites-3octaves-2secs-mono.ogg'
]);

if (avr.piano === null) {
    avr.loadUI();
}

avr.videoToggler = function (anId) {
    ['videoRainbow', 'videoDoReMi', 'videoBlueDanube', 'videoGreensleeves', 'videoBachPrelude', 'videoElise', 'videoEntertainer']
        .forEach(function (id) {
            var vid;
            if (id !== anId) {
                vid = document.getElementById(id);
                vid.style.display = "none";
                vid.pause();
            }
         });
    document.getElementById(anId).style.display = "block";
}
