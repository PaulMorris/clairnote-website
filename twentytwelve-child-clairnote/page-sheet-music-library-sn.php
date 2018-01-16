<?php
/**
 * Template Name: Sheet Music Library Clairnote SN
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header('clairnote-sn'); ?>

        <div id="primary" class="site-content">
            <div id="content" role="main">
                <h1 class="entry-title">Clairnote SN Sheet Music Library</h1>
                <div id="search-filter-ui">
                    <div id="search-area">
                        <span id="collection-selector-wrapper">
                            <select id="source-selector" name="source-selector">
                                <option value="mutopia" selected>Collection: The Mutopia Project</option>
                                <option value="thesession">Collection: The Session</option>
                            </select>
                        </span>
                        <input type="text" id="search-box" name="query" size="25">
                        <input type="submit" id="search-button" value="Search">
                    </div>

                    <p>
                        <span id="mutopia-filter-buttons">
                        <a id="instruments-filter-button">Filter by Instrument</a><span id="instruments-active-filters"></span> |
                        <a id="styles-filter-button">Filter by Style</a><span id="styles-active-filters"></span> |
                        <a id="composers-filter-button">Filter by Composer</a><span id="composers-active-filters"></span> |
                        </span>
                        <a id="about-button">About the Library</a>
                        <span id="showing"></span>
                        <br/>
                        <span id="collection-caption">Follow the SOURCE links below for sheet music in traditional music notation from <a target="_blank" id="collection-link" href="http://www.mutopiaproject.org/">the Mutopia Project</a>.</span>
                    </p>
                </div>
                <ul id="search-results"><em>Loading...</em></ul>
            </div><!-- #content -->
        </div><!-- #primary -->

    </div><!-- #main .wrapper -->
</div><!-- #page -->


<div id="dark-overlay">

<div id="about" class="filters">
<h3>About the Clairnote SN Sheet Music Library</h3>
<p>All of the works in the library were automatically converted from traditional music
    notation into Clairnote SN using <a href="http://clairnote.org/sn/software/">LilyPond</a>.
    Some of the LilyPond source files are from the
    <a href="http://www.mutopiaproject.org/" target="_blank">Mutopia Project</a>.
    Others have been converted to LilyPond format from ABC files from
    <a href="https://thesession.org/" target="_blank">the Session</a>.
    All of the ".ly" files have been modified slightly to achieve Clairnote SN output.
    Each piece has a link to its source page ("SOURCE") where you can find the
    original version in traditional music notation. (Some settings of
    works from the Session are not included because of errors when
    converting them to Clairnote SN.)</p>
<p><strong>Searching and Filtering:</strong> Searches are "logical and" style,
    returning only results that include <em>all</em> of the search terms.
    For the Mutopia Project collection, you can also filter the results by instrument,
    style, or composer. These filters are "logical or" style, and filter out results
    that do not satisfy <em>any</em> of the active filters.</p>
<p><strong>Browsing:</strong> To browse, leave the search box empty and optionally
    use the filters. For the Mutopia Project collection the works will be listed
    alphabetically by composer's last name, then by opus, then by title. For the
    Session collection they are listed alphabetically by title.</p>
<p><strong>Licensing:</strong> All of the files may be freely downloaded, printed,
    copied, distributed, modified, performed, and recorded, just like the original
    files. For example, see the
    <a href="http://www.mutopiaproject.org/legal.html" target="_blank">Mutopia Project license page</a>
    and the links to the license for each Mutopia Project piece.</p>
<p><strong>Thanks:</strong> This library would not be possible without LilyPond,
    the Mutopia Project, and the Session — many many thanks to everyone who
    contributes to them! Thanks also to
    <a href="http://lunrjs.com/" target="_blank">lunr.js</a>
    for the search functionality.</p>
<p><strong>Disclaimer:</strong> These files are works in progress and their
    quality may vary. Currently most have not been visually checked or edited for
    any potential layout problems after their conversion to Clairnote SN.
    (For example, manual tweaks and spacing adjustments for traditional notation
    that are not needed for Clairnote SN, or that were only needed for earlier
    versions of LilyPond.)  Please <a href="http://clairnote.org/sn/about/">report</a>
    anything that needs work.</p>
</div>


<!-- filters overlays go here -->

<div id="style-filters" class="filters">
<h3 class="filter-panel-header-main">Filter by Style</h3>
<span class="filter-panel-select-all"><a id="s-all">Select All</a> &nbsp; <a id="s-none">Deselect All</a></span>
<form name="style-form" id="style-form">

<ul class="filter-panel">
<li><input type="checkbox" name="s-box" id="Baroque" /><a class="f-link">Baroque [140]</a></li>
<li><input type="checkbox" name="s-box" id="Classical" /><a class="f-link">Classical [217]</a></li>
<li><input type="checkbox" name="s-box" id="Folk" /><a class="f-link">Folk [29]</a></li>
<li><input type="checkbox" name="s-box" id="Hymn" /><a class="f-link">Hymn [12]</a></li>
<li><input type="checkbox" name="s-box" id="Jazz" /><a class="f-link">Jazz [12]</a></li>
<li><input type="checkbox" name="s-box" id="March" /><a class="f-link">March [3]</a></li>
</ul>

<ul class="filter-panel">
<li><input type="checkbox" name="s-box" id="Modern" /><a class="f-link">Modern [13]</a></li>
<li><input type="checkbox" name="s-box" id="Renaissance" /><a class="f-link">Renaissance [7]</a></li>
<li><input type="checkbox" name="s-box" id="Romantic" /><a class="f-link">Romantic [159]</a></li>
<li><input type="checkbox" name="s-box" id="Song" /><a class="f-link">Song [16]</a></li>
<li><input type="checkbox" name="s-box" id="Technique" /><a class="f-link">Technique [19]</a></li>
</ul>

</form>
</div>

<div id="instrument-filters" class="filters">
<h3 class="filter-panel-header-main">Filter by Instrument</h3>
<span class="filter-panel-select-all"><a id="i-all">Select All</a> &nbsp; <a id="i-none">Deselect All</a></span>
<form name="instrument-form" id="instrument-form">

<ul class="filter-panel">
<li><input type="checkbox" name="i-box" id="Bass" /><a class="f-link">Bass [16]</a></li>
<li><input type="checkbox" name="i-box" id="Basso-continuo" /><a class="f-link">Basso-continuo [3]</a></li>
<li><input type="checkbox" name="i-box" id="Bassoon" /><a class="f-link">Bassoon [7]</a></li>
<li><input type="checkbox" name="i-box" id="Brass-ensemble" /><a class="f-link">Brass-ensemble [2]</a></li>
<li><input type="checkbox" name="i-box" id="Cello" /><a class="f-link">Cello [20]</a></li>
<li><input type="checkbox" name="i-box" id="Choir" /><a class="f-link">Choir [31]</a></li>
<li><input type="checkbox" name="i-box" id="Clarinet" /><a class="f-link">Clarinet [5]</a></li>
<li><input type="checkbox" name="i-box" id="Clavier" /><a class="f-link">Clavier [1]</a></li>
<li><input type="checkbox" name="i-box" id="Double-bass" /><a class="f-link">Double-bass [2]</a></li>
</ul>

<ul class="filter-panel">
<li><input type="checkbox" name="i-box" id="Ensemble" /><a class="f-link">Ensemble [6]</a></li>
<li><input type="checkbox" name="i-box" id="Flute" /><a class="f-link">Flute [7]</a></li>
<li><input type="checkbox" name="i-box" id="Guitar" /><a class="f-link">Guitar [184]</a></li>
<li><input type="checkbox" name="i-box" id="Harpsichord" /><a class="f-link">Harpsichord [64]</a></li>
<li><input type="checkbox" name="i-box" id="Horn" /><a class="f-link">Horn [16]</a></li>
<li><input type="checkbox" name="i-box" id="Koto" /><a class="f-link">Koto [16]</a></li>
<li><input type="checkbox" name="i-box" id="Lute" /><a class="f-link">Lute [8]</a></li>
<li><input type="checkbox" name="i-box" id="Mandolin" /><a class="f-link">Mandolin [23]</a></li>
<li><input type="checkbox" name="i-box" id="Oboe" /><a class="f-link">Oboe [4]</a></li>
</ul>

<ul class="filter-panel">
<li><input type="checkbox" name="i-box" id="Orchestra" /><a class="f-link">Orchestra [6]</a></li>
<li><input type="checkbox" name="i-box" id="Organ" /><a class="f-link">Organ [30]</a></li>
<li><input type="checkbox" name="i-box" id="Piano" /><a class="f-link">Piano [240]</a></li>
<li><input type="checkbox" name="i-box" id="Recorder" /><a class="f-link">Recorder [1]</a></li>
<li><input type="checkbox" name="i-box" id="Shakuhachi" /><a class="f-link">Shakuhachi [1]</a></li>
<li><input type="checkbox" name="i-box" id="Shamisen" /><a class="f-link">Shamisen [7]</a></li>
<li><input type="checkbox" name="i-box" id="String-ensemble" /><a class="f-link">String-ensemble [5]</a></li>
<li><input type="checkbox" name="i-box" id="String-quartet" /><a class="f-link">String-quartet [4]</a></li>
<li><input type="checkbox" name="i-box" id="Timpani" /><a class="f-link">Timpani [3]</a></li>
</ul>

<ul class="filter-panel">
<li><input type="checkbox" name="i-box" id="Trombone" /><a class="f-link">Trombone [2]</a></li>
<li><input type="checkbox" name="i-box" id="Trumpet" /><a class="f-link">Trumpet [7]</a></li>
<li><input type="checkbox" name="i-box" id="Vihuela" /><a class="f-link">Vihuela [2]</a></li>
<li><input type="checkbox" name="i-box" id="Viola" /><a class="f-link">Viola [25]</a></li>
<li><input type="checkbox" name="i-box" id="Violin" /><a class="f-link">Violin [40]</a></li>
<li><input type="checkbox" name="i-box" id="Voice" /><a class="f-link">Voice [64]</a></li>
</ul>

</form>
</div>

<div id="composer-filters" class="filters">
<h3 class="filter-panel-header-main">Filter by Composer</h3>
<span class="filter-panel-select-all"><a id="c-all">Select All</a> &nbsp; <a id="c-none">Deselect All</a></span>
<form name="composer-form" id="composer-form">

<ul class="filter-panel">
<li class="filter-panel-header">A - B</li>
<li><input type="checkbox" name="c-box" id="AbtF" /><a class="f-link">Abt, F. (1819–1885) [1]</a></li>
<li><input type="checkbox" name="c-box" id="AdamsS" /><a class="f-link">Adams, S. (1844–1913) [1]</a></li>
<li><input type="checkbox" name="c-box" id="AguadoD" /><a class="f-link">Aguado, D. (1784–1849) [25]</a></li>
<li><input type="checkbox" name="c-box" id="AllegriG" /><a class="f-link">Allegri, G. (c.1582–1652) [1]</a></li>
<li><input type="checkbox" name="c-box" id="AndreJ" /><a class="f-link">André, J. (1741–1799) [1]</a></li>
<li><input type="checkbox" name="c-box" id="Anonymous" /><a class="f-link">Anonymous,   [4]</a></li>
<li><input type="checkbox" name="c-box" id="ArbanJB" /><a class="f-link">Arban, J.-B. (1825–1889) [1]</a></li>
<li><input type="checkbox" name="c-box" id="ArneT" /><a class="f-link">Arne, T. (1710–1788) [1]</a></li>
<li><input type="checkbox" name="c-box" id="AscherJ" /><a class="f-link">Ascher, J. (1829–1869) [1]</a></li>
<li><input type="checkbox" name="c-box" id="BachJS" /><a class="f-link">Bach, J. S. (1685–1750) [55]</a></li>
</ul>

<ul class="filter-panel">
<li class="filter-panel-header">B - B</li>
<li><input type="checkbox" name="c-box" id="BanchieriA" /><a class="f-link">Banchieri, A. (c.1567–1634) [6]</a></li>
<li><input type="checkbox" name="c-box" id="BarbellaE" /><a class="f-link">Barbella, E. (1718–1777) [5]</a></li>
<li><input type="checkbox" name="c-box" id="BartokB" /><a class="f-link">Bartók, B. (1881–1945) [1]</a></li>
<li><input type="checkbox" name="c-box" id="BeethovenLv" /><a class="f-link">Beethoven, L. V. (1770–1827) [9]</a></li>
<li><input type="checkbox" name="c-box" id="BehrF" /><a class="f-link">Behr, F. (1837–1898) [1]</a></li>
<li><input type="checkbox" name="c-box" id="BendaJA" /><a class="f-link">Benda, J. A. (1722–1795) [1]</a></li>
<li><input type="checkbox" name="c-box" id="BenoitP" /><a class="f-link">Benoit, P. (1834–1901) [1]</a></li>
<li><input type="checkbox" name="c-box" id="BishopHR" /><a class="f-link">Bishop, H. R. (1786–1855) [1]</a></li>
<li><input type="checkbox" name="c-box" id="BlakeB" /><a class="f-link">Blake, B. (1751–1827) [6]</a></li>
<li><input type="checkbox" name="c-box" id="BoismortierJBd" /><a class="f-link">Boismortier, J. B. de (1689–1755) [3]</a></li>
</ul>

<ul class="filter-panel">
<li class="filter-panel-header">B - C</li>
<li><input type="checkbox" name="c-box" id="BourgeoisL" /><a class="f-link">Bourgeois, L. (c.1510–1560) [1]</a></li>
<li><input type="checkbox" name="c-box" id="BrahmsJ" /><a class="f-link">Brahms, J. (1833–1897) [5]</a></li>
<li><input type="checkbox" name="c-box" id="BreyC" /><a class="f-link">Brey, C. (1954–) [1]</a></li>
<li><input type="checkbox" name="c-box" id="BrownCJ" /><a class="f-link">Brown, C. J. (1947–) [1]</a></li>
<li><input type="checkbox" name="c-box" id="BruchM" /><a class="f-link">Bruch, M. (1838–1920) [2]</a></li>
<li><input type="checkbox" name="c-box" id="BrucknerA" /><a class="f-link">Bruckner, A. (1824–1896) [1]</a></li>
<li><input type="checkbox" name="c-box" id="BurgmullerJFF" /><a class="f-link">Burgmüller, J. F. F. (1806–1874) [16]</a></li>
<li><input type="checkbox" name="c-box" id="BuxtehudeD" /><a class="f-link">Buxtehude, D. (c.1637–1707) [1]</a></li>
<li><input type="checkbox" name="c-box" id="CarcassiM" /><a class="f-link">Carcassi, M. (1792–1853) [29]</a></li>
<li><input type="checkbox" name="c-box" id="CareyH" /><a class="f-link">Carey, H. (1687?–1743) [1]</a></li>
</ul>

<ul class="filter-panel">
<li class="filter-panel-header">C - D</li>
<li><input type="checkbox" name="c-box" id="CaudiosoD" /><a class="f-link">Caudioso, D. (17??–?) [1]</a></li>
<li><input type="checkbox" name="c-box" id="CecereC" /><a class="f-link">Cecere, C. (1706–1761) [1]</a></li>
<li><input type="checkbox" name="c-box" id="ChopinFF" /><a class="f-link">Chopin, F. F. (1810–1849) [14]</a></li>
<li><input type="checkbox" name="c-box" id="Claribel" /><a class="f-link">Claribel [C. A. Barnard ],  (1830–1869) [1]</a></li>
<li><input type="checkbox" name="c-box" id="ClementiM" /><a class="f-link">Clementi, M. (1752–1832) [1]</a></li>
<li><input type="checkbox" name="c-box" id="CocchiG" /><a class="f-link">Cocchi, G. (1712–1796) [1]</a></li>
<li><input type="checkbox" name="c-box" id="CzernyC" /><a class="f-link">Czerny, C. (1791–1857) [26]</a></li>
<li><input type="checkbox" name="c-box" id="DandrieuJ" /><a class="f-link">Dandrieu, J.-F. (1681–1738) [1]</a></li>
<li><input type="checkbox" name="c-box" id="DebussyC" /><a class="f-link">Debussy, C. (1862–1918) [1]</a></li>
<li><input type="checkbox" name="c-box" id="DiabelliA" /><a class="f-link">Diabelli, A. (1781–1858) [27]</a></li>
</ul>

<ul class="filter-panel">
<li class="filter-panel-header">D - G</li>
<li><input type="checkbox" name="c-box" id="DoaneWH" /><a class="f-link">Doane, W. H. (1832–1915) [1]</a></li>
<li><input type="checkbox" name="c-box" id="EcclesH" /><a class="f-link">Eccles, H. (1670–1742) [1]</a></li>
<li><input type="checkbox" name="c-box" id="EllorJ" /><a class="f-link">Ellor, J. (1819–1899) [1]</a></li>
<li><input type="checkbox" name="c-box" id="FaureG" /><a class="f-link">Fauré, G. (1845–1924) [5]</a></li>
<li><input type="checkbox" name="c-box" id="FieldJ" /><a class="f-link">Field, J. (1782–1837) [1]</a></li>
<li><input type="checkbox" name="c-box" id="FischerJKF" /><a class="f-link">Fischer, J. K. F. (1665–1746) [1]</a></li>
<li><input type="checkbox" name="c-box" id="FosterSC" /><a class="f-link">Foster, S. C. (1826–1864) [1]</a></li>
<li><input type="checkbox" name="c-box" id="FuchsR" /><a class="f-link">Fuchs, R. (1847–1927) [1]</a></li>
<li><input type="checkbox" name="c-box" id="GabelloneG" /><a class="f-link">Gabellone, G. (1727–1796) [1]</a></li>
<li><input type="checkbox" name="c-box" id="GalileiV" /><a class="f-link">Galilei, V. (1520–1591) [1]</a></li>
</ul>

<ul class="filter-panel">
<li class="filter-panel-header">G - H</li>
<li><input type="checkbox" name="c-box" id="GervasioGB" /><a class="f-link">Gervasio, G. B. (c.1725–c.1785) [7]</a></li>
<li><input type="checkbox" name="c-box" id="GiulianiM" /><a class="f-link">Giuliani, M. (1781–1829) [49]</a></li>
<li><input type="checkbox" name="c-box" id="GiulianoG" /><a class="f-link">Giuliano, G. (c.1750) [3]</a></li>
<li><input type="checkbox" name="c-box" id="GloverCW" /><a class="f-link">Glover, C. W. (1797–1868) [1]</a></li>
<li><input type="checkbox" name="c-box" id="GobbaertsL" /><a class="f-link">Gobbaerts (L. Streabbog), F. J. (1835-1886) [1]</a></li>
<li><input type="checkbox" name="c-box" id="GounodC" /><a class="f-link">Gounod, C. (1818–1893) [1]</a></li>
<li><input type="checkbox" name="c-box" id="GriegE" /><a class="f-link">Grieg, E. (1843–1907) [3]</a></li>
<li><input type="checkbox" name="c-box" id="GrignyNd" /><a class="f-link">Grigny, N. de   (1672–1703) [1]</a></li>
<li><input type="checkbox" name="c-box" id="GruberFX" /><a class="f-link">Gruber, F. X. (1787–1863) [1]</a></li>
<li><input type="checkbox" name="c-box" id="HallRB" /><a class="f-link">Hall, R. B. (1858–1907) [1]</a></li>
</ul>

<ul class="filter-panel">
<li class="filter-panel-header">H - J</li>
<li><input type="checkbox" name="c-box" id="HanonCL" /><a class="f-link">Hanon, C. L. (1819-1900) [1]</a></li>
<li><input type="checkbox" name="c-box" id="HandelGF" /><a class="f-link">Handel, G. F. (1685–1759) [18]</a></li>
<li><input type="checkbox" name="c-box" id="HaydnFJ" /><a class="f-link">Haydn, F. J. (1732–1809) [7]</a></li>
<li><input type="checkbox" name="c-box" id="HeiseP" /><a class="f-link">Heise, P. (1830–1879) [1]</a></li>
<li><input type="checkbox" name="c-box" id="HunterC" /><a class="f-link">Hunter, C. (1876–1906) [1]</a></li>
<li><input type="checkbox" name="c-box" id="HullahJ" /><a class="f-link">Hullah, J. (1812–1884) [1]</a></li>
<li><input type="checkbox" name="c-box" id="HumperdinckE" /><a class="f-link">Humperdinck, E. (1873–1916) [3]</a></li>
<li><input type="checkbox" name="c-box" id="IlievGK" /><a class="f-link">Iliev, G. K. (1977–) [1]</a></li>
<li><input type="checkbox" name="c-box" id="JolyD" /><a class="f-link">Joly, D. (?–1879) [1]</a></li>
<li><input type="checkbox" name="c-box" id="JoplinS" /><a class="f-link">Joplin, S. (1868–1917) [9]</a></li>
</ul>

<ul class="filter-panel">
<li class="filter-panel-header">K - M</li>
<li><input type="checkbox" name="c-box" id="KiallmarkGF" /><a class="f-link">Kiallmark, G. F. (1804–1887) [1]</a></li>
<li><input type="checkbox" name="c-box" id="KuffnerJ" /><a class="f-link">Küffner, J. (1776–1856) [1]</a></li>
<li><input type="checkbox" name="c-box" id="KuhlauF" /><a class="f-link">Kuhlau, F. (1786–1832) [3]</a></li>
<li><input type="checkbox" name="c-box" id="KuhnauJ" /><a class="f-link">Kuhnau, J. (1660–1722) [3]</a></li>
<li><input type="checkbox" name="c-box" id="LottiA" /><a class="f-link">Lotti, A. (c.1667–1740) [1]</a></li>
<li><input type="checkbox" name="c-box" id="LullyJB" /><a class="f-link">Lully, J. B. (1632–1687) [1]</a></li>
<li><input type="checkbox" name="c-box" id="LutherM" /><a class="f-link">Luther, M. (1483–1546) [1]</a></li>
<li><input type="checkbox" name="c-box" id="Mendelssohn-BartholdyF" /><a class="f-link">Mendelssohn-Bartholdy, F. (1809–1847) [10]</a></li>
<li><input type="checkbox" name="c-box" id="MertzJK" /><a class="f-link">Mertz, J. K. (1806–1856) [1]</a></li>
<li><input type="checkbox" name="c-box" id="MethfesselA" /><a class="f-link">Methfessel, A. (1785–1869) [1]</a></li>
</ul>

<ul class="filter-panel">
<li class="filter-panel-header">M - P</li>
<li><input type="checkbox" name="c-box" id="MilanL" /><a class="f-link">Milan, L. (1536–1561) [1]</a></li>
<li><input type="checkbox" name="c-box" id="MooreT" /><a class="f-link">Moore, T. (1779–1833) [1]</a></li>
<li><input type="checkbox" name="c-box" id="MorelandC" /><a class="f-link">Moreland, C. (?–?) [1]</a></li>
<li><input type="checkbox" name="c-box" id="MozartWA" /><a class="f-link">Mozart, W. A. (1756–1791) [29]</a></li>
<li><input type="checkbox" name="c-box" id="MuellerAE" /><a class="f-link">Müller, A. E. (1767–1817) [1]</a></li>
<li><input type="checkbox" name="c-box" id="MuellerW" /><a class="f-link">Müller, W. (1767–1835) [2]</a></li>
<li><input type="checkbox" name="c-box" id="MuffatG" /><a class="f-link">Muffat, G. (1653–1704) [1]</a></li>
<li><input type="checkbox" name="c-box" id="NeumarkG" /><a class="f-link">Neumark, G. (1621–1681) [1]</a></li>
<li><input type="checkbox" name="c-box" id="PachelbelJ" /><a class="f-link">Pachelbel, J. (1653–1706) [2]</a></li>
<li><input type="checkbox" name="c-box" id="PaganiniN" /><a class="f-link">Paganini, N. (1782–1840) [5]</a></li>
</ul>

<ul class="filter-panel">
<li class="filter-panel-header">P - R</li>
<li><input type="checkbox" name="c-box" id="PergolesiGB" /><a class="f-link">Pergolesi, G. B. (1710–1736) [1]</a></li>
<li><input type="checkbox" name="c-box" id="PezeliusJ" /><a class="f-link">Pezelius, J. (1639–1694) [2]</a></li>
<li><input type="checkbox" name="c-box" id="PleyelIJ" /><a class="f-link">Pleyel, I. J. (1757–1831) [1]</a></li>
<li><input type="checkbox" name="c-box" id="PurcellH" /><a class="f-link">Purcell, H. (1658–1695) [1]</a></li>
<li><input type="checkbox" name="c-box" id="RachmaninoffS" /><a class="f-link">Rachmaninoff, S. (1873-1943) [4]</a></li>
<li><input type="checkbox" name="c-box" id="RameauJP" /><a class="f-link">Rameau, J. P. (1683–1764) [3]</a></li>
<li><input type="checkbox" name="c-box" id="RegerM" /><a class="f-link">Reger, M. (1873–1916) [1]</a></li>
<li><input type="checkbox" name="c-box" id="RollaA" /><a class="f-link">Rolla, A. (1757–1841) [4]</a></li>
<li><input type="checkbox" name="c-box" id="RootGF" /><a class="f-link">Root, G. F. (1792–1868) [3]</a></li>
<li><input type="checkbox" name="c-box" id="RougetdeLisleCJ" /><a class="f-link">Rouget de Lisle, C. J. (1760–1836) [1]</a></li>
</ul>

<ul class="filter-panel">
<li class="filter-panel-header">S - S</li>
<li><input type="checkbox" name="c-box" id="SanzG" /><a class="f-link">Sanz, G. (1979–) [1]</a></li>
<li><input type="checkbox" name="c-box" id="SatieE" /><a class="f-link">Satie, E. (1866–1925) [14]</a></li>
<li><input type="checkbox" name="c-box" id="ScarlattiD" /><a class="f-link">Scarlatti, D. (1685–1757) [4]</a></li>
<li><input type="checkbox" name="c-box" id="SchreckG" /><a class="f-link">Schreck, G. (1849–1918) [2]</a></li>
<li><input type="checkbox" name="c-box" id="SchubertF" /><a class="f-link">Schubert, F. (1797–1828) [4]</a></li>
<li><input type="checkbox" name="c-box" id="SchulzJAP" /><a class="f-link">Schulz, J. A. P. (1747–1800) [1]</a></li>
<li><input type="checkbox" name="c-box" id="SchumannR" /><a class="f-link">Schumann, R. (1810–1856) [3]</a></li>
<li><input type="checkbox" name="c-box" id="ScriabinA" /><a class="f-link">Scriabin, A. (1872–1915) [1]</a></li>
<li><input type="checkbox" name="c-box" id="SilcherF" /><a class="f-link">Silcher, F. (1789–1860) [6]</a></li>
<li><input type="checkbox" name="c-box" id="SmallwoodW" /><a class="f-link">Smallwood, W. (1831–1897) [1]</a></li>
</ul>

<ul class="filter-panel">
<li class="filter-panel-header">S - T</li>
<li><input type="checkbox" name="c-box" id="SorF" /><a class="f-link">Sor, F. (1778–1839) [52]</a></li>
<li><input type="checkbox" name="c-box" id="StainerJ" /><a class="f-link">Stainer, J. (1840–1901) [1]</a></li>
<li><input type="checkbox" name="c-box" id="StraussJJ" /><a class="f-link">Strauss Jr., J. (1825–1899) [1]</a></li>
<li><input type="checkbox" name="c-box" id="SuterH" /><a class="f-link">Suter, H. (1870–1926) [1]</a></li>
<li><input type="checkbox" name="c-box" id="TallisT" /><a class="f-link">Tallis, T. (1681–1767) [1]</a></li>
<li><input type="checkbox" name="c-box" id="TarregaF" /><a class="f-link">Tarrega, F. (1852–1909) [3]</a></li>
<li><input type="checkbox" name="c-box" id="TchaikovskyPI" /><a class="f-link">Tchaikovsky, P. I. (1840–1893) [3]</a></li>
<li><input type="checkbox" name="c-box" id="TelemannGP" /><a class="f-link">Telemann, G. P. (1584–1635) [3]</a></li>
<li><input type="checkbox" name="c-box" id="TitelouzeJ" /><a class="f-link">Titelouze, J. (1563–1633) [9]</a></li>
<li><input type="checkbox" name="c-box" id="Traditional" /><a class="f-link">Traditional,   [32]</a></li>
</ul>

<ul class="filter-panel">
<li class="filter-panel-header">T - W</li>
<li><input type="checkbox" name="c-box" id="TurpinT" /><a class="f-link">Turpin, T. (1582/83–1649) [2]</a></li>
<li><input type="checkbox" name="c-box" id="UgolinoV" /><a class="f-link">Ugolino, V. (?–?) [1]</a></li>
<li><input type="checkbox" name="c-box" id="VidalPA" /><a class="f-link">Vidal, P. A. (1863–1931) [1]</a></li>
<li><input type="checkbox" name="c-box" id="VivaldiA" /><a class="f-link">Vivaldi, A. (1678–1741) [1]</a></li>
<li><input type="checkbox" name="c-box" id="VolkmannR" /><a class="f-link">Volkmann, R. (1815–1883) [3]</a></li>
<li><input type="checkbox" name="c-box" id="WadeJF" /><a class="f-link">Wade, J. F. (1711–1786) [1]</a></li>
<li><input type="checkbox" name="c-box" id="WeckmannM" /><a class="f-link">Weckmann, M. (1621–1674) [1]</a></li>
<li><input type="checkbox" name="c-box" id="WeelkesT" /><a class="f-link">Weelkes, T. (1576–1623) [1]</a></li>
<li><input type="checkbox" name="c-box" id="WernerH" /><a class="f-link">Werner, H. (1800–1833) [2]</a></li>
<li><input type="checkbox" name="c-box" id="WorrallH" /><a class="f-link">Worrall, H. (1825–1902) [1]</a></li>
</ul>

</form>
</div>


<!-- end filters overlays -->

<span id="dark-overlay-text">Click to Close</span>
</div>

<?php wp_footer(); ?>

<!--[if lt IE 9]>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/svg-replacer.js"></script>
<![endif]-->

<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//clairnote.org/analytics/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->
</body>
</html>
