<?php
/**
  * Template name: Page home
	*/
	get_header();
	if (have_posts()) :
		while (have_posts()) :
			the_post(); 
		endwhile;
?>
		<div class="container-fluid">
			<section class="row hero">
				<div class="col-12 col-md-7 hero__part hero__picture">
				<?php
					$image = get_field('hero_image');
					$size = 'full'; // (thumbnail, medium, large, full or custom size)
					if( $image ) echo wp_get_attachment_image( $image, $size);
				?>
				</div>
				<div class="col-12 col-md-5 hero__part hero__text">
					<img class="hero__logo" src="<?=get_template_directory_uri() .'/assets/images/logo-simple.png'?>" alt="Yomee logo">
					<h3 class="hero__slogan"><?= the_field('hero_slogan')?></h3>
					<p class="hero__hook"><?= the_field('hero_hook')?></p>
				</div>
			</section>
			<section class="row qualities">
				<ul class="col-12 qualities__list"  style="background-image:url('<?=the_field('qualities_background')?>')">
				<?php
					if( have_rows('qualities_list') ):
						while ( have_rows('qualities_list') ) : the_row();
				?>
							<li class="qualities__item">
								<img src="<?=the_sub_field('quality_image');?>" alt="">
								<p><?=the_sub_field('quality_text');?></p>
							</li>
				<?php
						endwhile;
					endif;
				?>
				</ul>
			</section>
			<section class="row presentation ">
				<div class="col-12 col-md-10 offset-md-1 presentation__content section-animation">
					<h6 class="presentation__pretitle"><?= the_field('presentation_pretitle')?></h6>
					<h3 class="presentation__title global__title"><?= the_field('presentation_title')?></h3>
					<div class="row">
						<div class=" col-12 col-lg-7 presentation__picture">
						<?php
							$image = get_field('presentation_picture');
							$size = 'full';
							if( $image ) echo wp_get_attachment_image( $image, $size);
						?>
						</div>
						<div class="col-12 col-lg-5 presentation__text">
							<div class="presentation__description"><?=the_field('presentation_description')?></div>
							<a href="<?= get_page_link( pll_get_post(get_page_by_title( 'Produit' )->ID )); ?>"><div class="global__cta"><span><?php _e( 'En savoir plus', 'yomee-theme' );?></span></div></a>
						</div>
					</div>
				</div>
			</section>
			<?php 
				$args = array(
					'post_type' => 'recettes',
					'posts_per_page' => 3
				);
				$the_query = new WP_Query( $args );
			
			?>
			<section class="row recipes">
				<div class="col-12 col-md-10 offset-md-1 recipes__content">
					<h3 class="recipes__title global__title col-12"><?= the_field('recipes_title')?></h3>
					<div class="row recipes__list">
					<?php
						// The Loop
						if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) :
								$the_query->the_post();
								get_template_part('./template-parts/template-recipe');				
							endwhile;
							/* Restore original Post Data */
							wp_reset_postdata();
						endif;
					?>
					</div>
					<div class="recipes__more__container">
						<a class="recipes__more__page" href="<?= get_page_link( pll_get_post(get_page_by_title( 'Recettes' )->ID )); ?>"><div class="recipes__moreCta global__cta"><span><?php _e( 'Voir toutes les recettes', 'yomee-theme' );?></span></div></a>
					</div>
				</div>
			</section>
			<section class="row kickstarter" style="background-image:url('<?=the_field('kickstarter_background')?>')">
				<div>
					<div class="col-10 kickstarter__content section-animation">
						<div class="row kickstarter__title">
							<h4 class="col-12 col-md-6"><?=the_field('kickstarter_title')?></h4>
						</div>
						<div class="row kickstarter__description">
							<div class="col-12 col-md-6">
								<p><?=the_field('kickstarter_description')?></p>
							</div>
							<div class="col-12 col-md-6 kickstarter__image">
								<a href="<?=get_field('option_kickstarterLink', 'option')?>" target="_blank">
									<?php
										$image = get_field('option_kickstarterLogo', 'option');
										$size = 'medium';
										if( $image ) echo wp_get_attachment_image( $image, $size);
									?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php get_footer(); ?>
		</div>
<?php
	endif;
?>