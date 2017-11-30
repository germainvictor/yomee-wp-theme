<?php
/**
* Template name: Page A propos
*/
	get_header();
	if ( have_posts() ) :
		while ( have_posts() ) : 
			the_post(); 
		endwhile;
?>
		<div class="container-about container">
			<div class="bkg__container bkg__1">
				<div class="bkg__item bkg__item"></div>
			</div>
			<div class="bkg__container bkg__2">
				<div class="bkg__item bkg__item"></div>
			</div>
			<div class="row ab-title">
				<div class="col-12">
					<h1 class="global__title page__title"><?=the_field('about_title')?></h1>
					<h4 class="about__subtitle"><?=the_field('about_subtitle')?></h4>
				</div>
			</div>
			<section class="row team">
				<?php 
					if( have_rows('about_team') ) : 
						while ( have_rows('about_team') ) : the_row();						
				?>
							<div class="col-md-6 col-sm-12 team__member">
								<div>
									<?php
										$image = get_sub_field('member_photo');
										$size = 'full'; // (thumbnail, medium, large, full or custom size)
										
										if( $image ) echo wp_get_attachment_image( $image, $size );
									?>
								</div>
								<div>
									<h3><?= the_sub_field('member_name'); ?></h3>
									<h5><?= the_sub_field('member_function'); ?></h5>
									<p><?= the_sub_field('member_description'); ?></p>
								</div>
							</div>
				<?php 
						endwhile;
					endif;
				?>
				</section>
			</div>
			<div class="container-about container prev-kickstarter">
				<section class="row ab-kickstarter">
					<div class="ab-kickstarter__bg" style="background-image:url('<?=the_field('about_kickstarter_bg')?>')"></div>
					<div class="ab-kickstarter__overlay"></div>
					<div class="col-12 kickstarter__content">
						<h3><?=the_field('about_kickstarter_hook')?></h3>
						<a href="<?= the_field('option_kickstarterLink', 'option') ?>">
							<?php
								$image = get_field('option_kickstarterLogo', 'option');
								$size = 'full'; // (thumbnail, medium, large, full or custom size)
								$attr = array('alt' => 'logo brand kickstarter', 'class' => 'ab-kickstarter__logo');
								if( $image ) echo wp_get_attachment_image( $image, $size, false, $attr );
							?>
						</a>
					</div>
				</section>
			</div>
			<div class="container-about container">
				<section class="row partners">
					<div class="col-12">
						<h2>Partners</h2>
					</div>
					<?php 
						if( have_rows('partners_list') ): 
							while ( have_rows('partners_list') ) : the_row();						
					?>
								<div class="col-md-3 col-sm-6 partners__item">
									<?php
										$image = get_sub_field('partner_logo');
										$size = 'full'; // (thumbnail, medium, large, full or custom size)
										$attr = array('alt' => get_sub_field('partner_name'));
										if( $image ) echo wp_get_attachment_image( $image, $size, false, $attr );
									?>
								</div>
					<?php 
							endwhile;
						endif;
					?>
				</section>
				<section class="row press">
					<div class="col-12">
						<h2><?=the_field('press_title')?></h2>
					</div>
				<?php 
					if( have_rows('press_quotes') ): 
						while ( have_rows('press_quotes') ) : the_row();						
				?>
							<div class="col-md-4 col-sm-12 press__item">
								<p><?=the_sub_field('press_quote');?></p>
								<div class="press__logos">
									<?php
										$image = get_sub_field('press_logo');
										$size = 'full'; // (thumbnail, medium, large, full or custom size)
										$attr = array('alt' => get_sub_field('press_name'));
										if( $image ) echo wp_get_attachment_image( $image, $size, false, $attr );
									?>
								</div>
								<img class="press__guillemets" src="<?=get_template_directory_uri()?>/assets/images/guillemet.png" alt="partners guillement">
							</div>
				<?php 
						endwhile;
					endif;
				?>
				</section>
			</div>
		</div>
<?php
	endif;
?>
<div class="container-fluid">
<?php
	get_footer();
?>
</div>
