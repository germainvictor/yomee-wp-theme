<?php 

// declare AJAX functions 
add_action( 'wp_ajax_ajax_moreRecipes', 'moreRecipes' );
add_action( 'wp_ajax_nopriv_ajax_moreRecipes', 'moreRecipes' );

function moreRecipes() {
    $args = array(
        'post_type' => 'recettes',
        'posts_per_page' => 6,
        'paged' => $_POST['paged']
    );
    if(array_key_exists('queryType',$_POST)) $args['type'] = $_POST['queryType']; 
    $the_query = new WP_Query( $args );
    // The Loop
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) :
            $the_query->the_post();
            // what's going to be in die()
            get_template_part('./template-parts/template-recipe');				
        endwhile;
        wp_reset_postdata();
    else : echo('error');
    endif;
    die();
 }

?>