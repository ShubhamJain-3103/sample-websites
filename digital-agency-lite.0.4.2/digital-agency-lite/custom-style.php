<?php

/*---------------------------First highlight color-------------------*/

	$digital_agency_lite_first_color = get_theme_mod('digital_agency_lite_first_color');

	$custom_css= "";

	if($digital_agency_lite_first_color != false){
		$custom_css .='.inner-box:hover{';
			$custom_css .='background-color: '.esc_html($digital_agency_lite_first_color).';';
		$custom_css .='}';
	}
	if($digital_agency_lite_first_color != false){
		$custom_css .='.main-navigation a:hover, .heading-text h3{';
			$custom_css .='color: '.esc_html($digital_agency_lite_first_color).';';
		$custom_css .='}';
	}	
	
	/*---------------------------second highlight color-------------------*/

	$digital_agency_lite_second_color = get_theme_mod('digital_agency_lite_second_color');

	if($digital_agency_lite_second_color != false){
		$custom_css .='#footer .textwidget a, #footer li a:hover{';
			$custom_css .='color: '.esc_html($digital_agency_lite_second_color).';';
		$custom_css .='}';
	}	
	

	$digital_agency_lite_third_color = get_theme_mod('digital_agency_lite_third_color');

	$digital_agency_lite_fourth_color = get_theme_mod('digital_agency_lite_fourth_color');

	$digital_agency_lite_fiveth_color = get_theme_mod('digital_agency_lite_fiveth_color');

	if($digital_agency_lite_fiveth_color != false){
		$custom_css .='.main-navigation ul ul li:hover > a,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, h3.section-title a, span.posted_in a, .woocommerce-MyAccount-content p a, .post-main-box:hover h3 a,#sidebar ul li a:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .woocommerce td.product-name a, .woocommerce form.woocommerce-shipping-calculator a, .woocommerce-info a, .woocommerce-privacy-policy-text p a, p.logged-in-as a{';
			$custom_css .='color: '.esc_html($digital_agency_lite_fiveth_color).';';
		$custom_css .='}';
	}

	if($digital_agency_lite_third_color != false || $digital_agency_lite_first_color != false){
		$custom_css .='.more-btn a, #comments input[type="submit"]{
		background-image: linear-gradient(to right, '.esc_html($digital_agency_lite_third_color).', '.esc_html($digital_agency_lite_first_color).');
		}';
	}

	if($digital_agency_lite_second_color != false || $digital_agency_lite_fourth_color != false){
		$custom_css .='.pagination span, .pagination a,#footer-2, .middle-header, #sidebar h3, nav.woocommerce-MyAccount-navigation ul li{
		background-image: linear-gradient(to right, '.esc_html($digital_agency_lite_second_color).', '.esc_html($digital_agency_lite_fourth_color).');
		}';
	}

	if($digital_agency_lite_first_color != false || $digital_agency_lite_third_color != false){
		$custom_css .='#comments a.comment-reply-link,#footer .tagcloud a:hover,#sidebar .tagcloud a:hover,.pagination a:hover,.pagination .current,.widget_product_search button,input[type="submit"], .scrollup, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{
		background-image: linear-gradient(to right, '.esc_html($digital_agency_lite_first_color).', '.esc_html($digital_agency_lite_third_color).');
		}';
	}