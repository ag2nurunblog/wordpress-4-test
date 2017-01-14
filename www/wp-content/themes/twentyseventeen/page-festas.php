<?php
/*
	Template Name: Page - Festa
*/
get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<h1>Listagem de Festas</h1>

			<br clear="all" />

			<?php

			$registros = ListaEventos();

			if(count($registros) > 0):
			
				foreach ($registros as $key => $registro):

					echo "<p><a href='" . $registro['url'] ."'><strong>" . $registro['titulo']. "</strong></a></p>";
					$data = substr($registro['data_da_festa'], -2) . '/' . substr($registro['data_da_festa'], 4, -2) . '/' . substr($registro['data_da_festa'], 0, 4);

					echo "<p><small> {$data} </small></p>";
					echo "<p>" . $registro['descricao']. "</p>";

					if(!empty($registro['imagem_de_destaque'])):
	
						echo "<p align='center'><a href='" . $registro['url'] ."'><img src='" . $registro['imagem_de_destaque']['sizes']['thumbnail'] ."' title='Imagem de Destaque' /></a></p>";

					endif;

				endforeach;

			else:

				echo "Sem festas cadastradas.";

			endif;

			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
