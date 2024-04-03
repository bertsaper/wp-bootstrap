<?php


function lmss_child_dequeue_styles() {
    // Dequeue the 'style' stylesheet
    wp_dequeue_style( 'style' );

    // Dequeue the 'main' stylesheet
    wp_dequeue_style( 'main' );
}

// Hook the above function to the 'wp_print_styles' action
add_action( 'wp_print_styles', 'lmss_child_dequeue_styles', 20 );


function lmss_child_enqueue_styles() {

	
   // wp_enqueue_style( 'lmss-parent-style', get_template_directory_uri() . '/style.css' );

   wp_enqueue_style('child-main-css', get_stylesheet_directory_uri() . '/build/child-main.css', array(), '1.0.0', 'all');

    wp_enqueue_style( 'lmss-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'lmss-parent-style' ),
        wp_get_theme()->get('Version')
    );

}
add_action( 'wp_enqueue_scripts', 'lmss_child_enqueue_styles' );

if ( ! function_exists( 'lmss_1_article_posted_on' ) ) {
	/**
	 * "Theme posted on" pattern.
	 *
	 * @since v1.0
	 */
	function lmss_1_article_posted_on() {
		printf(
			wp_kses_post( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author-meta vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'lmss_1' ) ),
			esc_url( get_the_permalink() ),
			esc_attr( get_the_date() . ' - ' . get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() . ' - ' . get_the_time() ),
			esc_url( get_author_posts_url( (int) get_the_author_meta( 'ID' ) ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'lmss_1' ), get_the_author() ),
			get_the_author()
		);
	}
}

/**
 * Custom widgets for homepage banner
 *
 **/

 function left_banner_widget_area() {
    register_sidebar( array(
        'name'          => esc_html__( 'Left Banner Widget Area', 'textdomain' ),
        'id'            => 'left-banner-widget-area',
        'description'   => esc_html__( 'Add widgets here to appear on the left side or first tier (responsive) of the banner area.', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'left_banner_widget_area' );

function right_banner_widget_area() {
    register_sidebar( array(
        'name'          => esc_html__( 'Right Banner Widget Area', 'textdomain' ),
        'id'            => 'right-banner-widget-area',
        'description'   => esc_html__( 'Add widgets here to appear on the right side or second tier (responsive) of the banner area.', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'right_banner_widget_area' );

/**
 * Custom js for homepage banner
 *
 **/

function enqueue_header_homepage_script() {
    if (is_page_template('front-page.php')) {
		// Initialize $custom_css to an empty string if it hasn't been set previously
		$custom_css = isset($custom_css) ? $custom_css : '';
        wp_enqueue_script('header-homepage-script', get_stylesheet_directory_uri() . '/assets/header-homepage-script.js', array(), '1.0.7', false);

        // Add inline styles
        echo '<style>

			#header,
			#main {
				opacity: 0;
				transition: opacity 0.1s ease-in-out;
			}
			#main {
				margin-top: 50px;
			}

			#banner > :nth-child(1) img {
				max-width: 375px;
			}

			#banner > :nth-child(2) {
				position: relative;
			}
			
			#banner > :nth-child(2) h2 {
				position: absolute;
				top: 45%;
				left: 50%;
				transform: translate(-50%, -50%);
				width: 100%;
				max-width: 600px;
			}

			@media (min-width: 768px) and (max-width: 1200px) {

				#banner > :nth-child(2) h2 {
					max-width: 255px;
				}

			}

			@media (max-width: 991px) {
				
				#banner > :nth-child(1) img {
					max-width: 205px;
				}
			}
			
			@media (min-width: 622px) and (max-width: 767px) {
				#banner > :nth-child(2) h2 {
					padding-bottom: 2px;
					padding-left: 2px;
				}
			}


			@media (max-width: 580px) {

				#banner > :nth-child(2) h2 {
					padding: 0 0 24px 8px;
				}
			}

			@media (max-width: 370px) {

				#banner > :nth-child(1) img {
					display: none;
				}


				#banner > :nth-child(2) h2 {
					top: unset;
					left: unset;
					transform: translate(-1%, -50%);
					margin:1px 0 1px;
					padding-bottom: 12px;
					font-size: 14px;
				}

						
			.navbar-brand {
				opacity: 100!important;
				transition: opacity 0.25s ease;
			  }
			}
		
			.navbar-brand {
				opacity: 0;
				transition: opacity 0.25s ease;
			  }
			  
        </style>';

        wp_add_inline_style('custom-style-handle', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_header_homepage_script');

/**
 * Custom CSS for homepage banner and other needs
 *
 **/

function enqueue_custom_styles() {
    // Register the style like this for a theme:
    wp_register_style( 'custom-style', get_stylesheet_directory_uri() . '/assets/custom-styles.css', array(), '1.3', 'all' );

    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'custom-style' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );

/**
 * Loading All CSS Stylesheets and Javascript Files.
 *
 * @since v1.0
 *
 * @return void
 */

// Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

