<?php

// Enqueue js and css files for particular pages.

function enqueue_js($name, $address) {
    // By default we add js scripts to the footer so they can do onload stuff.
    // The 'true' argument does this.
    wp_enqueue_script($name, $address, array(), false, true);
}

function enqueue_clairnote_js_css() {

    $uri = get_stylesheet_directory_uri();

    // Parent theme and child theme css files.
    $parent_style = 'twentytwelve-style';
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style',
        $uri . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );

    // For blog posts, etc. (not wp "pages").
    if (!is_page()) {
        enqueue_js('non-page-script', $uri . '/js/non-page-script.js');
    }

    // Home Page (29) and Clairnote SN Home Page (3646)
    if (is_page(array(29, 3646))) {
        enqueue_js('howler', $uri . '/js/howler.min.js');
        enqueue_js('audiovisualizer', $uri . '/js/audiovisualizer.js');
        if (is_page(3646)) {
            enqueue_js('audiovisualizer-sn-home', $uri . '/js/audiovisualizer-sn.js');
        }
        enqueue_js('audiovisualizer-clairnote', $uri . '/js/audiovisualizer-clairnote.js');
        wp_register_style('audiovisualizer-style', $uri . '/css/audiovisualizer.css');
        wp_enqueue_style('audiovisualizer-style');
    }

    // Game-Learn (1039)
    if (is_page(array(1039, 3695))) {
        enqueue_js('howler-game', $uri . '/js/howler.min.js');
        enqueue_js('audiovisualizer-game', $uri . '/js/audiovisualizer.js');
        if (is_page(3695)) {
            enqueue_js('audiovisualizer-sn-game', $uri . '/js/audiovisualizer-sn.js');
        }
        enqueue_js('game', $uri . '/js/game.js');
        wp_register_style('audiovisualizer-style-for-game', $uri . '/css/audiovisualizer.css');
        wp_enqueue_style('audiovisualizer-style-for-game');
        wp_register_style('game-style', $uri . '/css/game.css');
        wp_enqueue_style('game-style');
    }

    // Sheet Music Library (2751)
    if (is_page(array(2751))) {
        enqueue_js('lunrjs', $uri . '/js/lunr.min.js');
        enqueue_js('library-search', $uri . '/js/sheet-music-library-search-with-data.js');
        wp_register_style('sheet-music-library-style', $uri . '/css/sheet-music-library-search.css');
        wp_enqueue_style('sheet-music-library-style');
    }

    // about-and-faq
    if (is_page(array('about'))) {
        wp_enqueue_script('about-script', $uri . '/js/email.js');
    }

    // Clairnote SN css (SN home is 3646)
    global $post;
    if (is_page() && ($post->post_parent=='3646' || is_page('3646'))) {
        wp_register_style('clairnote-sn-style', $uri . '/css/clairnote-sn.css');
        wp_enqueue_style('clairnote-sn-style');
    }

    // Script to add link to switch between Clairnote and Clairnote SN
    if (is_page() && !(  // no link on these pages
        is_page(3377) || // notetrainer
        is_page(2751) || // sheet music library
        is_page(8)    || // more sheet music
        is_page(2815) || // handwritten
        is_page(3057)    // musescore
    )) {
        enqueue_js('version-toggle', $uri . '/js/clairnote-sn-switch.js');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_clairnote_js_css');


// Register navigation menu for Clairnote SN.
function register_clairnote_sn_menu() {
  register_nav_menu('clairnote_sn_menu', __('Clairnote SN Menu'));
}
add_action('init', 'register_clairnote_sn_menu');


// Remove ie css from twentytwelve theme and add it from child theme.
function mytheme_dequeue_styles() {
    wp_dequeue_style('twentytwelve-ie');
}
add_action('wp_enqueue_scripts', 'mytheme_dequeue_styles', 11);

wp_enqueue_style('clairnote-ie',
    get_stylesheet_directory_uri() . '/css/ie.css',
    array('twentytwelve-style'),
    '1.0'
);
$wp_styles->add_data('clairnote-ie', 'conditional', 'lt IE 9');


// Allow .ly and .ily files to be uploaded.
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ($existing_mimes = array()) {
    // add your extension to the array
    $existing_mimes['ly'] = 'text/x-lilypond';
    $existing_mimes['ily'] = 'text/x-lilypond';
    $existing_mimes['stt'] = 'text/x-musescore';
    // or: $existing_mimes['ppt|pot|pps'] = 'application/vnd.ms-powerpoint';
    // to add multiple extensions for the same mime type
    // add as many as you like
    // removing existing file types
    unset($existing_mimes['exe']);
    // add as many as you like
    // and return the new full result
    return $existing_mimes;
}


// Custom entry meta.
if (!function_exists('twentytwelve_entry_meta')) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_entry_meta() {
    // Translators: used between list items, there is a space after the comma.
    $categories_list = get_the_category_list(__(', ', 'twentytwelve'));

    // Translators: used between list items, there is a space after the comma.
    $tag_list = get_the_tag_list('', __(', ', 'twentytwelve'));

    $date = sprintf('<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
        esc_url(get_permalink()),
        esc_attr(get_the_time()),
        esc_attr(get_the_date('c')),
        esc_html(get_the_date())
    );

    /* no link on the author name
    $author = sprintf('<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
        esc_url(get_author_posts_url(get_the_author_meta('ID'))),
        esc_attr(sprintf(__('View all posts by %s', 'twentytwelve'), get_the_author())),
        get_the_author()
    );
    */

    $author = sprintf('<span class="author vcard">%1$s</span>',
        get_the_author()
    );

    // Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
    if ($tag_list) {
        $utility_text = __('Posted on %3$s<span class="by-author"> by %4$s</span> in category %1$s and tagged %2$s.', 'twentytwelve');
    } elseif ($categories_list) {
        $utility_text = __('Posted on %3$s<span class="by-author"> by %4$s</span> in category %1$s.', 'twentytwelve');
    } else {
        $utility_text = __('Posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve');
    }

    printf(
        $utility_text,
        $categories_list,
        $tag_list,
        $date,
        $author
    );
}
endif;
