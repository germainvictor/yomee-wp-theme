<div class="col-12 col-lg-4 col-md-6 recipes__element">
	<div class="recipes__picture" style="background-image:url('<?=the_field('recipes_image')?>')"></div>
	<div class="recipes__text">
		<p class="recipes__title"><?=the_title()?></p>
		<p class="recipes__informations">
			<span class="recipes__time"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=the_field('recipes_time')?></span>
			<span>
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
					for($i=0; $i < $rankTo5; $i++) :
				?>
						<i class="fa fa-star-o" aria-hidden="true"></i>
				<?php
					endfor;
				?>
			</span>
		</p>
		<div class="recipes__seeCta"><a href="<?=the_permalink()?>"><?php _e( 'Voir la recette', 'yomee-theme' );?></a></div>
	</div>
</div>