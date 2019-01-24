
<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package unite
 */


get_header(); ?>

	
 <div class="row">
 	

<div class="col-md-6">

	<?php 
 
/*
 * Получаем все Отзывы
 * post_type - название нашего произвольного типа записей (идентификатор)
 * posts_per_page - количество получаемых записей 
 * (в нашем случае стоит -1, это значит, что нужно получить все посты)
 */
$reviews = new WP_Query(array('post_type' => 'films', 'page_id' => 42)); 
 
?>
 <!-- Не забудьте в цикл добавить полученный объект постов $reviews -->
    <?php if ( $reviews->have_posts() ) : while ( $reviews->have_posts() ) : $reviews->the_post(); ?>



    	 <?php


		$cur_terms = get_the_terms( $post->ID, 'country' );
		if( is_array( $cur_terms ) ){
			foreach( $cur_terms as $cur_term ){
				echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>'.'&#32;'.'<img src ="wp-content/themes/my-child-theme/inc/img/usa.png">'.'<br>';
			}
		}
		?>


    	 <?php

		$cur_terms = get_the_terms( $post->ID, 'genres' );
		if( is_array( $cur_terms ) ){
			foreach( $cur_terms as $cur_term ){
				echo  '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">' . $cur_term->name .'</a>'.'&#32;'.'<i class="fas fa-running"></i>'.' <br>';
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
			$key = "<i class='fas fa-table'></i>Дата выхода в прокат";
		echo $key . " => " . $value . "<br />";
		?>



		


 
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="review-excerpt"><?php the_excerpt(); ?></div>
 
    <?php endwhile; ?>
    <?php endif; ?>


</div>
<div class="col-md-6">

	<?php 

	$reviews = new WP_Query(array('post_type' => 'films', 'page_id' => 39 )); 
 
?>
 <!-- Не забудьте в цикл добавить полученный объект постов $reviews -->
    <?php if ( $reviews->have_posts() ) : while ( $reviews->have_posts() ) : $reviews->the_post(); ?>



    	 <?php


		$cur_terms = get_the_terms( $post->ID, 'country' );
		if( is_array( $cur_terms ) ){
			foreach( $cur_terms as $cur_term ){
				echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>'.'&#32;'.'<img class ="iconm" src ="wp-content/themes/my-child-theme/inc/img/usa.png">'.'<br>';
			}
		}
		?>


    	 <?php

		$cur_terms = get_the_terms( $post->ID, 'genres' );
		if( is_array( $cur_terms ) ){
			foreach( $cur_terms as $cur_term ){
				echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>'.'&#32;'.'<i class="fas fa-smile-beam"></i> '. '<br>';
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
			$key = "<i class='fas fa-table'></i>Дата выхода в прокат";
		echo $key . " => " . $value . "<br />";
		?>



		


 
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="review-excerpt"><?php the_excerpt(); ?></div>
 
    <?php endwhile; ?>
    <?php endif; ?>


	</div>
</div>

<div class="row">
	<div class="col-md-6">

		<?php 

	$reviews = new WP_Query(array('post_type' => 'films', 'page_id' => 36 )); 
 
?>
 <!-- Не забудьте в цикл добавить полученный объект постов $reviews -->
    <?php if ( $reviews->have_posts() ) : while ( $reviews->have_posts() ) : $reviews->the_post(); ?>



    	 <?php


		$cur_terms = get_the_terms( $post->ID, 'country' );
		if( is_array( $cur_terms ) ){
			foreach( $cur_terms as $cur_term ){
				echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>'.'&#32;'.'<img class ="iconm" src ="wp-content/themes/my-child-theme/inc/img/1234.jpeg">'.'<br>';
			}
		}
		?>


    	 <?php

		$cur_terms = get_the_terms( $post->ID, 'genres' );
		if( is_array( $cur_terms ) ){
			foreach( $cur_terms as $cur_term ){
				echo  '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>'.'&#32;'.'<i class="fas fa-ship"></i>'. '<br>';
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
			$key = "<i class='fas fa-table'></i>Дата выхода в прокат";
		echo $key . " => " . $value . "<br />";
		?>



		


 
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="review-excerpt"><?php the_excerpt(); ?></div>
 
    <?php endwhile; ?>
    <?php endif; ?>


	</div>

	<div class="col-md-6">


		<?php 

	$reviews = new WP_Query(array('post_type' => 'films', 'page_id' => 33 )); 
 
?>
 <!-- Не забудьте в цикл добавить полученный объект постов $reviews -->
    <?php if ( $reviews->have_posts() ) : while ( $reviews->have_posts() ) : $reviews->the_post(); ?>



    	 <?php


		$cur_terms = get_the_terms( $post->ID, 'country' );
		if( is_array( $cur_terms ) ){
			foreach( $cur_terms as $cur_term ){
				echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>'.'&#32;'.'<img class ="iconm" src ="wp-content/themes/my-child-theme/inc/img/canada.png">'.'<br>';
			}
		}
		?>


    	 <?php

		$cur_terms = get_the_terms( $post->ID, 'genres' );
		if( is_array( $cur_terms ) ){
			foreach( $cur_terms as $cur_term ){
				echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>'.'&#32;'.'<i class="fas fa-skull-crossbones"></i>'.'<br>';
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
			$key = "<i class='fas fa-table'></i>Дата выхода в прокат";
		echo $key . " => " . $value . "<br />";
		?>



		


 
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="review-excerpt"><?php the_excerpt(); ?></div>
 
    <?php endwhile; ?>
    <?php endif; ?>




	</div>

</div>


 
   

 
	</div>
</div>







<?php get_footer(); ?>
