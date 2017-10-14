<?php
/**
 * Template Name: Search Page
 *
 * The template for the search page
 *
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

    <div id="primary" class="site-content">
        <div id="content" role="main">
            <header class="entry-header">
                <h1 class="entry-title">Search</h1>
            </header>
            <div class="entry-content">
                <p>Search the entire Clairnote site, including blog posts.</p>
                <p><?php get_search_form(); ?></p>
            </div>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>
