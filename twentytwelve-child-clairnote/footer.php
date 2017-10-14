<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
    </div><!-- #main .wrapper -->
    <footer id="colophon" role="contentinfo">
        <div class="site-info">
        <p id="footer-links"><strong>
            <a href="#">Up to Top of Page</a> &nbsp; &nbsp; &nbsp;
            <a href="http://clairnote.org/search/">Search</a> &nbsp; &nbsp; &nbsp;
            <a href="http://clairnote.org/about/">Contact</a> &nbsp; &nbsp; &nbsp;
            <a href="http://clairnote.org/blog/">Blog</a> &nbsp; &nbsp; &nbsp;
            <a href="https://www.facebook.com/ClairnoteMusicNotation" target="_blank">Facebook</a> &nbsp; &nbsp; &nbsp;
            <a href="https://plus.google.com/+ClairnoteOrg/" target="_blank">Google+</a> &nbsp; &nbsp; &nbsp;
            <a href="https://twitter.com/Clairnote" target="_blank">Twitter</a>
        </strong></p>
        <p class="fine-print">See also
            <a href="http://musicnotation.org" target="_blank">The Music Notation Project</a> and
            <a href="http://clairnote.org/twinnote/" target="_blank">TwinNote Music Notation</a>.</p>
        <p class="fine-print"><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Clairnote</span> music notation and except where otherwise noted the content of the <span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">clairnote.org website</span> are licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/" target="_blank">Creative Commons Attribution-ShareAlike 4.0 International License</a>. This website is proudly powered by <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>">WordPress</a>.</p>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(["trackPageView"]);
  _paq.push(["enableLinkTracking"]);

  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://clairnote.org/piwik/";
    _paq.push(["setTrackerUrl", u+"piwik.php"]);
    _paq.push(["setSiteId", "1"]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
    g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->

</body>
</html>
