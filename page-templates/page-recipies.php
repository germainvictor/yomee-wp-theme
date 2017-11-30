<?php
/**
  * Template name: Page Recettes
	*/
	$maxRecipes = 6;
	get_header();
	if (have_posts()) :
		while (have_posts()) :
			the_post(); 
		endwhile;
?>
		<div class="container-recipes container">
			<div class=row>
				<h1 class=" col-12 global__title page__title"><?php the_title() ?></h1>
				<h4 class=" col-12 recipes__subtitle"><?php the_field('recipes_subtitle');?></h4>
			</div>
			<div class="row">
			<?php
				$terms = get_terms( 'type', array(
					'orderby'    => 'count',
					'hide_empty' => 0
				));
				$allCount = 0;
				foreach( $terms as $term ) $allCount = $allCount + get_term($term)->count;
			?>
				<ul class="col-12 recipes__categories__selector">
					<li class="categories__item <?= array_key_exists('type', $_GET) ? '' : 'active'; ?>">
						<a href="<?php the_permalink() ?>"><?= _e('Toutes', 'yomee-theme'); ?> (<?= $allCount ?>)</a>
					</li>
					<?php 
						$current_link = get_permalink();
						foreach( $terms as $term ) :
							$count = get_term($term)->count;
					?>
							<li class="categories__item <?= $_GET['type'] == $term->slug ? 'active' : ''; ?>">
								<a href="<?= $current_link ?>?type=<?= $term->slug ?>"><?= $term->name ?> (<?=$count?>)</a>
							</li>
					<?php
						endforeach;		
					?>			
				</ul>
			</div>
			<div class="row">
				<div class=" col-12 recipes__list recipes-page__list">
					<div class="row">
					<?php
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						if(array_key_exists('type', $_GET)) :
							$type = $_GET['type'];
							$args = array(
								'post_type' => 'recettes',
								'posts_per_page' => $maxRecipes,
								'type' => $type
							);
						
						else :
							$type = 'all';
							$args = array(
								'post_type' => 'recettes',
								'posts_per_page' => $maxRecipes,
							);
						endif;
						$the_query = new WP_Query( $args );
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
					<?php if(count($the_query->posts) == $maxRecipes && $paged != $the_query->max_num_pages) : ?>
							<a href="" class="recipes__more" data-queryType="<?= $type ?>" data-paged="<?= $paged ?>" data-maxPaged="<?=$the_query->max_num_pages;?>"><div class="global__cta"><span><?php _e('Plus de recettes', 'yomee-theme');?></span></div></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<?php get_footer(); ?>
		</div>
<?php
	endif;	
?>