<?php
/**
 * Template Name: News Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package safetyexecsny
 */

get_header(); ?>

	<section id="banner">
		<h2><?php the_title(); ?></h2>
	</section>

	<section id="main" class="container">
		<div class="box">		
		<?php

		$news_query = new WP_Query(array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'orderby' => 'date'
		));

		if ( $news_query->have_posts() ) {
			while ( $news_query->have_posts() ) {
				$news_query->the_post();
				get_template_part( 'template-parts/content-excerpt', get_post_format() );
			}
			wp_reset_postdata();
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}?>
		<?php get_sidebar(); ?>
		</div>
		<nav class="pagination">
			<?php pagination_bar(); ?>
		</nav>
	</section>

<?php
get_footer();
