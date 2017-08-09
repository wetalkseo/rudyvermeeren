<?php
function anps_custom_styles_font_family() {
    /* Font Default Values */
    $font_1 = "Montserrat";
    $font_2 = 'PT Sans';
    $font_3 = "Montserrat";

    /* Font 1 */
    if( get_option('font_source_1') == 'System fonts' ||
        get_option('font_source_1') == 'Custom fonts' ||
        get_option('font_source_1') == 'Google fonts' ) {

        $font_1 = urldecode(get_option('font_type_1'));
    }

    if( get_option('font_source_1') == 'Custom fonts' ) {
        anps_custom_font($font_1);
    }

    /* Font 2 */
    if( get_option('font_source_2') == 'System fonts' ||
        get_option('font_source_2') == 'Custom fonts' ||
        get_option('font_source_2') == 'Google fonts' ) {

        $font_2 = urldecode(get_option('font_type_2'));
    }

    if( get_option('font_source_2') == 'Custom fonts' ) {
        anps_custom_font($font_2);
    }

    /* Font 3 (navigation) */
    if( get_option('font_source_navigation') == 'System fonts' ||
        get_option('font_source_navigation') == 'Custom fonts' ||
        get_option('font_source_navigation') == 'Google fonts' ) {

        $font_3 = urldecode(get_option('font_type_navigation'));
    }

    if( get_option('font_source_navigation') == 'Custom fonts' ) {
        anps_custom_font($font_3);
    }

    /* Font 1 */
    ?>
	.featured-title,
	.quantity .quantity-field,
	.cart_totals th,
	.rev_slider,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.h5,
	.title.h5,
	.top-bar,
	table.table > tbody th,
	table.table > thead th,
	table.table > tfoot th,
	.search-notice-label,
	.nav-tabs a,
	.filter-dark button,
	.filter:not(.filter-dark) button,
	.orderform .quantity-field,
	.product-top-meta,
	.price,
	.onsale,
	.page-header .page-title,
	*:not(.widget) > .download,
	.contact-info,
	.btn,
	.button,
	.timeline-year,
	.breadcrumb {
  		font-family: <?php echo anps_wrap_font(esc_attr($font_1)); ?>;
	}

    <?php
    /* Font 2 */
    ?>

	.btn.btn-xs,
	body,
	.alert,
	div.wpcf7-mail-sent-ng,
	div.wpcf7-validation-errors,
	.search-result-title,
	.contact-form .form-group label,
	.contact-form .form-group .wpcf7-not-valid-tip,
	.wpcf7 .form-group label,
	.wpcf7 .form-group .wpcf7-not-valid-tip {
  		font-family: <?php echo anps_wrap_font(esc_attr($font_2)); ?>;
	}

    <?php
    /* Font 3 (Navigation Font) */
    ?>

	nav.site-navigation ul li a,
	.megamenu-title {
  		font-family: <?php echo anps_wrap_font(esc_attr($font_3)); ?>;
	}

	@media (max-width: 1199px) {
	  .site-navigation .main-menu li a {
	    font-family: <?php echo anps_wrap_font(esc_attr($font_3)); ?>;
	  }
	}
    <?php
}
function anps_custom_styles_colors() {
    /* Main colors */
    $anps_text_color = get_option('anps_text_color', '898989');
    $anps_primary_color = get_option('anps_primary_color', 'fab702');
    $anps_hovers_color = get_option('anps_hovers_color', 'ffcc43');
    $anps_headings_color = get_option('anps_headings_color', '000000');

    /* Menu colors */
    $anps_menu_text_color = get_option('anps_menu_text_color', '000000');
    $anps_menu_text_hover_color = $anps_hovers_color;
    $anps_menu_bg_color = get_option('anps_menu_bg_color', 'ffffff');
    $anps_submenu_background_color = get_option('anps_submenu_background_color', 'ffffff');
    $anps_submenu_text_color = get_option('anps_submenu_text_color', '8c8c8c');
    $anps_submenu_divider_color = get_option('anps_submenu_divider_color', 'ececec');

    /* Top bar colors */
    $anps_top_bar_color = get_option('anps_top_bar_color', '8c8c8c');
    $anps_top_bar_bg_color = get_option('anps_top_bar_bg_color', 'f9f9f9');

    /* Footer colors */
    $anps_footer_bg_color = get_option('anps_footer_bg_color', '171717');
    $anps_copyright_footer_bg_color = get_option('anps_copyright_footer_bg_color', '2c2c2c');
    $anps_footer_text_color = get_option('anps_footer_text_color', '9C9C9C');
    $anps_footer_heading_text_color = get_option('anps_footer_heading_text_color', 'ffffff');
    $anps_c_footer_text_color = get_option('anps_c_footer_text_color', '9C9C9C');

    /* Header colors */
    $anps_page_header_background_color = get_option('anps_page_header_background_color', 'ffffff');
    $anps_page_title = get_option('anps_page_title', '4e4e4e');

    /* Text on top of primary color */
    $anps_primary_text_top = get_option('anps_primary_text_top', 'ffffff');

	/* Shopping cart colors */
    $anps_woo_cart_items_number_bg_color = get_option('anps_woo_cart_items_number_bg_color', 'ffde00');
    $anps_woo_cart_items_number_color = get_option('anps_woo_cart_items_number_color', '866700');

    /* Buttons */
    // Normal
    $anps_normal_button_bg = get_option('anps_normal_button_bg', 'fab702');
    $anps_normal_button_color = get_option('anps_normal_button_color', 'ffffff');
    $anps_normal_button_hover_bg = get_option('anps_normal_button_hover_bg', 'ffcc43');
    $anps_normal_button_hover_color = get_option('anps_normal_button_hover_color', 'ffffff');

    // Gradient
    $anps_gradient_button_bg = get_option('anps_gradient_button_bg', 'fab702');
    $anps_gradient_button_color = get_option('anps_gradient_button_color', 'ffffff');
    $anps_gradient_button_hover_bg = get_option('anps_gradient_button_hover_bg', 'ffcc43');
    $anps_gradient_button_hover_color = get_option('anps_gradient_button_hover_color', 'ffffff');

    // Dark
    $anps_dark_button_bg = get_option('anps_dark_button_bg', '242424');
    $anps_dark_button_color = get_option('anps_dark_button_color', 'ffffff');
    $anps_dark_button_hover_bg = get_option('anps_dark_button_hover_bg', 'ffffff');
    $anps_dark_button_hover_color = get_option('anps_dark_button_hover_color', '242424');

    // Light
    $anps_light_button_bg = get_option('anps_light_button_bg', 'ffffff');
    $anps_light_button_color = get_option('anps_light_button_color', '242424');
    $anps_light_button_hover_bg = get_option('anps_light_button_hover_bg', '242424');
    $anps_light_button_hover_color = get_option('anps_light_button_hover_color', 'ffffff');

    // Minimal
    $anps_minimal_button_color = get_option('anps_minimal_button_color', 'fab702');
    $anps_minimal_button_hover_color = get_option('anps_minimal_button_hover_color', 'ffcc43');

    /*
		CONDITIONAL COLORS
    */

    /* Global option is set to transparent */
    if( get_option('anps_global_transparent_header', '0') == '1' ) {
    	$anps_menu_text_color = get_option('anps_global_text_color', '');
    	$anps_menu_text_hover_color = get_option('anps_global_text_hover_color', '');
    	$anps_menu_bg_color = 'transparent';
    }

    /* Is front page or options set as global */
    if( is_front_page() || get_option('anps_set_settings_as_global_header', '0') == '1' ) {
    	$anps_menu_text_color = get_option('anps_front_text_color', '');
		$anps_menu_text_hover_color = get_option('anps_front_text_hover_color', '');
		$anps_menu_bg_color = get_option('anps_front_bg_color', '');
    }

    $page_meta = get_post_meta(get_the_ID());

    /* Page meta options */
    if( isset($page_meta['anps_page_heading_full']) && $page_meta['anps_page_heading_full'][0] == 'on' ) {
    	// Top bar
    	$anps_top_bar_color = str_replace('#', '', $page_meta['anps_full_color_top_bar'][0]);

    	// Menu, title, bredcrumbs
    	$anps_menu_text_color = str_replace('#', '', $page_meta['anps_full_color_title'][0]);
    	$anps_page_title = str_replace('#', '', $page_meta['anps_full_color_title'][0]);

    	// Hover
		$anps_menu_text_hover_color = str_replace('#', '', $page_meta['anps_full_hover_color'][0]);
    }

    /* Text Color */
    ?>
  	.select2-container .select2-choice,
	.select2-container .select2-choice > .select2-chosen,
	.select2-results li,
	.widget_rss .widget-title:hover,
	.widget_rss .widget-title:focus,
	.sidebar a,
	body,
	.ghost-nav-wrap.site-navigation ul.social > li a:not(:hover),
	.ghost-nav-wrap.site-navigation .widget,
	#lang_sel a.lang_sel_sel,
	.search-notice-field,
	.product_meta .posted_in a,
	.product_meta > span > span,
	.price del,
	.post-meta li a,
	.social.social-transparent-border a,
	.social.social-border a,
	.top-bar .social a,
	.site-main .social.social-minimal a:hover,
	.site-main .social.social-minimal a:focus,
	.info-table-content strong,
	.site-footer .download-icon,
	.mini-cart-list .empty,
	.mini-cart-content,
	ol.list span,
	.product_list_widget del,
	.product_list_widget del .amount {
		color: #<?php echo esc_attr($anps_text_color); ?>;
	}

    <?php
    /* Primary Color */
    ?>

    aside .widget_shopping_cart_content .buttons a,
	.site-footer .widget_shopping_cart_content .buttons a,
	.demo_store_wrapper,
	.mini-cart-content .buttons a,
	.mini-cart-link,
	.widget_calendar caption,
	.widget_calendar a,
	.sidebar .anps_menu_widget .menu .current-menu-item > a:after,
	.sidebar .anps_menu_widget .menu .current-menu-item > a,
	.woocommerce-MyAccount-navigation .is-active > a,
	.site-footer .widget-title:after,
	.bg-primary,
	mark,
	.onsale,
	.nav-links > *:not(.dots):hover,
	.nav-links > *:not(.dots):focus,
	.nav-links > *:not(.dots).current,
	ul.page-numbers > li > *:hover,
	ul.page-numbers > li > *:focus,
	ul.page-numbers > li > *.current,
	.title:after,
	.widgettitle:after,
	.social a,
	.sidebar .download a,
	.panel-heading a,
	aside .widget_price_filter .price_slider_amount button.button,
	.site-footer .widget_price_filter .price_slider_amount button.button,
	aside .widget_price_filter .ui-slider .ui-slider-range,
	.site-footer .widget_price_filter .ui-slider .ui-slider-range,
	article.post.sticky .post-title:before,
	article.post.sticky .post-meta:before,
	article.post.sticky .post-content:before,
	aside.sidebar .widget_nav_menu .current-menu-item > a,
	.vc_row .widget_nav_menu .current-menu-item > a,
	table.table > tbody.bg-primary tr,
	table.table > tbody tr.bg-primary,
	table.table > thead.bg-primary tr,
	table.table > thead tr.bg-primary,
	table.table > tfoot.bg-primary tr,
	table.table > tfoot tr.bg-primary,
        .woocommerce-product-gallery__trigger,
	.timeline-item:before {
		background-color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

	.panel-heading a {
		border-bottom-color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

    blockquote:not([class]) p,
    .blockquote-style-1 p {
        border-left-color: #<?php echo esc_attr($anps_primary_color); ?>;
    }

	::-moz-selection {
		background-color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

	::selection {
		background-color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

	aside .widget_price_filter .price_slider_amount .from,
	aside .widget_price_filter .price_slider_amount .to,
	.site-footer .widget_price_filter .price_slider_amount .from,
	.site-footer .widget_price_filter .price_slider_amount .to,
	.mini-cart-content .total .amount,
	.widget_calendar #today,
	.widget_rss ul .rsswidget,
	.site-footer a:hover,
	.site-footer a:focus,
	b,
	a,
	.ghost-nav-wrap.site-navigation ul.social > li a:hover,
	.site-header.vertical .social li a:hover,
	.site-header.vertical .contact-info li a:hover,
	.site-header.classic .above-nav-bar .contact-info li a:hover,
	.site-header.transparent .contact-info li a:hover,
	.ghost-nav-wrap.site-navigation .contact-info li a:hover,
	.megamenu-title,
	header a:focus,
	nav.site-navigation ul li a:hover,
	nav.site-navigation ul li a:focus,
	nav.site-navigation ul li a:active,
	.counter-wrap .title,
	.vc_gitem_row .vc_gitem-col.anps-grid .vc_gitem-post-data-source-post_date > div:before,
	.vc_gitem_row .vc_gitem-col.anps-grid-mansonry .vc_gitem-post-data-source-post_date > div:before,
	ul.testimonial-wrap .rating,
	.nav-tabs a:hover,
	.nav-tabs a:focus,
	.projects-item .project-title,
	.filter-dark button.selected,
	.filter:not(.filter-dark) button:focus,
	.filter:not(.filter-dark) button.selected,
	.product_meta .posted_in a:hover,
	.product_meta .posted_in a:focus,
	.price,
	.post-info td a:hover,
	.post-info td a:focus,
	.post-meta i,
	.stars a:hover,
	.stars a:focus,
	.stars,
	.star-rating,
	.site-header.transparent .social.social-transparent-border a:hover,
	.site-header.transparent .social.social-transparent-border a:focus,
	.social.social-transparent-border a:hover,
	.social.social-transparent-border a:focus,
	.social.social-border a:hover,
	.social.social-border a:focus,
	.top-bar .social a:hover,
	.top-bar .social a:focus,
	.list li:before,
	.info-table-icon,
	.icon-media,
	.site-footer .download a:hover,
	.site-footer .download a:focus,
	header.site-header.classic nav.site-navigation .above-nav-bar .contact-info li a:hover,
	.top-bar .contact-info a:hover,
	.comment-date i,
	[itemprop="datePublished"]:before,
	.breadcrumb a:hover,
	.breadcrumb a:focus,
	.panel-heading a.collapsed:hover,
	.panel-heading a.collapsed:focus,
	ol.list,
	.product_list_widget .amount,
	.product_list_widget ins,
	.timeline-year {
		color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

	nav.site-navigation .current-menu-item > a,
	.important {
  		color: #<?php echo esc_attr($anps_primary_color); ?> !important;
	}

	.gallery-fs .owl-item a:hover:after,
	.gallery-fs .owl-item a:focus:after,
	.gallery-fs .owl-item a.selected:after {
		border-color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

	@media(min-width: 1200px) {
  		.site-header.vertical .above-nav-bar > ul.contact-info > li a:hover,
  		.site-header.vertical .above-nav-bar > ul.contact-info > li a:focus,
  		.site-header.vertical .above-nav-bar > ul.social li a:hover i,
  		.site-header.vertical .main-menu > li:not(.mini-cart):hover > a,
  		.site-header.vertical .main-menu > li:not(.mini-cart).current-menu-item > a,
  		header.site-header nav.site-navigation .main-menu .megamenu ul li a:hover,
  		header.site-header nav.site-navigation .main-menu .megamenu ul li a:focus {
			color: #<?php echo esc_attr($anps_primary_color); ?>;
		}

		header.site-header.classic nav.site-navigation ul li a:hover,
		header.site-header.classic nav.site-navigation ul li a:focus {
			border-color: #<?php echo esc_attr($anps_primary_color); ?>;
		}

		nav.site-navigation ul li > ul.sub-menu a:hover {
			background-color: #<?php echo esc_attr($anps_primary_color); ?>;
		}
	}

	@media(max-width: 1199px) {
		.site-navigation .main-menu li a:hover,
		.site-navigation .main-menu li a:active,
		.site-navigation .main-menu li a:focus,
		.site-navigation .main-menu li.current-menu-item > a,
		.site-navigation .mobile-showchildren:hover,
  		.site-navigation .mobile-showchildren:active {
			color: #<?php echo esc_attr($anps_primary_color); ?>;
		}
	}
    <?php
    /* Hovers Color */
    ?>
	aside .widget_shopping_cart_content .buttons a:hover,
	aside .widget_shopping_cart_content .buttons a:focus,
	.site-footer .widget_shopping_cart_content .buttons a:hover,
	.site-footer .widget_shopping_cart_content .buttons a:focus,
	.mini-cart-content .buttons a:hover,
	.mini-cart-content .buttons a:focus,
	.mini-cart-link:hover,
	.mini-cart-link:focus,
	.widget_calendar a:hover,
	.widget_calendar a:focus,
	.social a:hover,
	.social a:focus,
	.sidebar .download a:hover,
	.sidebar .download a:focus,
        .woocommerce-product-gallery__trigger:hover,
        .woocommerce-product-gallery__trigger:focus,
	.site-footer .widget_price_filter .price_slider_amount button.button:hover,
	.site-footer .widget_price_filter .price_slider_amount button.button:focus {
		background-color: #<?php echo esc_attr($anps_hovers_color); ?>;
	}

	.sidebar a:hover,
	.sidebar a:focus,
	a:hover,
	a:focus,
	.post-meta li a:hover,
	.post-meta li a:focus,
	.site-header.classic .above-nav-bar ul.social > li > a:hover,
	.site-header .above-nav-bar ul.social > li > a:hover,
	.menu-search-toggle:hover,
	.menu-search-toggle:focus,
    .scroll-top:hover,
    .scroll-top:focus
	 {
		color: #<?php echo esc_attr($anps_hovers_color); ?>;
	}

	@media (min-width: 1200px) {
		header.site-header.classic .site-navigation .mobile-wrap > ul > li > a:hover,
		header.site-header.classic .site-navigation .mobile-wrap > ul > li > a:focus {
			color: #<?php echo esc_attr($anps_hovers_color); ?>;
		}
	}

	.form-group input:not([type="submit"]):hover,
	.form-group input:not([type="submit"]):focus,
	.form-group textarea:hover,
	.form-group textarea:focus,
	.wpcf7 input:not([type="submit"]):hover,
	.wpcf7 input:not([type="submit"]):focus,
	.wpcf7 textarea:hover,
	.wpcf7 textarea:focus,
	input,
	.input-text:hover,
	.input-text:focus {
		outline-color: #<?php echo esc_attr($anps_hovers_color); ?>;
	}
    <?php
    /* Menu Colors */
    ?>
    @media (min-width: 1200px) {
	    header.site-header.classic .site-navigation .mobile-wrap > ul > li > a,
	    header.site-header.transparent .site-navigation .mobile-wrap > ul > li > a {
			color: #<?php echo esc_attr($anps_menu_text_color); ?>;
	    }

	    header.site-header.classic .site-navigation .mobile-wrap > ul > li > a:hover,
	    header.site-header.classic .site-navigation .mobile-wrap > ul > li > a:focus,
	    header.site-header.transparent .site-navigation .mobile-wrap > ul > li > a:hover,
	    header.site-header.transparent .site-navigation .mobile-wrap > ul > li > a:focus,
	    .menu-search-toggle:hover,
		.menu-search-toggle:focus {
			color: #<?php echo esc_attr($anps_menu_text_hover_color); ?>;
	    }
    }
    header.site-header.classic {
		background-color: #<?php echo esc_attr($anps_menu_bg_color); ?>;
	}
    <?php
    /* Headings Color */
    ?>
    .featured-title,
	.woocommerce form label,
	.mini-cart-content .total,
	.quantity .minus:hover,
	.quantity .minus:focus,
	.quantity .plus:hover,
	.quantity .plus:focus,
	.cart_totals th,
	.cart_totals .order-total,
	.menu-search-toggle,
	.widget_rss ul .rss-date,
	.widget_rss ul cite,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.h5,
	.title.h5,
	em,
	.dropcap,
	table.table > tbody th,
	table.table > thead th,
	table.table > tfoot th,
	.sidebar .working-hours td,
	.orderform .minus:hover,
	.orderform .minus:focus,
	.orderform .plus:hover,
	.orderform .plus:focus,
	.product-top-meta .price,
	.post-info th,
	.post-author-title strong,
	.site-main .social.social-minimal a,
	.info-table-content,
	.comment-author,
	[itemprop="author"],
	.breadcrumb a,
	aside .mini-cart-list + p.total > strong,
	.site-footer .mini-cart-list + p.total > strong,
	.mini-cart-list .remove {
		color: #<?php echo esc_attr($anps_headings_color); ?>;
    }
    .mini_cart_item_title {
    	color: #<?php echo esc_attr($anps_headings_color); ?> !important;
    }
    <?php
    /* Top Bar Text Color */
    ?>
    .top-bar {
		color: #<?php echo esc_attr($anps_top_bar_color); ?>;
    }
    <?php
    /* Top Bar Background Color */
    ?>
    .top-bar {
		background-color: #<?php echo esc_attr($anps_top_bar_bg_color); ?>;
    }
    <?php
    /* Footer Background  Color */
    ?>
    .site-footer {
		background-color: #<?php echo esc_attr($anps_footer_bg_color); ?>;
    }
    <?php
    /* Copyright Footer Background Color */
    ?>
    .copyright-footer {
		background-color: #<?php echo esc_attr($anps_copyright_footer_bg_color); ?>;
    }
    <?php
    /* Footer Text Color */
    ?>
    .site-footer {
		color: #<?php echo esc_attr($anps_footer_text_color); ?>;
    }
    <?php
    /* Footer Heading Text Color */
    ?>
    .site-footer .widget-title {
		color: #<?php echo esc_attr($anps_footer_heading_text_color); ?>;
    }
    <?php
    /* Copyright Footer Text Color */
    ?>
    .copyright-footer {
		color: #<?php echo esc_attr($anps_c_footer_text_color); ?>;
    }
    <?php
    /* Page Header Background Color */
    ?>
    .page-header {
    	background-color: #<?php echo esc_attr($anps_page_header_background_color); ?>;
    }
    <?php
    /* Page Title Color */
    ?>
    .page-header .page-title {
    	color: #<?php echo esc_attr($anps_page_title); ?>;
    }
    <?php
    /* Submenu Background Color */
    ?>
    nav.site-navigation ul li > ul.sub-menu {
    	background-color: #<?php echo esc_attr($anps_submenu_background_color); ?>;
    }
    @media(min-width: 1200px) {
	    header.site-header nav.site-navigation .main-menu .megamenu {
	    	background-color: #<?php echo esc_attr($anps_submenu_background_color); ?>;
	    }
    }
    <?php
    /* Submenu Text Color */
    ?>
    header.site-header.classic nav.site-navigation ul li a {
    	color: #<?php echo esc_attr($anps_submenu_text_color); ?>;
    }
    <?php
    /* Submenu Divider Color */
    ?>
    header.site-header nav.site-navigation .main-menu .megamenu ul li:not(:last-of-type),
    nav.site-navigation ul li > ul.sub-menu li:not(:last-child) {
    	border-color: #<?php echo esc_attr($anps_submenu_divider_color); ?>;
    }
    <?php
    /* Text On Top Primary Color */
    ?>
    .social a,
    .social a:hover,
    .social a:focus,
    .widget_nav_menu li.current_page_item > a,
    .widget_nav_menu li.current-menu-item > a,
    .widget_calendar caption,
    .sidebar .download a {
    	color: #<?php echo esc_attr($anps_primary_text_top); ?>;
    }

    .mini-cart-link,
    .mini-cart-content .buttons a,
    aside .widget_shopping_cart_content .buttons a,
    .site-footer .widget_shopping_cart_content .buttons a {
    	color: #<?php echo esc_attr($anps_primary_text_top); ?> !important;
    }
    <?php
    /* Shopping Cart Item Number Background Color */
    ?>
	.mini-cart-number {
  		background-color: #<?php echo esc_attr($anps_woo_cart_items_number_bg_color); ?>;
	}
    <?php
    /* Shopping Cart Item Number Text Color */
    ?>
	.mini-cart-number {
  		color: #<?php echo esc_attr($anps_woo_cart_items_number_color); ?>;
	}
    <?php
    /* Button Normal */
    ?>
    .btn,
    .button {
   		background-color: #<?php echo esc_attr($anps_normal_button_bg); ?>;
    	color: #<?php echo esc_attr($anps_normal_button_color); ?>;
    }
	.btn:hover,
	.btn:focus,
    .button:hover,
    .button:focus,
    aside .widget_price_filter .price_slider_amount button.button:hover,
    aside .widget_price_filter .price_slider_amount button.button:focus,
    .site-footer .widget_price_filter .price_slider_amount button.button:hover,
    .site-footer .widget_price_filter .price_slider_amount button.button:focus {
    	background-color: #<?php echo esc_attr($anps_normal_button_hover_bg); ?>;
    	color: #<?php echo esc_attr($anps_normal_button_hover_color); ?>;
    }
    <?php
    /* Button Gradient */
    ?>
    .btn.btn-gradient {
   		background-color: #<?php echo esc_attr($anps_gradient_button_bg); ?>;
    	color: #<?php echo esc_attr($anps_gradient_button_color); ?>;
    }
	.btn.btn-gradient:hover,
	.btn.btn-gradient:focus {
    	background-color: #<?php echo esc_attr($anps_gradient_button_hover_bg); ?>;
    	color: #<?php echo esc_attr($anps_gradient_button_hover_color); ?>;
    }
    <?php
    /* Button Dark */
    ?>
    .btn.btn-dark {
   		background-color: #<?php echo esc_attr($anps_dark_button_bg); ?>;
    	color: #<?php echo esc_attr($anps_dark_button_color); ?>;
    }
	.btn.btn-dark:hover,
	.btn.btn-dark:focus {
    	background-color: #<?php echo esc_attr($anps_dark_button_hover_bg); ?>;
    	color: #<?php echo esc_attr($anps_dark_button_hover_color); ?>;
    }
    <?php
    /* Button Light */
    ?>
    .btn.btn-light {
   		background-color: #<?php echo esc_attr($anps_light_button_bg); ?>;
    	color: #<?php echo esc_attr($anps_light_button_color); ?>;
    }
	.btn.btn-light:hover,
	.btn.btn-light:focus {
    	background-color: #<?php echo esc_attr($anps_light_button_hover_bg); ?>;
    	color: #<?php echo esc_attr($anps_light_button_hover_color); ?>;
    }
    <?php
    /* Button Light */
    ?>
    .btn.btn-minimal {
    	color: #<?php echo esc_attr($anps_minimal_button_color); ?>;
    }
	.btn.btn-minimal:hover,
	.btn.btn-minimal:focus {
    	color: #<?php echo esc_attr($anps_minimal_button_hover_color); ?>;
    }
    <?php
}
function anps_custom_styles_font_size() {
	$anps_body_font_size = get_option('anps_body_font_size', '14');

	$anps_h1_font_size = get_option('anps_h1_font_size', '32');
	$anps_h2_font_size = get_option('anps_h2_font_size', '28');
	$anps_h3_font_size = get_option('anps_h3_font_size', '24');
	$anps_h4_font_size = get_option('anps_h4_font_size', '21');
	$anps_h5_font_size = get_option('anps_h5_font_size', '16');

	$anps_menu_font_size = get_option('anps_menu_font_size', '13');
	$anps_submenu_font_size = get_option('anps_submenu_font_size', '12');

	$anps_page_heading_h1_font_size = get_option('anps_page_heading_h1_font_size', '36');
	$anps_blog_heading_h1_font_size = get_option('anps_blog_heading_h1_font_size', '36');

    /* Body Font Size */
    ?>
	body,
	.panel-title,
	.site-main .wp-caption p.wp-caption-text,
	.mini-cart-link i,
	.anps_menu_widget .menu a:before,
	.vc_gitem_row .vc_gitem-col.anps-grid .post-desc,
	.vc_gitem_row .vc_gitem-col.anps-grid-mansonry .post-desc,
	.alert,
	div.wpcf7-mail-sent-ng,
	div.wpcf7-validation-errors,
	.contact-form .form-group label,
	.contact-form .form-group .wpcf7-not-valid-tip,
	.wpcf7 .form-group label,
	.wpcf7 .form-group .wpcf7-not-valid-tip,
	ul.testimonial-wrap .user-data .name-user,
	.projects-item .project-title,
	.product_meta,
	.site-footer .social.social-border i,
	.btn.btn-wide,
	.btn.btn-lg,
	.breadcrumb li:before {
		font-size: <?php echo esc_attr($anps_body_font_size); ?>px;
	}

	h1, .h1 { font-size: <?php echo esc_attr($anps_h1_font_size); ?>px; }
	h2, .h2 { font-size: <?php echo esc_attr($anps_h2_font_size); ?>px; }
	h3, .h3 { font-size: <?php echo esc_attr($anps_h3_font_size); ?>px; }
	h4, .h4 { font-size: <?php echo esc_attr($anps_h4_font_size); ?>px; }
	h5, .h5 { font-size: <?php echo esc_attr($anps_h5_font_size); ?>px; }

	nav.site-navigation,
	nav.site-navigation ul li a {
		font-size: <?php echo esc_attr($anps_menu_font_size); ?>px;
	}

	@media (min-width: 1200px) {
		nav.site-navigation ul li > ul.sub-menu a,
		header.site-header nav.site-navigation .main-menu .megamenu {
			font-size: <?php echo esc_attr($anps_submenu_font_size); ?>px;
		}
	}

	@media (min-width: 1000px) {
		.page-header .page-title {
			font-size: <?php echo esc_attr($anps_page_heading_h1_font_size); ?>px;
		}

		.single .page-header .page-title {
			font-size: <?php echo esc_attr($anps_blog_heading_h1_font_size); ?>px;
		}
	}
	<?php
}

function anps_theme_options_custom_css() {
	echo get_option( 'anps_custom_css', '');
}

/* Custom styles */
function anps_custom_styles() {
	anps_custom_styles_font_family();
	anps_custom_styles_font_size();
	anps_custom_styles_colors();
    anps_theme_options_custom_css();
}
