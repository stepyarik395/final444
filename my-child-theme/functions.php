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


