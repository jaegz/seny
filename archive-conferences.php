<?php
/**
 * Template Name: Conferences Archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package safetyexecsny
 */

get_header(); ?>

<section id="banner">
	<h2><?php post_type_archive_title();?></h2>
</section>

	<section id="main" class="container">
			<?php
			// while have custom posts
			$args = array( 'post_type' => 'conferences', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );
			
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="box">
		  		<span><?php the_time('F jS, Y') ?></span>
		  		<h3>
		  			<a href="<?php the_permalink(); ?>">
		  				<?php the_title(); ?>
		  			</a>
		  		</h3>
		  		<?php if( have_rows('all_presentations') ): ?>
		    		<?php while ( have_rows('all_presentations') ) : the_row(); ?>
	        			<p><?php the_sub_field('name'); ?></p>
					<?php endwhile; ?>
				<?php else : ?>
		    	
				<?php endif; ?>
			</div>
			<?php endwhile; ?>

		<nav class="pagination">
			<?php pagination_bar(); ?>
		</nav>
	</section>

<?php
get_footer();
