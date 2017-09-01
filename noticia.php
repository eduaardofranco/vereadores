<!DOCTYPE html>
<html lang="pt">
	<head>
		<?php include 'includes/head.php'; ?>
	</head>
	<body>
		<header class="header">
			<i class="icon-back"></i>
			<a href="index.php#vereadores-list">Voltar à página inicial</a>
		</header>
		
		<section class="vereador section">
			<?php
				require_once('phpQuery/phpQuery-onefile.php');
				//load each vereador page
				$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				$link = explode('=',$actual_link);
				$url = $link[count($link) - 1];
				$urlNoticia = 'http://www.camarapf.rs.gov.br/noticia/' .$url;
				$html = file_get_contents($urlNoticia);
				phpQuery::newDocumentHTML($html);
			?>
			<div class="noticia content clearfix">
				<?php
				//coloca class no titulo
				pq('h1')->addClass('noticia__titulo');
				//coloca class no subtitulo
				pq('h3')->addClass('noticia__subtitulo');
				//pega a data
				$date = pq('.post-meta span')->text();
				//imagem remove e adiciona atributos
				pq('.align-left')->attr('class','noticia__img');
				//remove animateScroll
				pq('.animate-onscroll.justify')->remove();
				//remove data
				pq('.post-meta')->remove();
				//conteudo
				$da = pq('.col-lg-12.col-md-12.col-sm-12:first');
				//coloca  o data do fancybox
				pq('a.jackbox ')->attr('data-fancybox','gallery');
				
				?>
				<span class="noticia__data"><?php echo $date ?></span>
				<?php echo $da ?>
			</div>
		</section>
		<?php include 'includes/footer.php' ?>

		<!--Javascript-->
		<script src="assets/fancybox/jquery.fancybox.min.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>