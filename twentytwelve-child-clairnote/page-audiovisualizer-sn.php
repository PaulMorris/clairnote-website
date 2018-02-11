<?php
/**
 * Template Name: AudioVisualizer Page SN
 *
 * Description: AudioVisualizer Page SN
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header('clairnote-sn'); ?>

<div id="primary" class="site-content">
<div id="content" role="main">
  <header class="entry-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
  </header>
  <article class="page type-page status-publish hentry">
    <div class="entry-content">

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

<p>With this AudioVisualizer you can see and hear scales, intervals,
modes, and/or the notes you play on an on-screen keyboard.
For scales and modes, look for the different interval patterns (whole steps, half steps, etc.)
that make up each one. Notice how these interval patterns remain consistent when you transpose
the scale or mode to a different root note.
For intervals, notice how easy it is to identify them and to differentiate between them.</p>

</div><!-- .entry-content -->
</article><!-- #post -->
</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
