	<!-- All wp adding for footer section -->
		<footer class="footer row">
			<div class="footer__content col-12 col-md-10 offset-md-1">
				<div class="row">
					<div class="footer__links col-md-9 col-12">
						<ul>
						<?php
							if( have_rows('options_socials', 'option') ):
								while ( have_rows('options_socials', 'option') ) : the_row();
						?>
									<li>
										<a href="<?=the_sub_field('option_socials_link')?>" title="<?= the_sub_field('option_socials_name'); ?>">
											<img src="<?= the_sub_field('option_socials_icon'); ?>" alt="<?= the_sub_field('option_socials_name'); ?>">
										</a>
									</li>
						<?php
								endwhile;
							endif;
						?>
						</ul>
						<a href="<?=the_field('option_kickstarterLink','option')?>" class="footer__kickstarterLink" target="_blank">Kickstarter</a>
						<a class="footer__legalsLink" href="<?= get_page_link( pll_get_post(get_page_by_title( 'Legals' )->ID )); ?>"><?=get_the_title(pll_get_post(get_page_by_title( 'Legals' )->ID))?></a>
						<p class="footer__credits"><?php _e('© 2017 YOMEE un produit de Lecker Labs. Tous droits réservés', 'yomee-theme');?></p>
					</div>
					<div class="footer__contact col-md-3 col-12">
						<p class="footer__contact__title"><?= _e('Nous contacter', 'yomee-theme'); ?></p>
						<p>mail: <a href="mailto:yomee@yomee.com"><?=the_field('option_contactMail', 'option')?></a></p>
						<?php
							$contactPhone = get_field_object('option_contactPhone', 'option');
							$contactPhone =  $contactPhone['prepend'].$contactPhone['value'];
						?>
						<p>tel:<a href="tel:<?=$contactPhone?>"><?=" ".$contactPhone?></a></p>
					</div>
				</div>
			</div> 
		</footer>
		<?php wp_footer();  ?>
	</body>
</html>