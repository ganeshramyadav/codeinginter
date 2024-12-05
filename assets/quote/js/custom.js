// BBBBBBBBBBBB
jQuery(document).ready(function(){ 
	setTimeout(function(){
		jQuery('#preloader').fadeOut(800);
	}, 1000);

	setTimeout(function(){
		jQuery('.main-search').addClass('loaded');
	},500)

	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.gore1').fadeIn();
		} else {
			jQuery('.gore1').fadeOut();
		}
		
		if (jQuery(this).scrollTop() > jQuery(window).height()/2) {
			jQuery('.bottom-drawer').addClass('scrolled');
			jQuery('body').addClass('drawerScrolled');
		} else {
			jQuery('.bottom-drawer').removeClass('scrolled');
			jQuery('body').removeClass('drawerScrolled');
		}
		
	}); 
	
	jQuery('.gore1').click(function(){
		jQuery("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});

	// smooth scroling
	jQuery(function() {
	  jQuery('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = jQuery(this.hash);
		  target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			jQuery('html,body').animate({
			  scrollTop: target.offset().top-83
			}, 1000);
			return false;
		  }
		}
	  });
	});

	// mobile menu
	jQuery('#menu-button').click(function() {
		jQuery('.overlay').toggleClass('visina');
		jQuery('#menu-button').toggleClass('top');
	});

	// search
	jQuery('.login-button').click(function(e) {
		e.stopPropagation();
		jQuery(this).toggleClass('active');
		jQuery('.cart-button').removeClass('active');
		jQuery('.login-menu').toggleClass('show-menu');
		jQuery('.cart-menu').removeClass('show-cart');
	});
	jQuery('.cart-button').click(function(e) {
		e.stopPropagation();
		jQuery(this).toggleClass('active');
		jQuery('.login-button').removeClass('active');
		jQuery('.login-menu').removeClass('show-menu');
		jQuery('.cart-menu').toggleClass('show-cart');
	});
	jQuery('html').click(function() {
		jQuery('.login-menu').removeClass('show-menu');
		jQuery('.cart-menu').removeClass('show-cart');
		jQuery('.cart-button').removeClass('active');
		jQuery('.login-button').removeClass('active');
	});
	jQuery('.nav-other').click(function(e) {
		e.stopPropagation();
	});


	jQuery('#log-overlay, .close').click(function(){
		jQuery('#log-overlay').fadeOut();
		jQuery('#reg-box').fadeOut();
		jQuery('#login-box').fadeOut();
		jQuery('#forgot-box').fadeOut();
		jQuery('#myacc-box').fadeOut();
		jQuery('#basket-popup').fadeOut();
	});
	jQuery('.reg-form').click(function(){
		jQuery('#log-overlay').fadeIn();
		jQuery('#reg-box').fadeIn();
		jQuery('#login-box').fadeOut();
		jQuery('#forgot-box').fadeOut();
		jQuery('#myacc-box').fadeOut();
	});
	jQuery('.login-form').click(function(){
		jQuery('#log-overlay').fadeIn();
		jQuery('#reg-box').fadeOut();
		jQuery('#login-box').fadeIn();
		jQuery('#forgot-box').fadeOut();
		jQuery('#myacc-box').fadeOut();
	});
	jQuery('.forgot-form').click(function(){
		jQuery('#log-overlay').fadeIn();
		jQuery('#reg-box').fadeOut();
		jQuery('#login-box').fadeOut();
		jQuery('#forgot-box').fadeIn();
		jQuery('#myacc-box').fadeOut();
	});
	jQuery('.myacc-form').click(function(){
		jQuery('#log-overlay').fadeIn();
		jQuery('#reg-box').fadeOut();
		jQuery('#login-box').fadeOut();
		jQuery('#forgot-box').fadeOut();
		jQuery('#myacc-box').fadeIn();
	});
	jQuery('.modal').click(function(){
		jQuery('.modal-overlay').fadeIn();
		jQuery('.modal-box').fadeOut();
	});
		jQuery('#basket-popup').fadeOut();

	jQuery('.basket-button').click(function(){
		jQuery('#log-overlay').fadeIn();
		jQuery('#reg-box').fadeOut();
		jQuery('#login-box').fadeOut();
		jQuery('#forgot-box').fadeOut();
		jQuery('#myacc-box').fadeOut();
		jQuery('#basket-popup').fadeIn();
	});

	jQuery('.popupp').click(function(e){
		e.stopPropagation();
		var popupp = jQuery(this).data('popup');

		jQuery('.bodyy').css({"height":"auto", "overflow" : "hidden", "padding-right": "17px"});
		jQuery('#log-overlay').fadeIn();
		jQuery(popupp).parent().parent('.popup-wrap').addClass('show-popup');
		jQuery('.dropdown').removeClass('open');
		jQuery(popupp).addClass('show-popup');
	});
	jQuery('#log-overlay, .close-popup, .close, .closee, .popup-wrap').click(function(){
		jQuery('#log-overlay').fadeOut();
		setTimeout(function(){
			jQuery('.bodyy').css({"height":"100%", "overflow" : "auto", "padding-right": "0px"});
		},300);
		jQuery('.popup-wrap').removeClass('show-popup');
		jQuery('.popup').removeClass('show-popup');
	});
	jQuery('.popup').click(function(e){
		e.stopPropagation();
	});

});