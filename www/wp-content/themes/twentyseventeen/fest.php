<?php
    /**
    * Template Name: Festas
    */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <?php
                $args = array( 'post_type' => 'fest', 'posts_per_page' => 10 );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    $title = the_title('<h1 class="entry-title">', '</h1>', false);
                    $description = get_field('description');
                    $date = get_field('date');
                    $thumbnail = get_field('thumbnail');
                    $images = [
                        get_field('photo_1'),
                        get_field('photo_2'),
                        get_field('photo_3')
                    ];

                    echo "
                        {$title}
                        <div class=\"entry-content\">
                            {$description}
                    ";

                    foreach ($images as $photo) {
                        if ($photo) {
                            echo "
                                <img src=\"{$photo}\" style=\"width: 150px; height: 100px\">
                            ";
                        }
                    }

                    echo "
                        </div>
                        <img src=\"{$thumbnail}\" style=\"width: 300px; height: 200px\">
                        <p>{$date}</p>
                    ";
                endwhile;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
