<?php
/**
 * The template used for displaying festa content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>

    <?php twentysixteen_post_thumbnail(); ?>

    <div class="entry-content">
    </div>
</article>