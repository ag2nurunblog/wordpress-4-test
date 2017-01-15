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

$destaque = (!empty(get_field('imagem_destaque_da_festa'))) ? get_field('imagem_destaque_da_festa') : NULL;
$imagem_1 = (!empty(get_field('imagem_1'))) ? get_field('imagem_1') : NULL;
$imagem_2 = (!empty(get_field('imagem_2'))) ? get_field('imagem_2') : NULL;
$imagem_3 = (!empty(get_field('imagem_3'))) ? get_field('imagem_3') : NULL;
$descricao = (!empty(get_field('descricao'))) ? get_field('descricao') : NULL;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
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
			if(get_field('descricao')){
				echo "<p id='descricao'><br />".get_field('descricao')."<p/>";
			}
			$data = date("d/m/Y", strtotime(get_field('data')));
			
			echo "<p>Data da festa: {$data} </p>";

		?>
	</div><!-- .entry-content -->
	<?php if ( is_single() ) : ?>
		<?php twentyseventeen_entry_footer(); ?>
	<?php endif; ?>
</article><!-- #post-## -->
