<?php
/**
 * Template Name: Clairnote SN Home
 *
 * Description: Home page Jan 2017.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

 /* version 20160224 */

/* This file is for the home page */

get_header('clairnote-sn'); ?>

<div id="primary" class="site-content">
<div id="content" role="main">
<article id="post-29" class="post-29 page type-page status-publish hentry">
<div class="entry-content">


<h1 id="audiovisualizer-h1" class="entry-title">Clairnote SN</h1>
<h2 id="homepage-subtitle">An alternative music notation system that makes music easier to read and understand.</h2>

<p>Explicit and Direct &mdash; Each of the twelve notes of the chromatic scale
has its own unique vertical position on the staff.
There are no indirect alterations by key signatures or accidental signs.
Play what you see and see what you play.</p>

<img class="alignnone size-full"
    src="http://clairnote.org/images-sn/Clairnote-chromatic-scale-eighth-notes.svg"
    alt="Chromatic scale in Clairnote SN music notation" />

<p>Consistent and Intuitive &mdash; It is easy to see the
interval relationships between notes because they are represented clearly and
consistently by the vertical positions of the notes on the staff.
Hear what you see and see what you hear.</p>

<img class="alignnone size-full"
    src="http://clairnote.org/images-sn/Clairnote-C-major-scale-whole-steps-half-steps.svg"
    alt="C major scale in Clairnote SN music notation" />

<?php /*
<p>Whether a note is solid or hollow is its most prominent visual feature,
so solid and hollow noteheads are used to help convey <em>pitch</em> rather than duration.
The vertical positions on the staff alternate between solid and hollow noteheads.</p>

<img class="alignnone size-full"
    src="http://clairnote.org/images-sn/Clairnote-solid-hollow-notes.svg"
    alt="Solid and hollow notes in Clairnote SN music notation" />

<p>This visual pattern makes individual notes easier to identify and interval
relationships easier to see.</p>
*/ ?>

<p>The vertical positions on the staff alternate between line-notes and
space-notes.  This consistent visual pattern makes individual notes easier to
identify and interval relationships easier to see.</p>

<img class="alignnone size-full"
    src="http://clairnote.org/images-sn/Clairnote-C-major-scale-major-thirds-minor-thirds.svg"
    alt="Thirds in the key of C Major in Clairnote SN music notation" />

<p>Any given note looks the same in every octave. This
makes it easy to identify notes and easy to play music in any octave.</p>

<img class="alignnone size-full"
    src="http://clairnote.org/images-sn/Clairnote-octaves-C-major-2.svg"
    alt="C major scale in Clairnote SN music notation showing octaves" />

<p>Traditional rhythm symbols are used in Clairnote SN. (Unlike standard
Clairnote.)</p>

<img class="alignnone size-full"
    src="http://clairnote.org/images-sn/Clairnote-half-notes-quarter-notes-brief.svg"
    alt="Half notes and quarter notes in Clairnote SN" />


<h2>Look and Listen Closer (AudioVisualizer)</h2>
<p>Below you can see and hear scales, intervals, modes, and/or the notes you play on an on-screen keyboard.
For scales and modes, look for the different interval patterns (whole steps, half steps, etc.)
that make up each one. Notice how these interval patterns remain consistent when you transpose
the scale or mode to a different root note.
For intervals, notice how easy it is to identify them and to differentiate between them.</p>

<div class="audiovisualizer">
<div id="svg_wrapper">
    <svg id="staff1"
         class="svg_staff"
         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         version="1.2"
         width="199.12mm"
         height="67mm"
         viewBox="0 0 66.6537 16.5962">
    </svg>
</div>

<div id="notes_title">&nbsp;</div>

<div id="main_controls_wrapper" >
  <div class="controls" id="load-content">
    <ul id="play_controls">
        <li><a href="javascript:" class="controlbutton" title="Show Scales" onClick="avr.uiToggler('scalesbuttons')">Scales</a></li>
        <li><a href="javascript:" class="controlbutton" title="Show Intervals" onClick="avr.uiToggler('intervalsbuttons')">Intervals</a></li>
        <li><a href="javascript:" class="controlbutton" title="Show Keyboard" onclick="avr.uiToggler('keyboard_div');" id="keyboardControl" >Keyboard</a></li>
        <li><a href="javascript:" class="controlbutton" title="Show Modes" onClick="avr.uiToggler('modesbuttons')">Modes</a></li>
        <li id="playButtonLi">
            <span id="loadingAudio"><a href="javascript:" class="controlbutton"><em>Loading Audio...</em></a></span>
            <span id="playButton"><a href="javascript:" onclick="avr.playback('staff1')" class="controlbutton">Play Audio</a></span>
            <span id="stopButton"><a href="javascript:" onclick="avr.stopPlaybackButton('staff1')" class="controlbutton">Stop Audio</a></span>
        </li>
        <li class="JSmenu" ><a href="javascript:" onclick="avr.mopen('m1')" onmouseout="avr.mclosetime()" class="controlbutton" id="volumeControl" title="Volume">Volume: 2</a>
            <div id="m1"
                onmouseover="avr.mcancelclosetime()"
                onmouseout="avr.mclosetime()">
                <a href="javascript:" onclick="avr.mclose(); avr.changeVolume(1.0, 4)" title="">4</a>
                <a href="javascript:" onclick="avr.mclose(); avr.changeVolume(0.65, 3)" title="">3</a>
                <a href="javascript:" onclick="avr.mclose(); avr.changeVolume(0.35, 2)" title="">2</a>
                <a href="javascript:" onclick="avr.mclose(); avr.changeVolume(0.1, 1)" title="">1</a>
                <a href="javascript:" onclick="avr.mclose(); avr.changeVolume(0, 0)" title="">0 (Mute) &nbsp; &nbsp;  &nbsp; &nbsp;</a>
            </div>
        </li>
    </ul>
</div>

<div id="subcontrols">
    <div class="controls">
        <div>
        <ul id="scalesbuttons">
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 42, 44, 45, 47, 49, 51, 52, 51, 49, 47, 45, 44, 42, 40], 4.25, 'Major', 0, 'staff1')"
                class="scaleTypeButton">Major</a></li>
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 42, 43, 45, 47, 48, 50, 52, 50, 48, 47, 45, 43, 42, 40], 4.25, 'Natural Minor', 9, 'staff1')"
                class="scaleTypeButton">Natural Minor</a></li>
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 42, 43, 45, 47, 48, 51, 52, 51, 48, 47, 45, 43, 42, 40], 4.25, 'Harmonic Minor', 9, 'staff1')"
                class="scaleTypeButton">Harmonic Minor</a></li>
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 42, 43, 45, 47, 49, 51, 52, 50, 48, 47, 45, 43, 42, 40], 4.25, 'Melodic Minor', 9, 'staff1')"
                class="scaleTypeButton">Melodic Minor</a></li>
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 43, 45, 46, 47, 50, 52, 50, 47, 46, 45, 43, 40], 4.25, 'Blues', 0, 'staff1')"
                class="scaleTypeButton">Blues</a></li>
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52], 4.9,
                'Chromatic', 0, 'staff1')" class="scaleTypeButton">Chromatic</a></li>
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 42, 44, 46, 48, 50, 41, 43, 45, 47, 49, 51], 5.3,
                'Whole Tone', 0, 'staff1')" class="scaleTypeButton">Whole Tone</a></li>
        </ul>
        <ul id="modesbuttons">
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 42, 44, 45, 47, 49, 51, 52, 51, 49, 47, 45, 44, 42, 40], 4.25, 'Ionian', 0, 'staff1')"
                class="scaleTypeButton">Ionian</a></li>
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 42, 43, 45, 47, 49, 50, 52, 50, 49, 47, 45, 43, 42, 40], 4.25, 'Dorian', 2, 'staff1')"
                class="scaleTypeButton">Dorian</a></li>
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 41, 43, 45, 47, 48, 50, 52, 50, 48, 47, 45, 43, 41, 40], 4.25, 'Phrygian', 4, 'staff1')"
                class="scaleTypeButton">Phrygian</a></li>
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 42, 44, 46, 47, 49, 51, 52, 51, 49, 47, 46, 44, 42, 40], 4.25, 'Lydian', 5, 'staff1')"
                class="scaleTypeButton">Lydian</a></li>
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 42, 44, 45, 47, 49, 50, 52, 50, 49, 47, 45, 44, 42, 40], 4.25, 'Mixolydian', 7, 'staff1')"
                class="scaleTypeButton">Mixolydian</a></li>
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 42, 43, 45, 47, 48, 50, 52, 50, 48, 47, 45, 43, 42, 40], 4.25, 'Aeolian', 9, 'staff1')"
                class="scaleTypeButton">Aeolian</a></li>
            <li><a href="javascript:"
                onclick="avr.loadScaleType([40, 41, 43, 45, 46, 48, 50, 52, 50, 48, 46, 45, 43, 41, 40], 4.25, 'Locrian', 11, 'staff1')"
                class="scaleTypeButton">Locrian</a></li>
        </ul>
        <ul id="scaleRootButtonsTopRow">
            <li><a href="javascript:" onclick="avr.loadScaleRoot(0, 'staff1')" class="scaleRootButton">C</a></li>
            <li><a href="javascript:" onclick="avr.loadScaleRoot(2, 'staff1')" class="scaleRootButton">D</a></li>
            <li><a href="javascript:" onclick="avr.loadScaleRoot(4, 'staff1')" class="scaleRootButton">E</a></li>
            <li><a href="javascript:" onclick="avr.loadScaleRoot(6, 'staff1')" class="scaleRootButton">F#/Gb</a></li>
            <li><a href="javascript:" onclick="avr.loadScaleRoot(8, 'staff1')" class="scaleRootButton">G#/Ab</a></li>
            <li><a href="javascript:" onclick="avr.loadScaleRoot(10, 'staff1')" class="scaleRootButton">A#/Bb</a></li>
        </ul>
        <ul id="scaleRootButtonsBottomRow">
            <li><a href="javascript:" onclick="avr.loadScaleRoot(1, 'staff1')" class="scaleRootButton" id="scaleRootButtonDb">C#/Db</a></li>
            <li><a href="javascript:" onclick="avr.loadScaleRoot(3, 'staff1')" class="scaleRootButton">D#/Eb</a></li>
            <li><a href="javascript:" onclick="avr.loadScaleRoot(5, 'staff1')" class="scaleRootButton">F</a></li>
            <li><a href="javascript:" onclick="avr.loadScaleRoot(7, 'staff1')" class="scaleRootButton">G</a></li>
            <li><a href="javascript:" onclick="avr.loadScaleRoot(9, 'staff1')" class="scaleRootButton">A</a></li>
            <li><a href="javascript:" onclick="avr.loadScaleRoot(11, 'staff1')" class="scaleRootButton">B</a></li>
        </ul>
        </div>

          <div id="intervalsbuttons">
            <ul id="intervals_controls0">
            <li><a href="javascript:"
                onclick="avr.loadDiatonicIntervals(6.3, 'Major Key', 'staff1')"
                class="intervalScaleButton">C Major Key</a></li>
            <li><a href="javascript:"
                onclick="avr.loadDiatonicIntervals(6.3, 'Minor Key', 'staff1')"
                class="intervalScaleButton">C Minor Key</a></li>
            <li><a href="javascript:"
                onclick="avr.loadChromaticIntervals(5.3, 'Whole Tone Scales', 'staff1')"
                class="intervalScaleButton">Whole Tone Scales</a></li>
            <li><a href="javascript:"
                onclick="avr.loadChromaticIntervals(5.3, 'Chromatic Scale', 'staff1')"
                class="intervalScaleButton">Chromatic Scale</a></li>
            </ul>
          <div id="intervals_controls1">
          <ul>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Minor 2nds', 'staff1')"
            title="1 semitone" class="intbutton1">Minor 2nds</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Minor 3rds', 'staff1')"
            title="3 semitones" class="intbutton1">Minor 3rds</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Perfect 4ths', 'staff1')"
            title="5 semitones" class="intbutton1">4ths</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Perfect 5ths', 'staff1')"
            title="7 semitones" class="intbutton1">5ths</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Major 6ths', 'staff1')"
            title="9 semitones" class="intbutton1">Major 6ths</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Major 7ths', 'staff1')"
            title="11 semitones" class="intbutton1">Major 7ths</a></li>
          </ul>
          <ul>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Major 2nds', 'staff1')"
            title="2 semitones" class="intbutton1" id="intButtonMaj2nds">Major 2nds</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Major 3rds', 'staff1')"
            title="4 semitones" class="intbutton1">Major 3rds</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Tritones', 'staff1')"
            title="6 semitones" class="intbutton1">Tritones</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Minor 6ths', 'staff1')"
            title="8 semitones" class="intbutton1">Minor 6ths</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Minor 7ths', 'staff1')"
            title="10 semitones" class="intbutton1">Minor 7ths</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Octaves', 'staff1')"
            title="12 semitones" class="intbutton1">Octaves</a></li>
          </ul>
          </div>

          <ul id="intervals_controls2">
          <li><a href="javascript:" onclick="avr.loadIntervalType('2nds', 'staff1')"
            title="1 or 2 semitones" class="intbutton2">2nds</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('3rds', 'staff1')"
            title="3 or 4 semitones" class="intbutton2">3rds</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('4ths', 'staff1')"
            title="5 (or 6) semitones" class="intbutton2">4ths</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('5ths', 'staff1')"
            title="7 (or 6) semitones" class="intbutton2">5ths</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('6ths', 'staff1')"
            title="8 or 9 semitones" class="intbutton2">6ths</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('7ths', 'staff1')"
            title="10 or 11 semitones" class="intbutton2">7ths</a></li>
          <li><a href="javascript:" onclick="avr.loadIntervalType('Octaves', 'staff1')"
            title="12 semitones" class="intbutton2">Octaves</a></li>
          </ul>
          </div>

    </div> <!-- end div controls -->

        <div id="keyboard_div">
            <div id="keys_piano">
                <ul class="keyboard_ul row2">
                    <li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(34, 'staff1')" class="keyboard_li blackkey">F#<br>Gb</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(36, 'staff1')" class="keyboard_li blackkey">G#<br>Ab</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(38, 'staff1')" class="keyboard_li blackkey">A#<br>Bb</a>
                    </li><li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(41, 'staff1')" class="keyboard_li blackkey">C#<br>Db</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(43, 'staff1')" class="keyboard_li blackkey">D#<br>Eb</a>
                    </li><li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(46, 'staff1')" class="keyboard_li blackkey">F#<br>Gb</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(48, 'staff1')" class="keyboard_li blackkey">G#<br>Ab</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(50, 'staff1')" class="keyboard_li blackkey">A#<br>Bb</a>
                    </li><li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(53, 'staff1')" class="keyboard_li blackkey">C#<br>Db</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(55, 'staff1')" class="keyboard_li blackkey">D#<br>Eb</a>
                    </li><li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(58, 'staff1')" class="keyboard_li blackkey">F#<br>Gb</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(60, 'staff1')" class="keyboard_li blackkey">G#<br>Ab</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(62, 'staff1')" class="keyboard_li blackkey">A#<br>Bb</a>
                    </li><li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(65, 'staff1')" class="keyboard_li blackkey">C#<br>Db</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(67, 'staff1')" class="keyboard_li blackkey">D#<br>Eb</a>
                    </li><li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                    </li>
                </ul>
                <ul class="keyboard_ul row1">
                    <li><a href="javascript:" onClick="avr.notePlayed(32, 'staff1')" class="keyboard_li whitekey">E<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(33, 'staff1')" class="keyboard_li whitekey">F<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(35, 'staff1')" class="keyboard_li whitekey">G<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(37, 'staff1')" class="keyboard_li whitekey">A<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(39, 'staff1')" class="keyboard_li whitekey">B<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(40, 'staff1')" class="keyboard_li whitekey">C<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(42, 'staff1')" class="keyboard_li whitekey">D<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(44, 'staff1')" class="keyboard_li whitekey">E<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(45, 'staff1')" class="keyboard_li whitekey">F<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(47, 'staff1')" class="keyboard_li whitekey">G<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(49, 'staff1')" class="keyboard_li whitekey">A<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(51, 'staff1')" class="keyboard_li whitekey">B<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(52, 'staff1')" class="keyboard_li whitekey">C<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(54, 'staff1')" class="keyboard_li whitekey">D<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(56, 'staff1')" class="keyboard_li whitekey">E<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(57, 'staff1')" class="keyboard_li whitekey">F<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(59, 'staff1')" class="keyboard_li whitekey">G<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(61, 'staff1')" class="keyboard_li whitekey">A<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(63, 'staff1')" class="keyboard_li whitekey">B<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(64, 'staff1')" class="keyboard_li whitekey">C<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(66, 'staff1')" class="keyboard_li whitekey">D<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(68, 'staff1')" class="keyboard_li whitekey">E<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(69, 'staff1')" class="keyboard_li whitekey">F<br>&nbsp;</a>
                    </li>
                </ul>
            </div>
            <div id="keys_sixsix">
                <ul class="keyboard_ul row1">
                    <li><a href="javascript:" onClick="avr.notePlayed(32, 'staff1')" class="keyboard_li whitekey">E<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(34, 'staff1')" class="keyboard_li blackkey">F#<br>Gb</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(36, 'staff1')" class="keyboard_li blackkey">G#<br>Ab</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(38, 'staff1')" class="keyboard_li blackkey">A#<br>Bb</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(40, 'staff1')" class="keyboard_li whitekey">C<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(42, 'staff1')" class="keyboard_li whitekey">D<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(44, 'staff1')" class="keyboard_li whitekey">E<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(46, 'staff1')" class="keyboard_li blackkey">F#<br>Gb</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(48, 'staff1')" class="keyboard_li blackkey">G#<br>Ab</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(50, 'staff1')" class="keyboard_li blackkey">A#<br>Bb</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(52, 'staff1')" class="keyboard_li whitekey">C<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(54, 'staff1')" class="keyboard_li whitekey">D<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(56, 'staff1')" class="keyboard_li whitekey">E<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(58, 'staff1')" class="keyboard_li blackkey">F#<br>Gb</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(60, 'staff1')" class="keyboard_li blackkey">G#<br>Ab</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(62, 'staff1')" class="keyboard_li blackkey">A#<br>Bb</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(64, 'staff1')" class="keyboard_li whitekey">C<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(66, 'staff1')" class="keyboard_li whitekey">D<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(68, 'staff1')" class="keyboard_li whitekey">E<br>&nbsp;</a>
                    </li>
                </ul>
                <ul class="keyboard_ul row2">
                    <li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(33, 'staff1')" class="keyboard_li whitekey">F<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(35, 'staff1')" class="keyboard_li whitekey">G<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(37, 'staff1')" class="keyboard_li whitekey">A<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(39, 'staff1')" class="keyboard_li whitekey">B<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(41, 'staff1')" class="keyboard_li blackkey">C#<br>Db</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(43, 'staff1')" class="keyboard_li blackkey">D#<br>Eb</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(45, 'staff1')" class="keyboard_li whitekey">F<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(47, 'staff1')" class="keyboard_li whitekey">G<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(49, 'staff1')" class="keyboard_li whitekey">A<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(51, 'staff1')" class="keyboard_li whitekey">B<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(53, 'staff1')" class="keyboard_li blackkey">C#<br>Db</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(55, 'staff1')" class="keyboard_li blackkey">D#<br>Eb</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(57, 'staff1')" class="keyboard_li whitekey">F<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(59, 'staff1')" class="keyboard_li whitekey">G<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(61, 'staff1')" class="keyboard_li whitekey">A<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(63, 'staff1')" class="keyboard_li whitekey">B<br>&nbsp;</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(65, 'staff1')" class="keyboard_li blackkey">C#<br>Db</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(67, 'staff1')" class="keyboard_li blackkey">D#<br>Eb</a>
                    </li><li><a href="javascript:" onClick="avr.notePlayed(69, 'staff1')" class="keyboard_li whitekey">F<br>&nbsp;</a>
                    </li>
                </ul>
            </div>
            <div id="keyboardSubButtons">
                <ul>
                <li><a href="javascript:" onclick="avr.clearStaffButton('staff1')" >Clear Staff</a></li>
                <li id="jankoLayoutButton"><a href="javascript:"
                onclick="avr.uiToggler('keyboard_div'); avr.instrumentToggler('none', 'block'); avr.mclose()" >Use 6-6 Janko Layout</a></li>
                <li id="pianoLayoutButton"><a href="javascript:"
                    onclick="avr.uiToggler('keyboard_div'); avr.instrumentToggler('block', 'none'); avr.mclose()" >Use Standard Piano Layout</a></li>
                <li><a href="http://musicnotation.org/wiki/Janko_keyboard" target="_blank" title="About 6-6 Janko Layout">?</a></li>
                </ul>
            </div>
        </div><!-- end keyboard_div -->
    </div>
    </div><!-- end main_controls_wrapper -->
</div><!-- end AudioVisualizer -->


<h2>Intervals and Chords</h2>
<p>In traditional music notation different intervals and chords may look the same
(e.g. major and minor thirds and triads).
In Clairnote SN the differences between intervals
are always clearly visible making it easy to see the relationships between
notes and understand the common patterns of music found in chords, scales, keys, etc.
Improvising and playing by ear involve playing by interval (by relative pitch),
so clearly seeing each interval as you play will help support learning these skills.</p>

<p>See <a title="Intervals" href="http://clairnote.org/intervals/">Intervals</a>,
<a title="Chords" href="http://clairnote.org/chords/">Chords</a>, and
<a title="Scales" href="http://clairnote.org/scales/">Scales</a> for more illustrations and discussion.</p>

<img class="alignnone size-full"
    src="http://clairnote.org/images-sn/Clairnote-and-traditional-thirds-and-triads.svg"
    alt="Thirds and triads in Clairnote SN and traditional notation" />


<h2>Clefs and Octaves</h2>
<p>In traditional music notation the notes represented by the lines and
spaces of the staff
change depending on the current clef (treble, bass, alto, tenor, etc.).
Piano music entails reading in two different clefs at once.
In Clairnote SN the lines and spaces of the staff look the same in every octave and always mean the
same thing in every octave, so there is no need to learn to read different clefs.</p>

<p>Clairnote SN's <a href="http://clairnote.org/clefs/">clef symbols</a>
simply indicate the octave register of the staff, and if you can read one
octave you can read them all.</p>

<img class="alignnone size-full"
    src="http://clairnote.org/images-sn/Clairnote-clefs-and-octaves-comparison.svg"
    alt="Clefs and octaves in Clairnote SN and traditional notation" />


<h2>Key Signatures and Accidental Signs</h2>
<p>In traditional music notation the notes on the staff may be altered
by accidental signs (sharps, flats, naturals, double sharps, double flats)
or by one of fifteen different key signatures that have to be learned and
remembered in order to play the correct notes. With Clairnote SN you simply
play the notes as they appear on the staff.</p>

<p>Clairnote SN&#8217;s <a href="http://clairnote.org/key-signatures/">key signatures</a> and
<a href="http://clairnote.org/accidental-signs/">accidental signs</a>
do not complicate the process of reading notes. They only provide <em>supplemental</em>
information &mdash; all the same information conveyed by traditional notation,
like the current key, when a note is an accidental (i.e. not in the current key),
and the different names of enharmonically equivalent notes.</p>

<img class="alignnone size-full"
    src="http://clairnote.org/images-sn/Clairnote-and-traditional-key-signature-accidental-signs-brief.svg"
    alt="Key signature and accidental signs in Clairnote SN" />


<h2>Sheet Music Videos</h2>
<p>A taste of reading music in Clairnote SN music notation.</p>

<p>
<video id="videoRainbow" controls="controls" preload="metadata" width="640" height="360"><source src="http://clairnote.org/videos/Somewhere-Over-the-Rainbow-Clairnote-SN.webm" type="video/webm" /><source src="http://clairnote.org/videos/Somewhere-Over-the-Rainbow-Clairnote-SN.mp4" type="video/mp4" />Your browser does not support the <code>video</code> element.</video>
<video id="videoDoReMi" controls="controls" preload="metadata" width="640" height="360"><source src="http://clairnote.org/videos/Do-Re-Mi-Clairnote-SN.webm" type="video/webm" /><source src="http://clairnote.org/videos/Do-Re-Mi-Clairnote-SN.mp4" type="video/mp4" />Your browser does not support the <code>video</code> element.</video>
<video id="videoBlueDanube" controls="controls" preload="auto" width="640" height="360"><source src="http://clairnote.org/videos/Strauss-Blue-Danube-Waltz-Clairnote-SN.webm" type="video/webm" /><source src="http://clairnote.org/videos/Strauss-Blue-Danube-Waltz-Clairnote-SN.mp4" type="video/mp4" />Your browser does not support the <code>video</code> element.</video>
<video id="videoGreensleeves" controls="controls" preload="metadata" width="640" height="360"><source src="http://clairnote.org/videos/Traditional-Greensleeves-Clairnote-SN.webm" type="video/webm" /><source src="http://clairnote.org/videos/Traditional-Greensleeves-Clairnote-SN.mp4" type="video/mp4" />Your browser does not support the <code>video</code> element.</video>
<video id="videoBachPrelude" controls="controls" preload="metadata" width="640" height="360"><source src="http://clairnote.org/videos/Bach-WTK1-Prelude1-Clairnote-SN.webm" type="video/webm" /><source src="http://clairnote.org/videos/Bach-WTK1-Prelude1-Clairnote-SN.mp4" type="video/mp4" />Your browser does not support the <code>video</code> element.</video>
<video id="videoElise" controls="controls" preload="metadata" width="640" height="360"><source src="http://clairnote.org/videos/Beethoven-Fuer-Elise-Clairnote-SN.webm" type="video/webm" /><source src="http://clairnote.org/videos/Beethoven-Fuer-Elise-Clairnote-SN.mp4" type="video/mp4" />Your browser does not support the <code>video</code> element.</video>
<video id="videoEntertainer" controls="controls" preload="metadata" width="640" height="360"><source src="http://clairnote.org/videos/Joplin-Entertainer-Clairnote-SN.webm" type="video/webm" /><source src="http://clairnote.org/videos/Joplin-Entertainer-Clairnote-SN.mp4" type="video/mp4" />Your browser does not support the <code>video</code> element.</video>
</p>

<ul>
<li><a href="javascript:" onClick="avr.videoToggler('videoBlueDanube')">The Blue Danube Waltz, by J.J. Strauss</a><?php /* – <a href="http://clairnote.org/sheet-music-files/StraussJJ/O314/blue_danube/blue_danube-let.pdf" target="_blank">Sheet Music (PDF)</a> */ ?></li>
<li><a href="javascript:" onClick="avr.videoToggler('videoRainbow')">Somewhere Over the Rainbow</a></li>
<li><a href="javascript:" onClick="avr.videoToggler('videoDoReMi')">Do Re Mi from the Sound of Music</a></li>
<li><a href="javascript:" onClick="avr.videoToggler('videoGreensleeves')">Greensleeves</a><?php /* – <a href="http://clairnote.org/sheet-music-files/Traditional/greensleeves/greensleeves-let.pdf" target="_blank">Sheet Music (PDF)</a> */ ?></li>
<li><a href="javascript:" onClick="avr.videoToggler('videoBachPrelude')">The Well Tempered Clavier I, Prelude I, by J.S. Bach</a><?php /* – <a href="http://clairnote.org/sheet-music-files/BachJS/BWV846/wtk1-prelude1/wtk1-prelude1-let.pdf" target="_blank">Sheet Music (PDF)</a> */ ?></li>
<li><a href="javascript:" onClick="avr.videoToggler('videoElise')">Für Elise by L.V. Beethoven</a><?php /* – <a href="http://clairnote.org/sheet-music-files/BeethovenLv/WoO59/fur_Elise_WoO59/fur_Elise_WoO59-let.pdf" target="_blank">Sheet Music (PDF)</a> */ ?></li>
<li><a href="javascript:" onClick="avr.videoToggler('videoEntertainer')">The Entertainer by Scott Joplin</a><?php /* – <a href="http://clairnote.org/sheet-music-files/JoplinS/entertainer/entertainer-let.pdf" target="_blank">Sheet Music (PDF)</a> */ ?></li>
</ul>

<p>(Videos created with <a href="http://www.lilypond.org" target="_blank">LilyPond</a> and <a href="https://github.com/aspiers/ly2video" target="_blank">ly2video</a>, with many thanks to those who work on these projects!)</p>

<h2>Sheet Music and Software</h2>
<p>There are currently over 600 works in the Clairnote SN <a href="http://clairnote.org/sn/sheet-music-library/">Sheet Music Library</a>,
all available to download for free as PDFs.  They were created with LilyPond – free (open-source) music notation software that
anyone can use to create new sheet music from scratch or to automatically convert traditional music files into Clairnote SN.
See <a title="Software: LilyPond" href="http://clairnote.org/sn/software/">Software: LilyPond</a>.
A collection of fiddle tunes, a piano lesson book, a sight-singing lesson book, and a number of other works are available under
<a href="http://clairnote.org/sn/sheet-music/">More Sheet Music</a>.</p>
<p><img class="alignnone size-full" src="http://clairnote.org/images-sn/Clairnote-blue-danube-excerpt.svg" alt="Blue Danube Waltz excerpt in Clairnote SN music notation" /></p>
<?php /*
<p>Here are a few well known pieces from the Clairnote <a href="http://clairnote.org/sheet-music-library/">Sheet Music Library</a> (PDF files):</p>
<ul>
<li><a href="http://clairnote.org/more-sheet-music-files/Twinkle-little-star-Clairnote-let.pdf" target="_blank">Twinkle, Twinkle, Little Star</a>, arranged for piano</li>
<li><a href="http://clairnote.org/sheet-music-files/StraussJJ/O314/blue_danube/blue_danube-let.pdf" target="_blank">The Blue Danube Waltz (Main Theme)</a> by Johann Strauss Jr., arranged for piano</li>
<li><a href="http://clairnote.org/sheet-music-files/Traditional/greensleeves/greensleeves-let.pdf" target="_blank">Greensleeves</a> Traditional English melody, arranged for four-part vocal harmony</li>
<li><a href="http://clairnote.org/sheet-music-files/BachJS/BWV846/wtk1-prelude1/wtk1-prelude1-let.pdf" target="_blank">Das Wohltemperierte Clavier I, Praeludium I</a> by J.S. Bach</li>
<li><a href="http://clairnote.org/sheet-music-files/BeethovenLv/WoO59/fur_Elise_WoO59/fur_Elise_WoO59-let.pdf" target="_blank">Für Elise</a> by Ludwig van Beethoven, for piano</li>
<li><a href="http://clairnote.org/sheet-music-files/JoplinS/entertainer/entertainer-let.pdf" target="_blank">The Entertainer</a> by Scott Joplin, for piano</li>
<li><a href="http://clairnote.org/sheet-music-files/JoplinS/maple/maple-let.pdf" target="_blank">Maple Leaf Rag</a> by Scott Joplin, for piano</li>
</ul>

*/ ?>

</div><!-- .entry-content -->
</article><!-- #post -->
</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
