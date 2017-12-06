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
	$conf_args = array( 
		'post_type' => 'seny_conferences', 
		'posts_per_page' => 10
	);
	$conf_loop = new WP_Query( $conf_args );
		
	while ( $conf_loop->have_posts() ) : $conf_loop->the_post(); ?>
		<div class="box">
	  		<span><?php echo get_field('conference_date'); ?></span>
	  		<h3>
	  			<a href="<?php the_permalink(); ?>">
	  				<?php the_title(); ?>
	  			</a>
	  		</h3>
		</div>
	<?php endwhile; ?>

	<nav class="pagination">
		<?php pagination_bar(); ?>
	</nav>
</section>

<?php
get_footer();
