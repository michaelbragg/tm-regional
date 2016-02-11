<?php

/**
* Template Name: Home Page *
* @package tm-regional *
*/

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div id="pagepiling">

            <?php module( 'intro' ); ?>

            <?php module( 'solutions' ); ?>

            <?php module( 'case-studies' ); ?>

            <?php module( 'process' ); ?>

            <div class="scroll-arrow"></div>

    </main>
    <!-- #main -->
</div>
<!-- #primary -->

 <?php get_footer(); ?>
