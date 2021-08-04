function openNav() {
	  document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

jQuery('document').ready(function($){

	jQuery('.main-menu > ul').superfish({
      delay:       500, 
      animation:   {opacity:'show',height:'show'},  
      speed:       'fast' 
    });

	jQuery('.search-box').click(function(){
        jQuery(".serach_outer").slideDown(1000);
    });

    jQuery('.closepop a').click(function(){
        jQuery(".serach_outer").slideUp(1000);
    });
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 100) {
	        jQuery('.scrollup').fadeIn();
	    } else {
	        jQuery('.scrollup').fadeOut();
	    }
	});
	jQuery('.scrollup').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});