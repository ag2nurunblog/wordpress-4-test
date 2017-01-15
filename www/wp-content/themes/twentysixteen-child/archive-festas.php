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

                $data        = Timber::get_context();
                $name        = the_title('<h1 class="entry-title">', '</h1>', false);
                $id          = the_ID();
                $description = get_field('descricao', $id);
                $date        = get_field('data-da-festa', $id);
                $images      = get_field('imagens-festa', $id);
                $thumb       = wp_get_attachment_image_src(get_post_thumbnail_id($id));

                $data['description'] = isset($description) && strlen($description) ?  $description : 'Erro, sem descricao!';
                $data['date']        = isset($date) ? $date : 'Erro, sem data!';
                $data['images']      = isset($images) ? $images : 'Erro, sem imagens!';
                $data['thumb']       = isset($thumb)  ?  $thumb : 'Erro, sem thumb!';
                $data['name']        = isset($name) ? $name : 'Erro, sem nome da festa!';
                $data['id']          = $id;

                Timber::render(
                    'template-parts/content-festas.html.twig',
                    (array) $data
                );

            endwhile;
        ?>

    </main>

    <?php get_sidebar( 'content-bottom' ); ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
