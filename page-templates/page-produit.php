<?php
/**
 * Template name: Page Produit
*/
	get_header();
	if (have_posts()):
		while (have_posts()) :
			 the_post(); 
		endwhile;
?>
		<div class="showcase-product" style="background-image:url('<?=the_field('hero_background');?>')">
			<div class="showcase-product-overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-7"></div>
					<div class="col-md-4">
						<div class="showcase-desc">
							<div>
								<h2 class="showcase-title global__title"><?=the_field('hero_title');?></h2>
								<p><?=the_field('hero_description');?></p>
								<a href="#" class="btn btn-primary btn-showcase-product"><?=_e('Découvrir', 'yomee-theme')?></a>
								<div class="showcase-container">
									<div class="showcase-content">
										<div class="showcase-video">
											<div data-type="youtube" data-video-id="<?=the_field('hero_video_id')?>"></div>
										</div>
										<div class="showcase-video-close"><a href="" class="show-video-closeBtn"><?= _e('Fermer','yomee-theme'); ?></a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container spacer-md">
			<div class="row details details-section ">
				<div class="col-md-5">
					<h2 class="global__title"><?=the_field('details_title')?></h2>
					<div><?=the_field('details_description')?></div>
				</div>
				<div class="col-md-6 offset-md-1">
					<?php
						$image = get_field('details_picture');
						$size = 'medium';
						$args = array('class' => 'img-responsive');
						if( $image ) echo wp_get_attachment_image( $image, $size, false,$args);
					?>
				</div>
			</div>
		</div>

		<div class="container spacer-md tutorial tutorial-section">
			<div class="row">
				<div class="col-md-6">
					<p class="margin-sm"><?=the_field('details_step_subtitle')?></p>
					<h2 class="margin-sm global__title"><?=the_field('details_step_title')?></h2>
					<?php
					$image = get_field('details_step_picture');
					$size = 'medium';
					$args = array('class' => 'img-responsive');
					if( $image ) {
					echo wp_get_attachment_image( $image, $size, false,$args);
					}
				?>
				</div>
				<div class="col-md-5 offset-md-1 tutorial__steps">
				<?php
					if( have_rows('details_steps') ):
						while ( have_rows('details_steps') ) : the_row();
				?>
							<p><span><?=get_row_index()?>.</span><?=the_sub_field('details_steps_item')?></p>
				<?php
						endwhile;
					else :
					endif;
				?>
					<p><?=the_field('details_steps_after')?></p>
				</div>
			</div>
		</div>

		<div class="banner-full banner-precommand spacer-md" style="background-image: url('<?=get_field('gallery_background')?>');">
			<div class="banner-precommand-overlay"></div>
			<div class="container">
				<div class="row">
				<?php 
					$gallery = get_field('gallery_pictures');
					if($gallery):
						foreach( $gallery as $image ):
				?>
							<div class="col-md-4 grid-item gallery__picture">
								<div style="background-image: url('<?=$image['url']?>');" class="bg-square"></div>
							</div>
				<?php
						endforeach;
					endif;
				?>
					
				</div>
				<div class="text-center spacer-sm gallery__cta">
					<a href="<?=the_field('option_kickstarterLink', 'option')?>"><div class="global__cta"><span><?=_e('Pré-commandez votre Yomee', 'yomee-theme')?></span></div></a>
				</div>
			</div>
		</div>

		<div class="container spacer-md text-center">
			<div class="row">
				<div class="col-md-12 offset-md-1 col-lg-10">
					<div class="row row-with-fruits">
						<div class="col-md-3 offset-md-1 row__part row__part-left">
						<?php
							$image = get_field('environement_thermos_image_l');
							$size = 'medium';
							$args = array('class' => 'img-responsive');
							if( $image ) echo wp_get_attachment_image( $image, $size, false,$args);
						?>
						</div>
						<div class="col-md-4 row__part row__part-center">
							<h2 class="global__title"><?=the_field('environement_thermos_title');?></h2>
							<p><?=the_field('environement_thermos_description');?></p>
						</div>
						<div class="col-md-4 row__part row__part-right">
						<?php
							$image = get_field('environement_thermos_image_r');
							$size = 'medium';
							$args = array('class' => 'img-responsive');
							if( $image ) echo wp_get_attachment_image( $image, $size, false,$args);
						?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 offset-md-2  ">
							<div class="lines" style="background-image: url('<?=get_template_directory_uri() .'/assets/images/lines.png'?>');">
							<p class="lines-text"><?=_e('avec 2 produits', 'yomee-theme')?></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5 steps__item row__part-left">
							<h2 class="global__title"><?=the_field('environnement_pod_title')?></h2>
							<p><?=the_field('environnement_pod_description')?></p>
							<?php
								$image = get_field('environnement_pod_image');
								$size = 'medium';
								$args = array('class' => 'img-responsive');
								if( $image ) echo wp_get_attachment_image( $image, $size, false,$args);
							?>
						</div>
						<div class="col-md-5 offset-md-2 steps__item row__part-right">
							<h2 class="global__title"><?=the_field('environnement_app_title')?></h2>
							<p><?=the_field('environnement_app_description')?></p>
							<?php
								$image = get_field('environnement_app_image');
								$size = 'medium';
								$args = array('class' => 'img-responsive');
								if( $image ) echo wp_get_attachment_image( $image, $size, false,$args);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="banner-full banner-kickstarter spacer-md" style="background-image: url('<?=the_field('product_footer_background')?>');">
			<div class="banner-kickstarter-overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-3 offset-lg-8 col-md-4 offset-md-4 col-12">
						<h3 class="margin-sm banner-title"><?=the_field('product_footer_kc_hook')?></h3>
						<div class="row">
							<div class="col-12">
								<a href="<?=get_field('option_kickstarterLink', 'option')?>">
								<?php
									$image = get_field('option_kickstarterLogo', 'option');
									$size = 'medium';
									$args = array('class' => 'img-responsive');
									if( $image ) echo wp_get_attachment_image( $image, $size, false,$args);
								?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
	endif;
?>
	<div class="container-fluid">
		<?php get_footer(); ?>
	</div>
