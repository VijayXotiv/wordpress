<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );
/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
	wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'custom_css', get_stylesheet_directory_uri() . '/css/custom.css' );
	wp_enqueue_style ('owl_css','https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
	wp_enqueue_style ('owl_theme','https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');

}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );
include_once('custom-post-type/includes.php');
function wpb_widgets_init() {
 register_sidebar( array(
        'name'          => 'Inner Page Hero Banner',
        'id'            => 'inner-page-hero-banner',
        'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
 
}
add_action( 'widgets_init', 'wpb_widgets_init' );
add_filter('next_posts_link_attributes', 'posts_link_next_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_prev_attributes');

function posts_link_prev_attributes() {
  return 'class="pg-item pg-nav-item pg-prev btn btn-primary float-left"';
}
function posts_link_next_attributes() {
  return 'class="pg-item pg-nav-item pg-nextbtn btn btn-primary float-right"';
}
// Inner Page Tagline
add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {
  if(!empty(get_post_custom_values('body_class_notagline'))){
  $custom_class=get_post_custom_values('body_class_notagline')[0];
  $classes[] = $custom_class;
  }
    return $classes;
}
if( !function_exists('custom_tagline') )
{
    function custom_tagline()
    {
     if ((!in_array('no-tagline', get_body_class())) && (!in_array('single', get_body_class())) && (!in_array('home', get_body_class()))) {
         $page_title= get_the_title();
         $pageline='<h1>'.$page_title.'</h1>';
    }
       return $pageline;
    }
    add_shortcode('custom_tagline_inner', 'custom_tagline');
}

// Svg function
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
  $filetype = wp_check_filetype( $filename, $mimes );
  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];
}, 10, 4 );
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

add_filter('wpcf7_spam', function() { return false; });
add_action( 'wpcf7_before_send_mail',
function( $contact_form, &$abort, $submission ) {
  $formdata = $submission->get_posted_data();
  $form_id = $contact_form->id();
	if($form_id == 17727){
		if(!empty($formdata['ebook-selection'])){
            $mail = $contact_form->prop('mail_2');
			$attachment_path='';
			foreach($formdata['ebook-selection']  as $f_value){
				if($f_value == "Dirty Divorce Tricks"){
                    $attachment_path = dirname(__FILE__).'/pdf/Dirty-Divorce-Tricks-by-John-A-Bledsoe.pdf';
                    if (file_exists($attachment_path)) {
                        $mail['attachments'] .= $attachment_path."\n";
                    }
                }
                if($f_value == "Three Paths to Divorce"){
                    $attachment_path = dirname(__FILE__).'/pdf/Three-Paths-to-Get-Divorced-in-California.pdf';
                    if (file_exists($attachment_path)) {
                       $mail['attachments'] .= $attachment_path."\n";
                    }
                }
                if($f_value == "Talking With Kids About Divorce"){
                    $attachment_path = dirname(__FILE__).'/pdf/Talking-With-Kids-About-Divorce-Ebook.pdf';
                    if (file_exists($attachment_path)) {
                        $mail['attachments'] .= $attachment_path."\n";
                    }
                }
                if($f_value == "Seven Deadly Social Media Sins"){
                    $attachment_path = dirname(__FILE__).'/pdf/Seven_Deadly_Social_Media_Sins.pdf';
                    if (file_exists($attachment_path)) {
                       $mail['attachments'] .= $attachment_path."\n";
                    }
                }
                if($f_value == "Trump's Tax Plan"){
                    $attachment_path = dirname(__FILE__).'/pdf/Trumps-Tax-Plan.pdf';
                    if (file_exists($attachment_path)) {
                        $mail['attachments'] .= $attachment_path."\n";
                    }
                }
                if($f_value == "California Child Custody: A Fathers Guide"){
                    $attachment_path = dirname(__FILE__).'/pdf/Custody-Guide-for-Fathers.pdf';
                    if (file_exists($attachment_path)) {
                       $mail['attachments'] .= $attachment_path."\n";
                    }
                }
                if($f_value == "California Child Custody: A Mothers Guide"){
                    $attachment_path = dirname(__FILE__).'/pdf/Custody-Guide-for-Mothers.pdf';
                    if (file_exists($attachment_path)) {
                        $mail['attachments'] .= $attachment_path."\n";
                    }
                }
			}
			//$mail['attachments'] = trim($mail['attachments'], '\n');
            $contact_form->set_properties(array('mail_2' => $mail));
			//print_r($contact_form);exit;
		}
	}
},
10, 3
);

function show_menu_shortcode($atts, $content = null) {
extract(shortcode_atts(array( 'name' => null, 'class' => null ), $atts));
return wp_nav_menu( array( 'menu' => $name, 'menu_class' => 'myclass', 'echo' => false ) );
}
add_shortcode('menu', 'show_menu_shortcode');

// display google map through shortcode due
function show_embd_map() {
$embdmap_url = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3317.0658459818515!2d-84.3867157!3d33.758964299999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f504780e7eccb5%3A0x7670807f1e9140ee!2sPeachtree%20Tower%2C%20191%20Peachtree%20St%20%233950%2C%20Atlanta%2C%20GA%2030303%2C%20USA!5e0!3m2!1sen!2sin!4v1709620885952!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
return $embdmap_url;
}
add_shortcode('display-embd-map', 'show_embd_map');

// disable file editor from wp-backend for all user
//define( 'DISALLOW_FILE_EDIT', true );