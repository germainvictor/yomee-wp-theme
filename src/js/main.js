/**
 * Imports and inits
 * 
 */

import axios from 'axios';
import ScrollReveal from 'scrollreveal';
import plyr from 'plyr';
window.sr = ScrollReveal({
	delay: 200,
	scale:1
});

/**
 * Toogle mobile menu
 * 
 */
const menu_handler = document.querySelectorAll('.menu__handler');
const menu_el = document.querySelector('.menu_header');

const handle_menu = (e) => {
	e.preventDefault();
	if(menu_el.classList.contains('active')) {
		menu_el.classList.remove('active');
		menu_handler.classList.remove('fa-close active')
	}
	else {
		menu_el.classList.add('active');
		menu_handler.classList.add('fa-bars active')			
	}
}

if(menu_handler) {
	menu_handler.forEach(handler => {
		handler.addEventListener('click', e => handle_menu(e));		
	});
}

/**
 * Animations
 * need Scrollreveal
 */

sr.reveal('.qualities__item, .partners__item, .press__item', {
	duration:200,
	viewFactor: 0.3
}, 100); 

sr.reveal('.recipes__element', {
	duration:500,
	distance: '120px',
	origin: 'bottom',
}, 100); 

sr.reveal('.gallery__picture', {
	duration:500,
	distance: '120px',
	origin: 'bottom',
}, 100); 

sr.reveal('.section-animation', {
	duration:500,
	viewFactor: 0.4
})

sr.reveal('.details-section', {
	duration:500,
	distance: '100px',
	origin: 'left',
	viewFactor: 0.4
})

sr.reveal('.tutorial-section', {
	duration:500,
	distance: '100px',
	origin: 'right',
	viewFactor: 0.4
})

sr.reveal('.row__part-left', {
	duration:500,
	distance: '50px',
	origin: 'left',
	viewFactor: 0.3
})
sr.reveal('.row__part-right', {
	duration:500,
	distance: '50px',
	origin: 'right',
	viewFactor: 0.3
})

sr.reveal('.team__member', {
	duration:300,
	distance: '50px',
	origin: 'bottom',
	viewFactor: 0.3
})

sr.reveal('.kickstarter__content', {
	duration:300,
	distance: '50px',
	origin: 'bottom',
	viewFactor: 0.4
})


/**
 * Display the product video
 * need plyr library
 */

const show_product_videoContainer = document.querySelector('.showcase-container');
if(show_product_videoContainer) {
	let player = plyr.setup('.showcase-container [data-type=youtube]')[0];
	let show_product_togglers = document.querySelectorAll('.btn-showcase-product, .show-video-closeBtn')
	show_product_togglers.forEach((el) => {
		el.addEventListener('click', (e) => {
			e.preventDefault();
			if(show_product_videoContainer.classList.contains('active')) {
				show_product_videoContainer.classList.remove('active');
				player.pause();
			}
			else {
				show_product_videoContainer.classList.add('active');
			}
		})
	})
}



/**
 * AJAX Recipes recuperation
 * 
 */

// retrieve dom elements
const more_recipes = document.querySelector('.recipes__more');
const recipes_list = document.querySelector('.recipes-page__list  > .row');

// if the button exists
if(more_recipes) {

	// retrieve data from php
	let paged_recipes = parseInt(more_recipes.getAttribute('data-paged'));
	const max_paged = parseInt(more_recipes.getAttribute('data-maxPaged'));
	const query_type = more_recipes.getAttribute('data-queryType');

	// bind a click event 
	more_recipes.addEventListener('click', (e) => {

		e.preventDefault();
		paged_recipes++

		// set settings to the post request
		let params = new URLSearchParams();
		params.append('action', 'ajax_moreRecipes');
		params.append('paged', paged_recipes);
		if(query_type !== 'all') {
			params.append('queryType', query_type);
		}

		axios.post(wpInfos.ajax_url, params )
		.then(function (response) {
			// append the data generate by the post request
			recipes_list.innerHTML += response.data;
			// remove button if there is no more pages
			if(paged_recipes === max_paged) {
				more_recipes.remove();
			}
			sr.sync();
		})
		.catch(function (error) {
			console.log(error);
		});
		
	})
}