<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

$destaque = (!empty(get_field('imagem_de_destaque'))) ? get_field('imagem_de_destaque')['sizes']['thumbnail'] : NULL;
$foto_1 = (!empty(get_field('foto_1'))) ? get_field('foto_1')['sizes']['thumbnail'] : NULL;
$foto_2 = (!empty(get_field('foto_2'))) ? get_field('foto_2')['sizes']['thumbnail'] : NULL;
$foto_3 = (!empty(get_field('foto_3'))) ? get_field('foto_3')['sizes']['thumbnail'] : NULL;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( is_sticky() && is_home() ) :
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>
	<header class="entry-header">
		<?php
			if ( 'post' === get_post_type() ) :
				echo '<div class="entry-meta">';
					if ( is_single() ) :
						twentyseventeen_posted_on();
					else :
						echo twentyseventeen_time_link();
						twentyseventeen_edit_link();
					endif;
				echo '</div><!-- .entry-meta -->';
			endif;

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

			$data = substr(get_field('data_da_festa'), -2) . '/' . substr(get_field('data_da_festa'), -3, 2) . '/' . substr(get_field('data_da_festa'), 0, 4);

			echo "<small> {$data} </small>";

			if(isset($destaque)): ?>

				<br clear="all" />

				<img src="<?= $destaque ?>" title="Imagem de Destaque" />

			<?php endif;

		?>
	</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		
			echo "<p align='center'>";
			echo (isset($foto_1)) ? "<img src='{$foto_1}' title='Foto 1' />" : "";
			echo (isset($foto_2)) ? "<img src='{$foto_2}' title='Foto 2' />" : "";
			echo (isset($foto_3)) ? "<img src='{$foto_3}' title='Foto 3' />" : "";
			echo "<p>";

		?>


	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php twentyseventeen_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->
