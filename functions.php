<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * TwentyTwenty child theme enqueue files
 * 
 * @since 1.0
 */
add_action( 'wp_enqueue_scripts', 'viserx_enqueue_styles' );
function viserx_enqueue_styles() {
    $parenthandle = 'twentytwenty-style'; 
    $theme = wp_get_theme();

    //parent theme styles
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),
        $theme->parent()->get('Version')
    );

    //child theme styles
    wp_enqueue_style( 'twentytwenty-child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version')
    );
}


 /**
 * Theme options
 *
 * @package viserx
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}


/**
 * Hero Counter Section
 */
if( !function_exists( 'vx_hero_counter' ) ) {
    function vx_hero_counter() {
        if( function_exists( 'get_field' ) ) {
            $counter_items = get_field( 'counter_items', 'option' );
            ob_start();
            if( $counter_items ) { ?>
                    <div class="vx-hero-counter-items">
                        <?php
                        foreach( $counter_items as $counter_item ) {
                            $title = !empty($counter_item['counter_title']) ? $counter_item['counter_title'] : '';
                            $number = !empty($counter_item['counter_number']) ? $counter_item['counter_number'] : ''; ?>
                            
                            <div class="vx-hero-counter-item">
                                <h2 class="vx-counter-title"><?php esc_html_e( $title, 'twentytwentychild' ); ?></h2>
                                <div class="vx-counter-number"><?php esc_html_e( $number, 'twentytwentychild' ); ?></div>
                            </div>
                            <?php
                        } 
                        ?>
                    </div>
                <?php
            }
            return ob_get_clean();
        }
    }
}
add_shortcode( 'vx_hero_counter', 'vx_hero_counter' );

/**
 * Increase Percentage
 */
if( !function_exists( 'vs_increase_percentage' ) ) {
    function vs_increase_percentage() {
        if( function_exists( 'get_field' ) ) {
            $percentage_value = get_field( 'increase_percentage_value', 'option' );
            $percentage_text = get_field( 'increase_percentage_text', 'option' );

            ob_start();

            if( $percentage_value && $percentage_text ) { 
                ?>
                    <div class="vx-increase-percentage-block">
                        <p class="vx-block-percent-text"><?php esc_html_e( $percentage_value, 'twentytwentychild' ); ?></p>
                        <p class="vx-block-license-text"><?php esc_html_e( $percentage_text, 'twentytwentychild' ); ?></p>
                    </div>
                <?php
            }

            return ob_get_clean();
        }
    }
}
add_shortcode( 'vs_increase_percentage', 'vs_increase_percentage' );

/**
 * Header Logo Shortcode
 */
if( !function_exists( 'vs_header_logo' ) ) {
    function vs_header_logo() {
        if( function_exists( 'get_field' ) ) {

            // get custom logo
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );

            //get hover icon
            $logo_hover_icon = get_field( 'logo_hover_icon', 'option' );
            $logo_hover_icon_url = $logo_hover_icon['url'];
            $logo_hover_text = get_field( 'logo_hover_text', 'option' );

            ob_start(); ?>
                <div class="logo-container" style="position: relative;width: 178px;height: 53px;">
                    <a class="vx-logo" href="<?php echo home_url(); ?>"><img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="ViserX"/></a>
                    <a class="logo-hover-element" href="<?php echo home_url(); ?>"><img class="logo-hover-icon" style="width: 24px;" src="<?php echo esc_url( $logo_hover_icon_url ); ?>" alt="ViserX Hover Icon"/> <?php esc_html_e( $logo_hover_text, 'twentytwentychild');  ?></a>
                </div>
                <?php

            return ob_get_clean();
            
        }
    }
}
add_shortcode( 'vs_header_logo', 'vs_header_logo' );


/**
 * Header Revenue Info
 */
if( !function_exists( 'vs_header_revenue_info' ) ) {
    function vs_header_revenue_info() {
        if( function_exists( 'get_field' ) ) {
            
            $header_revenue_link = get_field( 'header_revenue_link', 'option' ); 
            $header_revenue_title = get_field( 'header_revenue_title', 'option' ); 
            $header_revenue_number = get_field( 'header_revenue_number', 'option' );
            ob_start();
            ?>
                <div class="vx-header-revenue-container">
                    <a href="<?php echo esc_url( $header_revenue_link ); ?>">
                        <div class="vx-header-revenue-text"><?php echo $header_revenue_title; ?></div>
                        <div class="vx-header-revenue-number"><span class="vx-font-weight-thin">$</span><?php esc_html_e( $header_revenue_number, 'twentytwentychild' ); ?></div>            
                    </a>
                </div>
            <?php
            return ob_get_clean();
        }
    }
}
add_shortcode( 'vs_header_revenue_info', 'vs_header_revenue_info' );
