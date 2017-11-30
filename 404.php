<?php
	get_header();
?>

	<div class="container-notfound container">
		<section class="notfound row">
			<div class="notfound__content col-12 col-md-6">
				<h1 class="notfound__contentTitle"><?php the_title() ?></h1>
				<div class="notfound__contentText">
					<p>Oups...</p>
					<p><?=_e("Quelque chose s'est mal passé", "yomee-theme")?></p>
				</div>
				<a class="notfound__contentLink" href="<?=pll_home_url();?>"><?= _e("Retourner à l'accueil", "yomee-theme") ?></a>
			</div>
			<div class="notfound__image col-12 col-md-6">
				<img src="<?=get_template_directory_uri()?>/assets/images/404.png" alt="lost image">
			</div>
		</section>
	</div>

<div class="container-fluid">
	<?=	get_footer(); ?>
</div>