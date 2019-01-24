<?php
/**
 * _s functions and definitions
 *
 * @package unite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */




add_action( 'wp_enqueue_scripts', 'my_child_theme_scripts' );
function my_child_theme_scripts() {
	wp_enqueue_style( 'unite-style', get_template_directory_uri() . '/style.css' );
	

	wp_enqueue_style( 'my-child-theme', get_stylesheet_uri());



}



add_shortcode( 'art_related_posts', 'related_posts_function' );
function related_posts_function ($atts){
	$atts = shortcode_atts( array(
		'id' => '',
		'count' => 5
		), $atts );

	$args = array(
		'post_type' => 'films',
		'post_status' => 'publish',
		'posts_per_page' => $atts['count'],
		'include' => $atts['id']
		);
	$out_posts = get_posts( $args );
	$out = '<style>
		.art-rp{ 
			border-radius:10px;
		    background: #ECCEF5;
		    padding: 20px 20px;
		}
		.art-rp li{
			margin-left:30px;
		}
	</style>';
	$out .= '<ul class="art-rp">';
	foreach ($out_posts as $post) {
		setup_postdata( $post );
		$out .= '<li><a href="'. get_the_permalink($post->ID) .'">'. get_the_title( $post->ID ) . '</a></li>';
	}
	$out .= '</ul>';
	wp_reset_postdata();

	return $out;
}
?>
<?php

function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
?>


<?php
function cptui_register_my_cpts() {

	/**
	 * Post Type: films.
	 */

	$labels = array(
		"name" => __( "films", "custom-post-type-ui" ),
		"singular_name" => __( "film", "custom-post-type-ui" ),
		"menu_name" => __( "Фильм", "custom-post-type-ui" ),
		"all_items" => __( "Фильмы", "custom-post-type-ui" ),
		"add_new" => __( "Добавить Фильм", "custom-post-type-ui" ),
		"add_new_item" => __( "Фильм", "custom-post-type-ui" ),
		"edit_item" => __( "Фильм", "custom-post-type-ui" ),
		"new_item" => __( "Фильм", "custom-post-type-ui" ),
		"view_item" => __( "Фильм", "custom-post-type-ui" ),
		"view_items" => __( "Фильмы", "custom-post-type-ui" ),
		"search_items" => __( "Фильм", "custom-post-type-ui" ),
		"not_found" => __( "Фильм", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "films", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "Создание фильма",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "films", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "films", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );



function cptui_register_my_cpts_films() {

	/**
	 * Post Type: films.
	 */

	$labels = array(
		"name" => __( "films", "custom-post-type-ui" ),
		"singular_name" => __( "film", "custom-post-type-ui" ),
		"menu_name" => __( "Фильм", "custom-post-type-ui" ),
		"all_items" => __( "Фильмы", "custom-post-type-ui" ),
		"add_new" => __( "Добавить Фильм", "custom-post-type-ui" ),
		"add_new_item" => __( "Фильм", "custom-post-type-ui" ),
		"edit_item" => __( "Фильм", "custom-post-type-ui" ),
		"new_item" => __( "Фильм", "custom-post-type-ui" ),
		"view_item" => __( "Фильм", "custom-post-type-ui" ),
		"view_items" => __( "Фильмы", "custom-post-type-ui" ),
		"search_items" => __( "Фильм", "custom-post-type-ui" ),
		"not_found" => __( "Фильм", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "films", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "Создание фильма",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "films", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "films", $args );
}

add_action( 'init', 'cptui_register_my_cpts_films' );


function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Actors.
	 */

	$labels = array(
		"name" => __( "Actors", "custom-post-type-ui" ),
		"singular_name" => __( "Actor", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Actors", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'actors', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "actors",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "actors", array( "films" ), $args );

	/**
	 * Taxonomy: Genres.
	 */

	$labels = array(
		"name" => __( "Genres", "custom-post-type-ui" ),
		"singular_name" => __( "Genre", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Genres", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'genres', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "genres",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "genres", array( "films" ), $args );

	/**
	 * Taxonomy: country.
	 */

	$labels = array(
		"name" => __( "country", "custom-post-type-ui" ),
		"singular_name" => __( "country", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "country", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'country', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "country",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "country", array( "films" ), $args );

	/**
	 * Taxonomy: Goda.
	 */

	$labels = array(
		"name" => __( "Goda", "custom-post-type-ui" ),
		"singular_name" => __( "God", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Goda", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'god', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "god",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "god", array( "films" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes' );



add_post_meta( 42, 'cost', '132');
add_post_meta( 39, 'cost', '45');
add_post_meta( 36, 'cost', '76');
add_post_meta( 33, 'cost', '115');

add_post_meta( 42, 'date-in', '12.02.2016');
add_post_meta( 39, 'date-in', '13.01.2008');
add_post_meta( 36, 'date-in', '14.05.2007');
add_post_meta( 33, 'date-in', '27.08.2011');


?>










