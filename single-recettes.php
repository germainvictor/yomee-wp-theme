<?php 
get_header();
?>
<div class="container-recipe-single container-fluid">
<?php
	if (have_posts()) : 
		while (have_posts()) : the_post(); 
?>
			<div class="row hero__recipe__background" style="background-image:url('<?php the_field('recipes_image')?>')">
				<div class="hero__recipe__overlay"></div>
				<div class="col-12 col-md-10 offset-md-1 hero__recipe">
					<div class="hero__recipe__title">
						<h3 class="global__title"><?=the_title();?></h3>
					</div>
				</div>
			</div>
			<div class="row recipe__details">
				<div class="col-12 col-md-3 offset-md-1 recipe__details-left">
					<div class="recipe__time-and-rank">
						<span class="recipe__time"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=the_field('recipes_time')?></span>
						<span class="recipe__rank">
						<?php
							$rank = get_field('recipes_rank');
							for($i=0; $i < $rank; $i++) :
						?>
								<i class="fa fa-star" aria-hidden="true"></i>
						<?php
							endfor;
						?>
						<?php
							$rankTo5 = 5 - get_field('recipes_rank');
							if($rankTo5 !== 5):
								for($i=0; $i < $rankTo5; $i++) :
						?>
									<i class="fa fa-star-o" aria-hidden="true"></i>
						<?php
								endfor;
							endif;
						?>
						</span>
					</div>
					<div class="recipe__ingredients-container">
						<p class="recipe__ingredients__title"><?php _e('Ingrédients','yomee-theme'); ?></p>
						<div class="recipe__ingredients">
							<?php the_field('recipes_ingredients'); ?>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 offset-md-1 recipe__details-right">
					<div class="recipe__preparation-container">
						<p class="recipe__preparation__title"><?php _e('Préparation','yomee-theme'); ?></p>
						<div class="recipe__preparation__details">
						<?php
							if( have_rows('recipes_preparation') ):
								while ( have_rows('recipes_preparation') ) : the_row();
						?>
									<div class="recipe__preparation__step">
										<p class="recipe__preparation__step__title">	<?php the_sub_field('recipes_preparation_step_name') ?></p>
										<div class="recipe__preparation__step__details">
											<?php the_sub_field('recipes_preparation_step_description') ?>
										</div>
									</div>
						<?php
								endwhile;
							endif;
						?>
						</div>
					</div>
				</div>
			</div>
	<?php 
		endwhile;
	endif;
	?>
<?php
	$args = array(
		'post_type' => 'recettes',
		'posts_per_page' => 3,
		'orderby' => 'rand'
	);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) :
?>
		<div class="row suggestions__container">
			<div class="col-12 col-md-12 suggestions__list">
				<h3 class="suggestions__list__title">Suggestions</h3>
				<div class="row">
					<?php
						while ( $the_query->have_posts() ) : $the_query->the_post();
					?>	
							<div class="col-12 col-md-4 suggestion">
								<a href="<?php the_permalink() ?>">
									<div class="suggestion__container">
									<div class="suggestion__picture" style="background-image:url('<?php the_field('recipes_image'); ?>')"></div>
										<div class="suggestion__details">
											<p class="suggestion__title"><?php the_title() ?></p>
											<p>
												<span class="suggestion__time"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=the_field('recipes_time')?></span>
												<span class="suggestion__rank">
												<?php
													$rank = get_field('recipes_rank');
													for($i=0; $i < $rank; $i++) :
												?>
														<i class="fa fa-star" aria-hidden="true"></i>
												<?php
													endfor;
												?>
												<?php
													$rankTo5 = 5 - get_field('recipes_rank');
													if($rankTo5 !== 5):
														for($i=0; $i < $rankTo5; $i++) :
												?>
															<i class="fa fa-star-o" aria-hidden="true"></i>
												<?php
														endfor;
													endif;
												?>
												</span>
											</p>
										</div>
									</div>
								</a>
							</div>
					<?php 
						endwhile;
					?>
				</div>
			</div>
		</div>
<?php 
	endif;
?>

</div>
<div class="container-fluid">
	<?php get_footer(); ?>
</div>