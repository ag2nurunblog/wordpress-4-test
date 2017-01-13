<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
            while (have_posts()) : the_post();

                get_template_part('template-parts/content', 'festas');

            endwhile;
        ?>

    </main>

    <?php get_sidebar( 'content-bottom' ); ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
