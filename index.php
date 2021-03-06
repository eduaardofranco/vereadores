<!DOCTYPE html>
<html lang="pt">
	<head>
		<?php
			ob_start();
			include("includes/head.php");
			$buffer=ob_get_contents();
			ob_end_clean();

			$buffer=str_replace("%TITLE%","Meu Vereador - Home",$buffer);
			echo $buffer;
		?>
	</head>
	<body>
		<?php include 'includes/header.php' ?>
		<section id="vereadores-list" class="section">
			<?php
				require_once('phpQuery/phpQuery-onefile.php');
				$url = 'http://www.camarapf.rs.gov.br/vereadores';
				$html = file_get_contents($url);
				phpQuery::newDocumentHTML($html);
				$vereadoresList = pq('.team-member');
				$amount = pq('.team-member')->length;

				//remove atributes
				pq('.team-member h2')->removeAttr('style');
				pq('.team-member a')->removeAttr('class');
				pq('.team-member p')->remove();
				pq('.team-member .social-media')->remove();
			?>
			<div class="content">
				<h1 class="title-page">Vereadores Passo Fundo - RS</h1>
				<ul class="list-vereadores clearfix">
					<?php for($i = 0; $i < $amount; $i++) { ?>
					<?php
						$item = pq('.team-member')->eq($i);
						$link = pq('.team-member > a')->eq($i)->attr('href');
						$urlArray = explode('/',$link);
						$link = $urlArray[count($urlArray) - 1];
						$img = pq('.team-member a > img')->eq($i)->attr('src');
						$name = pq('.team-member h2')->eq($i)->text();
						$party = pq('.team-member .job')->eq($i)->text();
					?>
					<li class="item-vereador"><a href="vereador.php?vereador=<?php echo $link ?>">
						<img src="<?php echo $img ?>" class="item-vereador__image" alt="Foto: <?php echo $name ?>">
						<h3 class="item-vereador__name"><?php echo $name ?>
							<span class="item-vereador__party">(<?php echo $party ?>)</span>
						</h3>
					</a></li>
					<?php } ?>
				</ul>
			</div>
		</section>

		<?php include'includes/footer.php' ?>

		<!--Javascript-->
		<script src="assets/js/main.js"></script>
	</body>
</html>