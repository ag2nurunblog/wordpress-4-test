<?php
/**
 * Template part for displaying page content in single.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			// Mostra o Titulo da página e a imagem desta da festa
			the_title( '<center><h1 class="entry-title">', '</h1></center>' );
			if(get_field('imagem_destaque_da_festa')){
				echo '<br clear="all" /> <center><img src="'.get_field('imagem_destaque_da_festa').'" title="Imagem destaque da festa" /></center>';
			}

		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'  => '</div>',
			) );
			// Mostra as 3 imagens cadastradas
			echo "<ul id='menu'>";
			if(get_field('imagem_1')){
				echo "<li><img src='".get_field('imagem_1')."' title='Imagem1' /></li>";
			}
			if(get_field('imagem_2')){
				echo "<li><img src='".get_field('imagem_2')."' title='Imagem3' /></li>";
			}
			if(get_field('imagem_3')){
				echo "<li><img src='".get_field('imagem_3')."' title='Imagem3' /></li>";
			}
			echo "</ul>";
		        // Mostra a descrição do Post
			if(get_field('descricao')){
				echo "<p id='descricao'><br />".get_field('descricao')."<p/>";
			}
			// Mostra a data da festa
			$data = date("d/m/Y", strtotime(get_field('data')));
			echo "<p>Data da festa: {$data} </p>";
		?>
	</div><!-- .entry-content -->
	<?php if ( is_single() ) : ?>
		<?php twentyseventeen_entry_footer(); ?>
	<?php endif; ?>
</article><!-- #post-## -->
