<?php 
	get_header();
	if(have_posts()):
		while(have_posts()) : the_post()
?>
			<div id="content" class="container container-default">
				<div class="row">
					<div class="col-12">
						<h1 class="global__title page__title default__title"><?= the_title();?></h1>
						<div class="default__content"><?php the_content(); ?></div>
					</div>
				</div>
			</div>
<?php
		endwhile;
	 endif;
?>
<div class="container-fluid">
	<?php get_footer(); ?>
</div>
