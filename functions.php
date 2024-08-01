<?php

function my_theme_enqueue_styles() {

  $parent_style = 'antoninolattene-parent-style'; // Estos son los estilos del tema padre recogidos por el tema hijo.

  // wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Raleway:wght@200;400;500;700&display=swap', false );
  wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap', false );
  wp_enqueue_style( 'load-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' );
 
  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'css-reset-and-normalize', 'https://cdn.jsdelivr.net/npm/css-reset-and-normalize/css/reset-and-normalize.min.css' );
  // wp_enqueue_style( 'antoninolattene-child-style', get_stylesheet_directory_uri() . '/dist/style.min.css', array( $parent_style ), wp_get_theme()->get('Version'));
  wp_enqueue_style( 'antoninolattene-child-style', get_stylesheet_directory_uri() . '/dist2/main.css', array( $parent_style ), wp_get_theme()->get('Version'));

  wp_enqueue_script('jquery'); //jQuery ya está incluido en Wordpress (wp-include/js/jQuery/jquery.js)

  // Enqueue AOS styles
  wp_enqueue_style('AOS_animate', 'https://unpkg.com/aos@2.3.1/dist/aos.css', false, null);
  // Enqueue AOS script library in footer
  wp_enqueue_script('AOS', 'https://unpkg.com/aos@2.3.1/dist/aos.js', false, null, true);

  // Enqueue Tiny-slider styles
  wp_enqueue_style('Tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css', false, null);
  // Enqueue Tiny-slider script library in footer
  wp_enqueue_script('Tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js', false, null, true);


  //Enqueue GSAP script library in footer
  wp_enqueue_script('Gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js', false, null, true);
  wp_enqueue_script('Gsap-ScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/ScrollTrigger.min.js', false, null, true);

  // Enqueue personal js file
  // wp_enqueue_script( 'personal-scripts', get_stylesheet_directory_uri() . '/dist/bundle.min.js', array( 'jquery' ), '1.0', true );
  wp_enqueue_script( 'personal-scripts', get_stylesheet_directory_uri() . '/dist2/main.js', array( 'jquery' ), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


//PARA MENU
//aggregar clases a los links del menú
function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );


// This snippet removes the current_page_parent class of the blog menu item:
function theme_remove_cpt_blog_class( $classes, $item, $args ) {
  if( !is_singular( 'post' ) AND !is_category() AND !is_tag() AND !is_date() ):
      $blog_page_id = intval( get_option( 'page_for_posts' ) );
      if( $blog_page_id != 0 AND $item->object_id == $blog_page_id )
          unset( $classes[ array_search( 'current_page_parent', $classes ) ] ); 
  endif;
  return $classes;
}
add_filter( 'nav_menu_css_class', 'theme_remove_cpt_blog_class', 10, 3 );

// This snippet adds a current_page_parent class on the archive menu item of a CPT:
function theme_add_cpt_ancestor_class( $classes, $item, $args ) {
  global $post;
  $current_post_type = get_post_type_object( get_post_type( $post->ID ) );
  if ( $current_post_type === 'post' ) {
      return $classes;
  }
  $current_post_type_slug = is_array( $current_post_type->rewrite ) ? $current_post_type->rewrite['slug'] : $current_post_type->name;
  $menu_slug = strtolower( trim( $item->url ) );
  if( strpos( $menu_slug, $current_post_type_slug ) !== false )
      $classes[] = 'current_page_parent';
  return $classes;
}
add_action( 'nav_menu_css_class', 'theme_add_cpt_ancestor_class', 10, 3 );


// Agregar la clase "chip" al link activo del menú
function add_active_class($classes, $item) {
  if( $item->menu_item_parent == 0 && 
    in_array( 'current-menu-item', $classes ) ||
    in_array( 'current-menu-ancestor', $classes ) ||
    in_array( 'current-menu-parent', $classes ) ||
    in_array( 'current_page_parent', $classes ) ||
    in_array( 'current_page_ancestor', $classes )
    ) {
    $classes[] = ""; // <-- agregar la clase "chip" al link activo del menú
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );



// Limit the character length in excerpt
function custom_excerpt_length( $length ) {
  return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );








//Add logo in login page
function login_logo() { 
  ?>
  <style type="text/css"> 
  body.login div#login h1 a {
    background-image: url(http://localhost/antoninolattene/wp-content/uploads/2024/04/Logo-UX-UI-Desginer-Antonino-Lattene.svg);
    background-size: contain;
  } 
  </style>
  <?php 
}
add_action( 'login_enqueue_scripts', 'login_logo' );


//Show Wordpress admin bar in fonr-end
// function admin_bar(){

//   if(is_user_logged_in()){
//     add_filter( 'show_admin_bar', '__return_true' , 1000 );
//   }
// }
// add_action('init', 'admin_bar' );





//Add custom logo
// function my_custom_logo_setup() {
// 	$defaults = array(
// 		'height'               => 100,
// 		'width'                => 100,
// 		'flex-height'          => true,
// 		'flex-width'           => true,
// 		'header-text'          => array( 'site-title', 'site-description' ),
// 		'unlink-homepage-logo' => true, 
// 	);
// 	add_theme_support( 'custom-logo', $defaults );
// }
// add_action( 'after_setup_theme', 'my_custom_logo_setup', 999);