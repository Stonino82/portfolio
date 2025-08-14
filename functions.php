<?php

// --- Vite Asset Enqueueing ---

function is_vite_dev_mode() {
    // The 'hot' file is a flag created by 'npm run dev'.
    return file_exists(get_stylesheet_directory() . '/hot');
}

// Enqueue scripts and styles
function my_theme_enqueue_styles()
{
    // --- Parent Theme Style ---
    $parent_style = 'antoninolattene-parent-style';
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');

    // --- Dependencies from CDNs ---
    wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap', false);
    wp_enqueue_style('load-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
    wp_enqueue_style('css-reset-and-normalize', 'https://cdn.jsdelivr.net/npm/css-reset-and-normalize/css/reset-and-normalize.min.css');

    if (is_vite_dev_mode()) {
        // --- DEVELOPMENT ---
        wp_enqueue_script('vite-client', 'http://localhost:3000/@vite/client', [], null, true);
        wp_enqueue_script('vite-main-app', 'http://localhost:3000/src/index.js', ['jquery'], null, true);
    } else {
        // --- PRODUCTION ---
        // Use WordPress's built-in functions for robust path and URL handling.
        // This is the definitive logic, designed to work with your specific build output.

        // Step 1: Define the manifest path using the exact location you have confirmed it is being created.
        $manifest_path = get_theme_file_path('/dist/.vite/manifest.json');

        if (file_exists($manifest_path)) {
            $manifest = json_decode(file_get_contents($manifest_path), true);
            if (is_array($manifest)) {
                // Step 2: Get the base URL for the 'dist' directory. This will be prepended to the relative asset paths.
                $dist_uri = get_theme_file_uri('/dist/');
                $entry_point_key = 'src/index.js';

                if (isset($manifest[$entry_point_key])) {
                    $entry_point = $manifest[$entry_point_key];
                    // Step 3: Enqueue the main JS file. The path from the manifest (e.g., 'assets/main.js')
                    // is combined with the 'dist' folder's URL to create the full, correct URL.
                    if (!empty($entry_point['file'])) {
                        wp_enqueue_script('vite-main-app', $dist_uri . $entry_point['file'], ['jquery'], null, true);
                    }
                    // Step 4: Enqueue all associated CSS files using the same logic.
                    if (!empty($entry_point['css'])) {
                        foreach ($entry_point['css'] as $css_file) {
                            wp_enqueue_style('vite-main-style-' . basename($css_file), $dist_uri . $css_file, [], null);
                        }
                    }
                }
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// Add type="module" to the script tags enqueued by Vite
function add_type_module_to_vite_scripts($tag, $handle, $src) {
    if (in_array($handle, ['vite-client', 'vite-main-app'], true)) {
        // The 'defer' attribute is important for performance and to avoid render-blocking.
        return '<script type="module" src="' . esc_url($src) . '" defer></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_type_module_to_vite_scripts', 10, 3);

/**
 * Gets the correct URL for a static asset, whether in development or production.
 *
 * This function checks if the Vite development server is running.
 * - If yes, it returns the full URL to the asset served by Vite's dev server.
 * - If no (production), it returns the URL to the asset in the 'dist' directory.
 *
 * @param string $asset The path to the asset relative to the project root (e.g., 'src/img/logo.svg').
 * @return string The full, correct URL to the asset.
 */
function get_vite_asset($asset) {
    // Check if we are in development mode (the 'hot' file exists).
    if (is_vite_dev_mode()) {
        // In dev, return the full URL to the asset served by the Vite dev server.
        // The asset path must be relative to the project root.
        return 'http://localhost:3000/' . $asset;
    } else {
        // In production, we need to map the 'src' path to the 'dist' path.
        // Based on vite.config.js, 'src/img/' becomes 'dist/assets/img/'.
        // Note: This mapping needs to be updated if vite.config.js changes.
        $production_asset = str_replace('src/img/', 'assets/img/', $asset);
        return get_theme_file_uri('/dist/' . $production_asset);
    }
}

/**
 * Returns the array of availability statuses and their labels.
 * Centralizes the choices for reuse in the Customizer and templates.
 *
 * @return array
 */
function antoninolattene_child_get_availability_choices() {
	return array(
		'available'     => __( 'Available', 'antoninolattene-child' ),
		'limited'       => __( 'Limited availability', 'antoninolattene-child' ),
		'not-available' => __( 'Unavailable', 'antoninolattene-child' ),
	);
}
/**
 * Registra las opciones de personalización del tema (Theme Customizer).
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function antoninolattene_child_customize_register( $wp_customize ) {
	// 1. Añadir una nueva sección para el estado de disponibilidad.
	$wp_customize->add_section( 'availability_status_section', array(
		'title'    => __( 'Disponibilidad', 'antoninolattene-child' ),
		'priority' => 30,
	) );

	// 2. Añadir el ajuste para el estado (el valor guardado).
	$wp_customize->add_setting( 'availability_status', array(
		'default'           => 'limited',
		'transport'         => 'refresh', // La vista previa se actualiza al guardar.
		'sanitize_callback' => 'antoninolattene_child_sanitize_availability_status',
	) );

	// 3. Añadir el control para el estado (el selector desplegable).
	$wp_customize->add_control( 'availability_status_control', array(
		'label'       => __( 'Estado Actual', 'antoninolattene-child' ),
		'description' => __( 'El texto se actualizará automáticamente según el estado que elijas.', 'antoninolattene-child' ),
		'section'     => 'availability_status_section',
		'settings'    => 'availability_status',
		'type'        => 'select',
		'choices'     => antoninolattene_child_get_availability_choices(),
	) );

	// 4. Añadir el ajuste y control para el logo alternativo (para el efecto de scroll).
	$wp_customize->add_setting( 'alternative_logo', array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url_raw', // More flexible callback for image controls.
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'alternative_logo_control', array(
		'label'       => __( 'Logo Alternativo (al hacer scroll)', 'antoninolattene-child' ),
		'description' => __( 'Este logo aparecerá brevemente cuando el usuario haga scroll hacia abajo.', 'antoninolattene-child' ),
		'section'     => 'title_tagline', // Lo añadimos a la sección "Identidad del sitio".
		'settings'    => 'alternative_logo',
	) ) );

	// --- Portfolio Archive Settings ---
	$wp_customize->add_section( 'portfolio_archive_section', array(
		'title'       => __( 'Archivo de Portfolio', 'antoninolattene-child' ),
		'priority'    => 35,
		'description' => __( 'Configura el título y la descripción para la página principal del archivo de portfolio (/portfolio).', 'antoninolattene-child' ),
	) );

	// Title Setting
	$wp_customize->add_setting( 'portfolio_archive_title', array(
		'default'           => 'Case Studies & Designs Showcase',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'portfolio_archive_title_control', array(
		'label'    => __( 'Título del Archivo', 'antoninolattene-child' ),
		'section'  => 'portfolio_archive_section',
		'settings' => 'portfolio_archive_title',
		'type'     => 'text',
	) );

	// Description Setting
	$wp_customize->add_setting( 'portfolio_archive_description', array(
		'default'           => 'Discover my design journey! This portfolio features <strong>UX Case Studies</strong> and <strong>UI Designs</strong>, showcasing my approach to <strong>user-centered design</strong> and the final, polished results.',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post', // Allows safe HTML
	) );
	$wp_customize->add_control( 'portfolio_archive_description_control', array(
		'label'    => __( 'Descripción del Archivo', 'antoninolattene-child' ),
		'section'  => 'portfolio_archive_section',
		'settings' => 'portfolio_archive_description',
		'type'     => 'textarea',
	) );
}
add_action( 'customize_register', 'antoninolattene_child_customize_register' );


/**
 * Register custom image sizes to improve performance.
 *
 * By defining specific image sizes, we can serve optimized images
 * instead of the full-size original, leading to faster page loads.
 */
function antoninolattene_image_sizes_setup() {
	// A dedicated size for the site logo, optimized for retina displays.
	add_image_size( 'site-logo', 128, 128 ); // 128x128px, proportional.
}
add_action( 'after_setup_theme', 'antoninolattene_image_sizes_setup' );
/**
 * Strips the wrapper div that WordPress sometimes adds around oEmbed elements
 * when they are used as a post thumbnail (e.g., featured videos).
 *
 * @param string $html The post thumbnail HTML.
 * @return string The modified post thumbnail HTML.
 */
function antoninolattene_strip_thumbnail_wrapper( $html ) {
    // This regex looks for an iframe or video tag and extracts it from any parent container.
    // It's a non-greedy match and allows for whitespace around the media element.
    $unwrapped_html = preg_replace( '/<div[^>]*>\s*(<iframe.*?>|<video.*?>)\s*<\/div>/s', '$1', $html );

    // Only return the modified HTML if a replacement was actually made.
    if ( $unwrapped_html && $unwrapped_html !== $html ) {
        return $unwrapped_html;
    }
    return $html;
}
add_filter( 'post_thumbnail_html', 'antoninolattene_strip_thumbnail_wrapper' );

/**
 * Función de saneamiento para el selector de estado de disponibilidad.
 *
 * @param string $input El valor seleccionado.
 * @return string El valor saneado.
 */
function antoninolattene_child_sanitize_availability_status( $input ) {
	$valid = array( 'available', 'limited', 'not-available' );
	return in_array( $input, $valid, true ) ? $input : 'limited';
}









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
add_filter( 'nav_menu_css_class', 'theme_remove_cpt_blog_class', 10, 3);

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
add_action( 'nav_menu_css_class', 'theme_add_cpt_ancestor_class', 10, 3);



/**
 * Returns a centralized map of category slugs to Font Awesome icon classes.
 * This avoids code duplication and provides a single source of truth.
 * Using slugs is more robust than names as they don't typically change.
 *
 * @return array The icon map.
 */
function get_category_icon_map() {
    return array(
        'front-end-development' => 'fa-solid fa-code',
        'ui-design'             => 'fa-solid fa-pen-ruler',
        'ux-design'             => 'fa-solid fa-user-group',
        'graphic-design'        => 'fa-solid fa-palette'
    );
}





/**
 * Generates and displays breadcrumbs with consistent visual identity.
 *
 * Adopts the visual style of categories/tags, including icons and colors
 * for different sections (Blog vs. Portfolio).
 */
function antoninolattene_breadcrumbs( $args = array() ) {
	// --- Settings ---
	$separator         = '/';
	$home_title        = 'Home';
	$max_length        = 18; // Max characters for the last item.
	$truncation_suffix = '...';
	$icon_map          = get_category_icon_map(); // Get the category icon map.

	// --- Default arguments ---
	$defaults = array(
		'display_mode' => 'full', // 'full' or 'category_only'
		'post_id'      => get_the_id(),
		'taxonomy'     => 'category',
		'is_linked'    => true, // New: Controls if breadcrumb items are links.
	);
	$args     = wp_parse_args( $args, $defaults );

	if ( 'category_only' === $args['display_mode'] ) {
		antoninolattene_display_categories_as_breadcrumbs( $args, $icon_map );
		return;
	}

	// --- Early exit if on the front page ---
	if ( is_front_page() ) {
		return;
	}

	// --- Determine Post Type and Context ---
	global $post;
	$post_type      = get_post_type();
	$is_portfolio   = false;
	$queried_object = get_queried_object();

	if ( is_tax() || is_category() || is_tag() ) {
		if ( $queried_object && property_exists( $queried_object, 'taxonomy' ) && strpos( $queried_object->taxonomy, 'portfolio' ) !== false ) {
			$post_type = 'portfolio';
		} else {
			$post_type = 'post';
		}
	}

	// A single check for portfolio context
	if ( 'portfolio' === $post_type || ( is_archive() && isset( $queried_object->taxonomy ) && strpos( $queried_object->taxonomy, 'portfolio' ) !== false ) ) {
		$is_portfolio = true;
	}

	// --- Start Breadcrumbs Output ---
	echo '<ul class="breadcrumbs">';

	// 1. Home Link
	echo '<li class="breadcrumbs__item breadcrumbs__item--home"><a class="breadcrumbs__link" href="' . esc_url( get_home_url() ) . '" title="' . esc_attr( $home_title ) . '"><i class="fa-solid fa-house"></i></a></li>';

	// 2. Section Link (Blog or Portfolio)
	if ( $is_portfolio ) {
		$archive_link = get_post_type_archive_link( 'portfolio' );
		if ( $archive_link ) {
			echo '<li class="breadcrumbs__separator">' . $separator . '</li>';
			// If we are on the portfolio archive page, it's the current item.
			if ( is_post_type_archive( 'portfolio' ) ) {
				echo '<li class="breadcrumbs__item breadcrumbs__item--current"><i class="fa-solid fa-folder-open"></i> Portfolio</li>';
			} else {
				echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . esc_url( $archive_link ) . '"><i class="fa-solid fa-folder-open"></i> Portfolio</a></li>';
			}
		}
	} else { // This covers 'post', 'category', 'tag', and standard pages
		$blog_page_id = get_option( 'page_for_posts' );
		if ( $blog_page_id && ! is_page() ) { // Don't show "Blog" on a standard page's breadcrumb
			echo '<li class="breadcrumbs__separator">' . $separator . '</li>';
			// If we are on the blog page (home.php), it's the current item.
			if ( is_home() ) {
				echo '<li class="breadcrumbs__item breadcrumbs__item--current"><i class="fa-solid fa-feather-pointed"></i> ' . esc_html( get_the_title( $blog_page_id ) ) . '</li>';
			} else {
				echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . esc_url( get_permalink( $blog_page_id ) ) . '"><i class="fa-solid fa-feather-pointed"></i> ' . esc_html( get_the_title( $blog_page_id ) ) . '</a></li>';
			}
		}
	}

	// --- Early exit for main archive pages, as they are already handled ---
	if ( is_post_type_archive() || is_home() ) {
		echo '</ul>';
		return;
	}

	// --- Main Logic for different page types ---

	// 3. Single Post (Blog or Portfolio)
	if ( is_single() ) {
		$taxonomy = $is_portfolio ? 'portfolio_category' : 'category';
		$terms    = get_the_terms( $post->ID, $taxonomy );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			$main_term = $terms[0];
			$ancestors = array_reverse( get_ancestors( $main_term->term_id, $taxonomy ) );

			// Parent categories
			foreach ( $ancestors as $ancestor_id ) {
				$ancestor      = get_term( $ancestor_id, $taxonomy );
				$ancestor_icon = isset( $icon_map[ $ancestor->slug ] ) ? '<i class="' . esc_attr( $icon_map[ $ancestor->slug ] ) . '"></i> ' : '';
				echo '<li class="breadcrumbs__separator">' . $separator . '</li>';
				echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . esc_url( get_term_link( $ancestor ) ) . '">' . $ancestor_icon . esc_html( $ancestor->name ) . '</a></li>';
			}

			// Direct category
			$main_term_icon = isset( $icon_map[ $main_term->slug ] ) ? '<i class="' . esc_attr( $icon_map[ $main_term->slug ] ) . '"></i> ' : '';
			echo '<li class="breadcrumbs__separator">' . $separator . '</li>';
			echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . esc_url( get_term_link( $main_term ) ) . '">' . $main_term_icon . esc_html( $main_term->name ) . '</a></li>';
		}
		// Current post title
		$title = get_the_title();
		$truncated_title = $title;
		if ( mb_strlen( $title ) > $max_length ) {
			$truncated_title = mb_substr( $title, 0, $max_length ) . $truncation_suffix;
		}

		echo '<li class="breadcrumbs__separator">' . $separator . '</li>';
		echo '<li class="breadcrumbs__item breadcrumbs__item--current" title="' . esc_attr( $title ) . '">' . esc_html( $truncated_title ) . '</li>';

	// 4. Standard Page
	} elseif ( is_page() ) {
		if ( $post->post_parent ) {
			$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
			foreach ( $ancestors as $ancestor ) {
				echo '<li class="breadcrumbs__separator">' . $separator . '</li>';
				echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a></li>';
			}
		}
		$title = get_the_title();
		$truncated_title = $title;
		if ( mb_strlen( $title ) > $max_length ) {
			$truncated_title = mb_substr( $title, 0, $max_length ) . $truncation_suffix;
		}

		echo '<li class="breadcrumbs__separator">' . $separator . '</li>';
		echo '<li class="breadcrumbs__item breadcrumbs__item--current" title="' . esc_attr( $title ) . '">' . esc_html( $truncated_title ) . '</li>';

	// 5. Archive Page (Category, Tag, etc.)
	} elseif ( is_archive() ) { // This now only handles taxonomy archives due to the early exit above.
		$term = $queried_object;

		// Parent terms
		if ( $term && isset( $term->taxonomy ) ) {
			$ancestors = array_reverse( get_ancestors( $term->term_id, $term->taxonomy ) );
			foreach ( $ancestors as $ancestor_id ) {
				$ancestor      = get_term( $ancestor_id, $term->taxonomy );
				$ancestor_icon = isset( $icon_map[ $ancestor->slug ] ) ? '<i class="' . esc_attr( $icon_map[ $ancestor->slug ] ) . '"></i> ' : '';
				echo '<li class="breadcrumbs__separator">' . $separator . '</li>';
				echo '<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="' . esc_url( get_term_link( $ancestor ) ) . '">' . $ancestor_icon . esc_html( $ancestor->name ) . '</a></li>';
			}
		}

		// Current archive title
		$archive_title = '';
		$archive_icon  = '';

		if ( is_category() || is_tag() || is_tax() ) {
			// For any term archive, get the name without the "Category:", "Tag:", etc. prefix.
			$archive_title = single_term_title( '', false );
		} else {
			// For other archives (date, author), keep the default title which includes a prefix.
			$archive_title = get_the_archive_title();
		}

		// Determine the icon based on the archive type
		if ( is_category() || is_tax( 'portfolio_category' ) ) {
			$archive_icon = isset( $icon_map[ $term->slug ] ) ? '<i class="' . esc_attr( $icon_map[ $term->slug ] ) . '"></i> ' : '';
		} elseif ( is_tag() || is_tax( 'portfolio_tag' ) ) {
			$archive_icon = '<i class="fa-solid fa-hashtag"></i> ';
		}

		$truncated_archive_title = $archive_title;
		if ( mb_strlen( $archive_title ) > $max_length ) {
			$truncated_archive_title = mb_substr( $archive_title, 0, $max_length ) . $truncation_suffix;
		}

		echo '<li class="breadcrumbs__separator">' . $separator . '</li>';
		echo '<li class="breadcrumbs__item breadcrumbs__item--current" title="' . esc_attr( $archive_title ) . '">' . $archive_icon . esc_html( $truncated_archive_title ) . '</li>';
	}

	echo '</ul>';
}

/**
 * Helper function to display only categories using the breadcrumbs structure.
 * This is called by antoninolattene_breadcrumbs() when in 'category_only' mode.
 *
 * @param array $args The arguments passed to the main function.
 * @param array $icon_map The map of category slugs to icons.
 */
function antoninolattene_display_categories_as_breadcrumbs( $args, $icon_map ) {
	$terms = wp_get_post_terms( $args['post_id'], $args['taxonomy'], array( 'orderby' => 'term_order' ) );
	$is_linked = $args['is_linked'];

	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return;
	}

	$parent_cat = null;
	$child_cat  = null;

	foreach ( $terms as $term ) {
		if ( 0 === $term->parent && ! $parent_cat ) {
			$parent_cat = $term;
		} elseif ( 0 !== $term->parent && ! $child_cat ) {
			$child_cat = $term;
		}
	}

	if ( ! $parent_cat ) {
		return;
	}

	$parent_icon     = isset( $icon_map[ $parent_cat->slug ] ) ? '<i class="breadcrumbs__icon ' . esc_attr( $icon_map[ $parent_cat->slug ] ) . '"></i> ' : '';

	echo '<ul class="breadcrumbs">';
	echo '<li class="breadcrumbs__item">';
	if ( $is_linked ) {
		echo '<a class="breadcrumbs__link" href="' . esc_url( get_term_link( $parent_cat ) ) . '">' . $parent_icon . esc_html( $parent_cat->name ) . '</a>';
	} else {
		echo '<span class="breadcrumbs__link is-not-linked">' . $parent_icon . esc_html( $parent_cat->name ) . '</span>';
	}
	echo '</li>';
	if ( $child_cat ) {
		echo '<li class="breadcrumbs__separator">/</li>';
		echo '<li class="breadcrumbs__item">';
		if ( $is_linked ) {
			echo '<a class="breadcrumbs__link" href="' . esc_url( get_term_link( $child_cat ) ) . '">' . esc_html( $child_cat->name ) . '</a>';
	} else {
			echo '<span class="breadcrumbs__link is-not-linked">' . esc_html( $child_cat->name ) . '</span>';
	}
		echo '</li>';
	}
	echo '</ul>';
}

/**
 * --- Child Theme Overrides ---
 * The following functions override the parent theme's template tags to prevent them
 * from generating links. This provides more control over the output in templates
 * like project-tile.php.
 */

if ( ! function_exists( 'antoninolattene_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 * This version removes the link to the date archive.
	 */
	function antoninolattene_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'antoninolattene_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 * This version removes the link to the author archive.
	 */
	function antoninolattene_posted_by() {
		echo '<span class="byline"> by <span class="author vcard">' . esc_html( get_the_author() ) . '</span></span>'; // WPCS: XSS OK.
	}
endif;

/**
 * --- Excerpt Customization ---
 * These functions modify the default behavior of WordPress excerpts.
 */

/**
 * Sets the number of words to display in the post excerpt.
 *
 * @param int $length The default excerpt length.
 * @return int The new excerpt length.
 */
function antoninolattene_child_custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'antoninolattene_child_custom_excerpt_length', 999 );

/**
 * Replaces the default "[...]" with a simple ellipsis.
 */
function antoninolattene_child_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'antoninolattene_child_excerpt_more' );

/**
 * --- Archive Page Customization ---
 * These functions modify the display of archive pages.
 */

/**
 * Removes the default prefixes from archive titles (e.g., "Category:", "Tag:").
 * This provides a cleaner title on all archive pages.
 *
 * @param string $title The default archive title.
 * @return string The modified archive title without a prefix.
 */
function antoninolattene_child_custom_archive_title( $title ) {
	if ( is_category() || is_tag() || is_tax() ) {
		// For any taxonomy (category, tag, custom), just return the term name.
		$title = single_term_title( '', false );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'antoninolattene_child_custom_archive_title' );




//Add logo in login page
function login_logo() { 
  $logo_url = get_stylesheet_directory_uri() . '/assets/Logo-UX-UI-Desginer-Antonino-Lattene.svg';
  ?>
  <style type="text/css"> 
  body.login div#login h1 a {
    background-image: url(<?php echo esc_url( $logo_url ); ?>);
    background-size: contain;
  } 
  </style>
  <?php 
}
add_action( 'login_enqueue_scripts', 'login_logo' );


//Show Wordpress admin bar in front-end
// function admin_bar(){

//   if(is_user_logged_in()){
//     add_filter( 'show_admin_bar', '__return_true' , 1000 );
//   }
// }
// add_action('init', 'admin_bar' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function antoninolattene_child_body_classes( $classes ) {
	if ( is_home() || is_category() || is_tag() || is_single() && get_post_type() === 'post') {
		// Add 'blog' class to all blog related pages.
		$classes[] = 'blog';
	} elseif ( is_post_type_archive( 'portfolio' ) || is_tax( 'portfolio_category' ) || is_tax( 'portfolio_tag' ) || is_singular( 'portfolio' ) ) {
		// Add 'portfolio' class to all portfolio related pages.
		$classes[] = 'portfolio';
	}

	return $classes;
}
add_filter( 'body_class', 'antoninolattene_child_body_classes' );




/**
 * Solución definitiva: Asegura que el elemento del menú del blog SIEMPRE
 * tenga su clase personalizada, sin importar la página actual.
 *
 * Esto soluciona un bug/quirk de WordPress que elimina la clase en
 * ciertos contextos, como la página de inicio o archivos.
 */
function always_add_blog_menu_item_class( $classes, $item, $args ) {
    // 1. Obtenemos el ID de la página que está configurada como "Página de entradas" en Ajustes > Lectura.
    $blog_page_id = get_option( 'page_for_posts' );

    // 2. Si el ID de la página de entradas existe y coincide con el ID del objeto al que enlaza este elemento del menú...
    if ( $blog_page_id && $item->object_id == $blog_page_id ) {
        
        // 3. ...entonces este es el elemento del menú del Blog.
        // Nos aseguramos de que la clase 'menu-item-blog' esté en la lista.
        if ( ! in_array( 'menu-item-blog', $classes ) ) {
            $classes[] = 'menu-item-blog';
        }
    }
    
    // 4. Devolvemos la lista de clases (modificada o no).
    return $classes;
}
add_filter( 'nav_menu_css_class', 'always_add_blog_menu_item_class', 10, 3 );

/**
 * Shortcode para mostrar un banner inline personalizable.
 *
 * Uso: [inline_banner text="Tu texto obligatorio aquí" title="Título opcional" button_text="Botón opcional"]
 * El campo 'text' es obligatorio.
 *
 * @param array $atts Atributos del shortcode.
 * @return string HTML del banner.
 */
function antoninolattene_inline_banner_shortcode( $atts ) {
    $atts = shortcode_atts(
        array(
            'title'          => '',
            'text'           => 'Este es el texto obligatorio.', // Campo obligatorio
            'button_text'    => '',
            'button_url'     => '#',
            'button_classes' => 'btn btn-secondary btn-md',
            'button_icon'    => '',
        ),
        $atts,
        'inline_banner'
    );

    // Si el campo de texto obligatorio está vacío, no mostrar nada.
    if ( empty( $atts['text'] ) ) {
        return '';
    }

    // --- Construir el contenido del texto ---
    $content_html = '';
    if ( ! empty( $atts['title'] ) ) {
        $content_html .= '<h4>' . esc_html( $atts['title'] ) . '</h4>';
    }
    // El texto es obligatorio, así que lo añadimos.
    $content_html .= '<p>' . wp_kses_post( $atts['text'] ) . '</p>';

    // --- Construir el botón ---
    $action_html = '';
    if ( ! empty( $atts['button_text'] ) ) {
        $button_classes = esc_attr( $atts['button_classes'] );
        $button_icon    = esc_attr( $atts['button_icon'] );
        $icon_html      = '';

        if ( ! empty( $button_icon ) ) {
            $icon_html = '<i class="' . $button_icon . '"></i>';
        }

        $action_html = '<a href="' . esc_url( $atts['button_url'] ) . '" class="' . $button_classes . '">' . $icon_html . '<span class="btn-text">' . esc_html( $atts['button_text'] ) . '</span></a>';
    }

    // --- Ensamblar la salida final ---
    $output = '<div class="inline-banner">';

    // El div de contenido siempre se mostrará porque el texto es obligatorio.
    $output .= '<div class="inline-banner__content">' . $content_html . '</div>';

    if ( ! empty( $action_html ) ) {
        $output .= '<div class="inline-banner__action">' . $action_html . '</div>';
    }

    $output .= '</div>';

    return $output;
}
add_shortcode( 'inline_banner', 'antoninolattene_inline_banner_shortcode' );


// --- Custom Field for Featured Video URL ---

/**
 * Adds a meta box to the post and portfolio edit screens for the featured video URL.
 */
function antoninolattene_child_add_featured_video_meta_box() {
    add_meta_box(
        'antoninolattene_child_featured_video',
        __( 'Featured Video URL', 'antoninolattene-child' ),
        'antoninolattene_child_featured_video_meta_box_callback',
        array( 'post', 'portfolio' ), // Show on posts and portfolio custom post type
        'side', // Changed to 'side'
        'low'   // Changed to 'low'
    );
}
add_action( 'add_meta_boxes', 'antoninolattene_child_add_featured_video_meta_box' );

/**
 * Displays the meta box content for the featured video URL.
 *
 * @param WP_Post $post The current post object.
 */
function antoninolattene_child_featured_video_meta_box_callback( $post ) {
    wp_nonce_field( 'antoninolattene_child_save_featured_video', 'antoninolattene_child_featured_video_nonce' );

    $video_url = get_post_meta( $post->ID, '_featured_video_url', true );
    ?>
    <p>
        <label for="antoninolattene_child_video_url"><?php _e( 'Enter the URL for the featured video (e.g., MP4, WebM):', 'antoninolattene-child' ); ?></label>
        <br>
        <input type="url" id="antoninolattene_child_video_url" name="antoninolattene_child_video_url" value="<?php echo esc_url( $video_url ); ?>" style="width: 100%;" />
        <p class="description"><?php _e( 'This video will be displayed instead of the featured image if provided.', 'antoninolattene-child' ); ?></p>
    </p>
    <?php
}

/**
 * Saves the featured video URL when the post is saved.
 *
 * @param int $post_id The ID of the post being saved.
 */
function antoninolattene_child_save_featured_video_meta_data( $post_id ) {
    // Check if our nonce is set.
    if ( ! isset( $_POST['antoninolattene_child_featured_video_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['antoninolattene_child_featured_video_nonce'], 'antoninolattene_child_save_featured_video' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'portfolio' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    // Sanitize and save the data.
    if ( isset( $_POST['antoninolattene_child_video_url'] ) ) {
        $new_video_url = esc_url_raw( $_POST['antoninolattene_child_video_url'] );
        update_post_meta( $post_id, '_featured_video_url', $new_video_url );
    } else {
        delete_post_meta( $post_id, '_featured_video_url' );
    }
}
add_action( 'save_post', 'antoninolattene_child_save_featured_video_meta_data' );
