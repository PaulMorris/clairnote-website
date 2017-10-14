<?php
/**
 * Template Name: Game Development
 *
 * Description: This file is for the game on the Learn page
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

    <div id="primary" class="site-content">
        <div id="content" role="main">
          <header class="entry-header">
            <h1 id="game-h1" class="entry-title"><?php the_title(); ?></h1>
          </header>
                <div class="audiovisualizer">
                <div class="controls" id="load-content">
                    <ul id="play_controls">
                        <li id="time">
                            Time: <span id="countdown">0</span>
                        </li>
                        <li id="score" title="0 correct, 0 incorrect">
                            Score: <span id="totalTally">0</span>
                        </li>
                        <li class="JSmenu" ><a href="javascript:" onClick="tng.startButton();" id="startButton">Start</a></li>
                        <li class="JSmenu" ><a href="javascript:" onclick="avr.mopen('m2')" onmouseout="avr.mclosetime()" class="controlbutton" id="gameSelector"
                            title="Select which notes or intervals to practice.">Notes: Keyboard</a>
                            <div id="m2"
                                onmouseover="avr.mcancelclosetime()"
                                onmouseout="avr.mclosetime()">
                                <a href="javascript:" onclick="avr.mclose(); tng.changeToGame('keyboard')" title="">Notes: Keyboard</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeToGame('trumpet')" title="">Notes: Trumpet</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeToGame('intervals')" title="">Intervals</a>
                            </div>
                        </li>
                        <li class="JSmenu" ><a href="javascript:" onclick="avr.mopen('m2a')" onmouseout="avr.mclosetime()" class="controlbutton" id="notesSubGameSelector"
                            title="Select which notes or intervals to practice.">1 Octave: Naturals</a>
                            <div id="m2a"
                                onmouseover="avr.mcancelclosetime()"
                                onmouseout="avr.mclosetime()">
                                <a href="javascript:" onclick="avr.mclose(); tng.changeToNotesGame(0)" title="">1 Octave: Naturals</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeToNotesGame(1)" title="">1 Octave: Sharps & Flats</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeToNotesGame(2)" title="">1 Octave: All</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeToNotesGame(3)" title="">2 Octaves: Naturals</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeToNotesGame(4)" title="">2 Octaves: Sharps & Flats</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeToNotesGame(5)" title="">2 Octaves: All</a>
                            </div>
                        </li>
                        <li class="JSmenu" ><a href="javascript:" onclick="avr.mopen('m2b')" onmouseout="avr.mclosetime()" class="controlbutton" id="intervalsSubGameSelector"
                            title="Select which notes or intervals to practice.">Even Number of Semitones</a>
                            <div id="m2b"
                                onmouseover="avr.mcancelclosetime()"
                                onmouseout="avr.mclosetime()">
                                <a href="javascript:" onclick="avr.mclose(); tng.changeToIntervalsGame(0)" title="">Even Number of Semitones</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeToIntervalsGame(1)" title="">Odd Number of Semitones</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeToIntervalsGame(2)" title="">All Intervals</a>
                            </div>
                        </li>
                        <li class="JSmenu" ><a href="javascript:" onclick="avr.mopen('m3')" onmouseout="avr.mclosetime()" class="controlbutton" id="totalTargetsControl" title="How many notes/intervals on the staff at once?">4 at a Time</a>
                            <div id="m3"
                                onmouseover="avr.mcancelclosetime()"
                                onmouseout="avr.mclosetime()">
                                <a href="javascript:" onclick="avr.mclose(); tng.changeTotalTargets(1)" title="">&nbsp;1 at a Time</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeTotalTargets(2)" title="">&nbsp;2 at a Time</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeTotalTargets(4)" title="">&nbsp;4 at a Time</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeTotalTargets(6)" title="">&nbsp;6 at a Time</a>
                                <a href="javascript:" onclick="avr.mclose(); tng.changeTotalTargets(8)" title="">&nbsp;8 at a Time</a>
                            </div>
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

                <div id="svg_wrapper">
                    <svg id="staff1"
                         class="svg_staff"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         version="1.2"
                         width="149.34mm"
                         height="37.185mm"
                         viewBox="0 0 49.990275 12.44715">
                    </svg>

                    <svg id="staff2"
                         class="svg_staff"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         version="1.2"
                         width="149.34mm"
                         height="49.58mm"
                         viewBox="0 0 49.990275 16.5962">
                    </svg>
                </div>

                <div id="feedback"><em>Loading Audio...</em></div>

                <div id="main_controls_wrapper" >

                <div id="subcontrols">
                      <div id="intervalsbuttons" class="controls">
                          <ul id="intervals_controls1">
                          <li><span id="odd-intervals">
                          <a href="javascript:" onclick="tng.intervalClicked(1)" title="1 semitone" class="intbutton1">1: Minor 2nd</a>
                          <a href="javascript:" onclick="tng.intervalClicked(3)" title="3 semitones" class="intbutton1">3: Minor 3rd</a>
                          <a href="javascript:" onclick="tng.intervalClicked(5)" title="5 semitones" class="intbutton1">5: Perfect 4th</a>
                          <a href="javascript:" onclick="tng.intervalClicked(7)" title="7 semitones" class="intbutton1">7: Perfect 5th</a>
                          <a href="javascript:" onclick="tng.intervalClicked(9)" title="9 semitones" class="intbutton1">9: Major 6th</a>
                          <a href="javascript:" onclick="tng.intervalClicked(11)" title="11 semitones" class="intbutton1">11: Major 7th</a>
                            <br></span><span id="even-intervals">
                          <a href="javascript:" onclick="tng.intervalClicked(2)" title="2 semitones" class="intbutton1">2: Major 2nd</a>
                          <a href="javascript:" onclick="tng.intervalClicked(4)" title="4 semitones" class="intbutton1">4: Major 3rd</a>
                          <a href="javascript:" onclick="tng.intervalClicked(6)" title="6 semitones" class="intbutton1">6: Tritone</a>
                          <a href="javascript:" onclick="tng.intervalClicked(8)" title="8 semitones" class="intbutton1">8: Minor 6th</a>
                          <a href="javascript:" onclick="tng.intervalClicked(10)" title="10 semitones" class="intbutton1">10: Minor 7th</a>
                          <a href="javascript:" onclick="tng.intervalClicked(12)" title="12 semitones" class="intbutton1">12: Octave</a></span>

                          </li>
                            <li id="intervals_caption">Numbers indicate the semitones spanned by each interval.</li>
                          </ul>
                    </div> <!-- end div intervalsbuttons -->

                    <div id="keyboard_div">
                        <div id="keys_piano">
                            <ul class="keyboard_ul row2">
                                <li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(41)" class="keyboard_li blackkey">C#<br>Db</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(43)" class="keyboard_li blackkey">D#<br>Eb</a>
                                </li><li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(46)" class="keyboard_li blackkey">F#<br>Gb</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(48)" class="keyboard_li blackkey">G#<br>Ab</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(50)" class="keyboard_li blackkey">A#<br>Bb</a>
                                </li><li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                                </li><span id="piano-octave2a"><li><a href="javascript:" onClick="tng.noteClicked(53)" class="keyboard_li blackkey">C#<br>Db</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(55)" class="keyboard_li blackkey">D#<br>Eb</a>
                                </li><li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(58)" class="keyboard_li blackkey">F#<br>Gb</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(60)" class="keyboard_li blackkey">G#<br>Ab</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(62)" class="keyboard_li blackkey">A#<br>Bb</a>
                                </li><li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                                </li></span>
                            </ul>
                            <ul class="keyboard_ul row1">
                                <li><a href="javascript:" onClick="tng.noteClicked(40)" class="keyboard_li whitekey">C<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(42)" class="keyboard_li whitekey">D<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(44)" class="keyboard_li whitekey">E<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(45)" class="keyboard_li whitekey">F<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(47)" class="keyboard_li whitekey">G<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(49)" class="keyboard_li whitekey">A<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(51)" class="keyboard_li whitekey">B<br>&nbsp;</a>
                                </li><span id="piano-octave2b"><li><a href="javascript:" onClick="tng.noteClicked(52)" class="keyboard_li whitekey">C<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(54)" class="keyboard_li whitekey">D<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(56)" class="keyboard_li whitekey">E<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(57)" class="keyboard_li whitekey">F<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(59)" class="keyboard_li whitekey">G<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(61)" class="keyboard_li whitekey">A<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(63)" class="keyboard_li whitekey">B<br>&nbsp;</a>
                                </li></span>
                            </ul>
                        </div>
                        <div id="keys_sixsix">
                            <ul class="keyboard_ul row1">
                                <li><a href="javascript:" onClick="tng.noteClicked(40)" class="keyboard_li whitekey">C<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(42)" class="keyboard_li whitekey">D<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(44)" class="keyboard_li whitekey">E<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(46)" class="keyboard_li blackkey">F#<br>Gb</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(48)" class="keyboard_li blackkey">G#<br>Ab</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(50)" class="keyboard_li blackkey">A#<br>Bb</a>
                                </li><span id="sixsix-octave2a"><li><a href="javascript:" onClick="tng.noteClicked(52)" class="keyboard_li whitekey">C<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(54)" class="keyboard_li whitekey">D<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(56)" class="keyboard_li whitekey">E<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(58)" class="keyboard_li blackkey">F#<br>Gb</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(60)" class="keyboard_li blackkey">G#<br>Ab</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(62)" class="keyboard_li blackkey">A#<br>Bb</a>
                                </li></span>
                            </ul>
                            <ul class="keyboard_ul row2">
                                <li><a class="keyboard_li nokey">&nbsp;<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(41)" class="keyboard_li blackkey">C#<br>Db</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(43)" class="keyboard_li blackkey">D#<br>Eb</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(45)" class="keyboard_li whitekey">F<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(47)" class="keyboard_li whitekey">G<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(49)" class="keyboard_li whitekey">A<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(51)" class="keyboard_li whitekey">B<br>&nbsp;</a>
                                </li><span id="sixsix-octave2b"><li><a href="javascript:" onClick="tng.noteClicked(53)" class="keyboard_li blackkey">C#<br>Db</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(55)" class="keyboard_li blackkey">D#<br>Eb</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(57)" class="keyboard_li whitekey">F<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(59)" class="keyboard_li whitekey">G<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(61)" class="keyboard_li whitekey">A<br>&nbsp;</a>
                                </li><li><a href="javascript:" onClick="tng.noteClicked(63)" class="keyboard_li whitekey">B<br>&nbsp;</a>
                                </li></span>
                            </ul>
                        </div>
                        <div id="keyboardSubButtons">
                            <ul>
                                <li id="jankoLayoutButton">
                                    <a href="javascript:" onclick="avr.instrumentToggler('none', 'block'); avr.mclose()" >Use 6-6 Janko Layout</a>
                                </li>
                                <li id="pianoLayoutButton">
                                    <a href="javascript:" onclick="avr.instrumentToggler('block', 'none'); avr.mclose()" >Use Standard Piano Layout</a>
                                </li>
                                <li>
                                    <a href="http://musicnotation.org/wiki/Janko_keyboard" target="_blank" title="About 6-6 Janko Layout">?</a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- end keyboard_div -->

                    <div id="trumpetButtons" class="controls">
                        <a href="javascript:" onclick="tng.trumpetClicked('•••')" title="1 semitone" class="intbutton1">•••</a>
                        <a href="javascript:" onclick="tng.trumpetClicked('•◦•')" title="3 semitones" class="intbutton1">•◦•</a>
                        <a href="javascript:" onclick="tng.trumpetClicked('◦••')" title="5 semitones" class="intbutton1">◦••</a>
                        <a href="javascript:" onclick="tng.trumpetClicked('••◦')" title="7 semitones" class="intbutton1">••◦</a>
                        <a href="javascript:" onclick="tng.trumpetClicked('•◦◦')" title="9 semitones" class="intbutton1">•◦◦</a>
                        <a href="javascript:" onclick="tng.trumpetClicked('◦•◦')" title="11 semitones" class="intbutton1">◦•◦</a>
                        <a href="javascript:" onclick="tng.trumpetClicked('◦◦◦')" title="2 semitones" class="intbutton1">◦◦◦</a>
                    </div>

                    <div id="guitarButtons" class="controls">
                        <ul>
                            <li id="highEString" class="guitarString">
                                <a href="javascript:" onClick="tng.noteClicked(56)" class="">E</a>|
                                <a href="javascript:" onClick="tng.noteClicked(57)" class="">F</a>
                                <a href="javascript:" onClick="tng.noteClicked(58)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(59)" class="">G</a>
                                <a href="javascript:" onClick="tng.noteClicked(60)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(61)" class="">A</a>
                                <a href="javascript:" onClick="tng.noteClicked(62)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(63)" class="">B</a>

                            </li>
                            <li id="bString" class="guitarString">
                                <a href="javascript:" onClick="tng.noteClicked(51)" class="">B</a>|
                                <a href="javascript:" onClick="tng.noteClicked(52)" class="">C</a>
                                <a href="javascript:" onClick="tng.noteClicked(53)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(54)" class="">D</a>
                                <a href="javascript:" onClick="tng.noteClicked(55)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(56)" class="">E</a>
                                <a href="javascript:" onClick="tng.noteClicked(57)" class="">F</a>
                                <a href="javascript:" onClick="tng.noteClicked(58)" class="">&nbsp;</a>
                            </li>
                            <li id="gString" class="guitarString">
                                <a href="javascript:" onClick="tng.noteClicked(47)" class="">G</a>|
                                <a href="javascript:" onClick="tng.noteClicked(48)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(49)" class="">A</a>
                                <a href="javascript:" onClick="tng.noteClicked(50)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(51)" class="">B</a>
                                <a href="javascript:" onClick="tng.noteClicked(52)" class="">C</a>
                                <a href="javascript:" onClick="tng.noteClicked(53)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(54)" class="">D</a>
                            </li>
                            <li id="dString" class="guitarString">
                                <a href="javascript:" onClick="tng.noteClicked(42)" class="">D</a>|
                                <a href="javascript:" onClick="tng.noteClicked(43)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(44)" class="">E</a>
                                <a href="javascript:" onClick="tng.noteClicked(45)" class="">F</a>
                                <a href="javascript:" onClick="tng.noteClicked(46)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(47)" class="">G</a>
                                <a href="javascript:" onClick="tng.noteClicked(48)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(49)" class="">A</a>
                            </li>
                            <li id="aString" class="guitarString">
                                <a href="javascript:" onClick="tng.noteClicked(37)" class="">A</a>|
                                <a href="javascript:" onClick="tng.noteClicked(38)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(39)" class="">B</a>
                                <a href="javascript:" onClick="tng.noteClicked(40)" class="">C</a>
                                <a href="javascript:" onClick="tng.noteClicked(41)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(42)" class="">D</a>
                                <a href="javascript:" onClick="tng.noteClicked(43)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(44)" class="">E</a>
                            </li>
                            <li id="lowEString" class="guitarString">
                                <a href="javascript:" onClick="tng.noteClicked(32)" class="">E</a>|
                                <a href="javascript:" onClick="tng.noteClicked(33)" class="">F</a>
                                <a href="javascript:" onClick="tng.noteClicked(34)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(35)" class="">G</a>
                                <a href="javascript:" onClick="tng.noteClicked(36)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(37)" class="">A</a>
                                <a href="javascript:" onClick="tng.noteClicked(38)" class="">&nbsp;</a>
                                <a href="javascript:" onClick="tng.noteClicked(39)" class="">B</a>
                            </li>
                        </ul>
                    </div>

                </div><!-- end subcontrols div -->
            </div><!-- end main_controls_wrapper -->

        </div><!-- end AudioVisualizer -->

            <?php while ( have_posts() ) : the_post(); ?>
                <?php /* instead of get_template_part( 'content', 'page' );
                     which brings in content-page.php, just cut/paste and customize */ ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php /* no header needed here
                    <header class="entry-header">
                        <?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
                        <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>
                    */ ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
                    </div><!-- .entry-content -->
                    <?php /*
                    <footer class="entry-meta">
                        <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
                    </footer> <!-- .entry-meta -->
                    */ ?>
                </article><!-- #post -->

                <?php /* <?php comments_template( '', true ); ?> */ ?>

            <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>
