<?php


function my_theme_enqueue_styles() {

  $parent_style = 'antoninolattene-parent-style'; // Estos son los estilos del tema padre recogidos por el tema hijo.

  wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:200,400,700&display=swap', false );
  wp_enqueue_style( 'load-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css' );
 
  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'antoninolattene-child-style', get_stylesheet_directory_uri() . '/dist/styles/style.min.css', array( $parent_style ), wp_get_theme()->get('Version'));

  wp_enqueue_script('jquery'); //jQuery ya está incluido en Wordpress (wp-include/js/jQuery/jquery.js)

  // Enqueue AOS styles
  wp_enqueue_style('AOS_animate', 'https://unpkg.com/aos@2.3.1/dist/aos.css', false, null);
  // Enqueue AOS script library in footer
  wp_enqueue_script('AOS', 'https://unpkg.com/aos@2.3.1/dist/aos.js', false, null, true);

  // Enqueue Tiny-slider styles
  wp_enqueue_style('Tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css', false, null);
  // Enqueue Tiny-slider script library in footer
  wp_enqueue_script('Tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', false, null, true);


  //Enqueue GSAP script library in footer
  wp_enqueue_script('Gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js', false, null, true);
  wp_enqueue_script('Gsap-ScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/ScrollTrigger.min.js', false, null, true);

  // Enqueue personal js file
  wp_enqueue_script( 'personal-scripts', get_stylesheet_directory_uri() . '/dist/js/javascript.min.js', array( 'jquery' ), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


// Para subir los limites de upload de archivos en Wordpress (https://desarrollowp.com/blog/tutoriales/aumentar-limite-del-tamano-archivos-la-libreria-multimedia/)
@ini_set( 'upload_max_size' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'max_execution_time', '300' );