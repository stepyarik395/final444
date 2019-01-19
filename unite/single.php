<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<?php
/**
 * The Template for displaying all single posts.
 *
 * @package unite
 */

get_header(); ?>


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>




			 <?php
					$cur_terms = get_the_terms( $post->ID, 'country' );
					if( is_array( $cur_terms ) ){
				foreach( $cur_terms as $cur_term ){
					echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>'.'<br>';
				}
			}
			?>

			<?php

		$cur_terms = get_the_terms( $post->ID, 'genres' );
		if( is_array( $cur_terms ) ){
			foreach( $cur_terms as $cur_term ){
				echo  '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">' . $cur_term->name .'</a>'.' <br>';
			}
		}
		?>
			
		<?php
		$custom_fields = get_post_custom($post->ID);
		$my_custom_field = $custom_fields['cost_session'];
		foreach ( $my_custom_field as $key => $value )
			$key = "<label>Цена за билет</label>";
		echo $key . " => " . $value . "<br />";
		?>


		<?php
		$custom_fields = get_post_custom($post->ID);
		$my_custom_field = $custom_fields['date_output'];
		foreach ( $my_custom_field as $key => $value )
			$key = "<i class='fas fa-table'></i>Дата выхода в прокат";;
		echo $key . " => " . $value . "<br />";
		?>











		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>