<?php
/**
 * Twenty Twenty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Register and Enqueue Styles.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'twentytwenty-style', get_stylesheet_uri(), array(), $theme_version );
	wp_style_add_data( 'twentytwenty-style', 'rtl', 'replace' );

	// Add output of Customizer settings as inline style.
	wp_add_inline_style( 'twentytwenty-style', twentytwenty_get_customizer_css( 'front-end' ) );

	// Add print CSS.
	wp_enqueue_style( 'twentytwenty-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );

}

add_action( 'wp_enqueue_scripts', 'twentytwenty_register_styles' );

/**
 * Register and Enqueue Scripts.
 *
 * @since Twenty Twenty 1.0
 */
function twentytwenty_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'twentytwenty-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, false );
	wp_script_add_data( 'twentytwenty-js', 'async', true );

}

add_action( 'wp_enqueue_scripts', 'twentytwenty_register_scripts' );

	
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 300, 9999, false ); // default Featured Image dimensions (cropped)
 
    // additional image sizes
    // delete the next line if you do not need additional image sizes
add_image_size( 'category-thumb', 300, 9999 );

register_nav_menus( array(
    'meta-menu' => 'Meta Menu'
) );

add_action( 'wp_ajax_loadpost', 'loadpost_init' );
add_action( 'wp_ajax_nopriv_loadpost', 'loadpost_init' );
function loadpost_init() {
 
    ob_start(); //bắt đầu bộ nhớ đệm
	$paged = 1;
	if ($_POST['paged']) {
		$paged = $_POST['paged'];
	}
	

    $post_new = new WP_Query(array(
        'post_type' =>  'post',
        'posts_per_page'    =>  '9',
		'paged' => $paged
    ));
 
    if($post_new->have_posts()):
       
            while($post_new->have_posts()):$post_new->the_post();
                
				echo '<div class="card_new">
						<h2 class="name_categories"><a href="
						';
					 	echo esc_url( get_category_link(end(get_the_category())->term_id));
						echo '
						">
						';
						echo end(get_the_category())->name;

						echo '</a></h2>
						<div class="date_card"> ';
						echo the_time(get_option( 'date_format' ));
						echo	'</div>
						<a href="' ;
						echo  the_permalink() ;
						echo '" alt="'; 
						echo the_title_attribute(); 
						echo '" class="img_new">'; 
						echo the_post_thumbnail() ;
						echo '</a>
							<div class="sub_new">
							<h3 class="title_new"><a href="';
							echo the_permalink(); 
							echo '">' ;
							echo the_title(); 
							echo '</a></h3>
							<div class="des_new">';
							echo the_content() ;
						echo ' 
							</div>
						</div>
					</div>';
            endwhile;
    endif; wp_reset_query();
 
    $result = ob_get_clean(); //cho hết bộ nhớ đệm vào biến $result
 
    wp_send_json_success($result); // trả về giá trị dạng json
 
    die();//bắt buộc phải có khi kết thúc
}

//contact
add_action( 'wp_ajax_contact', 'contact_init' );
add_action( 'wp_ajax_nopriv_contact', 'contact_init' );
function contact_init() {
 
    ob_start(); 
	
	if ($_POST['formData']) {
		$formData = $_POST['formData'];
	}

	//send mail
	$to = get_option( 'admin_email' ); 
	$subject = "[metamerge][Contact Media] from: " . $formData["name"];
	$message = "\n Name: " .  $formData["name"]; 
	$message .=	"\n Email: " .  $formData["email"]; 
	$message .=	"\n mobile_phone: " .  $formData["mobile_phone"]; 
	$message .=	"\n country: " .  $formData["country"]; 
	$message .=	"\n company: " .  $formData["company"]; 
	$message .=	"\n position: " .  $formData["position"]; 
	$message .=	"\n media_inquiries: " .  $formData["media_inquiries"]; 

	$headers[] = 'From: ' . $formData["name"] . ' <' . $formData["email"] . '>';
	$headers[] = 'Cc: John Q Codex <' . $formData["email"] . '>';
	$headers[] = 'Cc: iluvwp@wordpress.org';
	
	wp_mail( $to, $subject, $message, $headers );

    $result = ob_get_clean(); 
 
    wp_send_json_success($result); 
 
    die();
}

// function custom_excerpt_length( $length ) {
// 	return 20;
// }
// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
