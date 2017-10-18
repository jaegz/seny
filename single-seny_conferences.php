<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package safetyexecsny
 */

get_header(); ?>

	<section id="banner">
		<h2><?php the_title(); ?></h2>
		<div class="entry-meta">
			<?php echo get_field('conference_date'); ?> 
		</div>
	</section>

	<section id="main" class="container">
			<?php
			// check if the repeater field has rows of data
			if( have_rows('conference_presentations') ):

 				// loop through the rows of data
    			while ( have_rows('conference_presentations') ) : the_row();
    			?>
    			<div class="box">
    				<h3>
    					<?php the_sub_field('presentation_title'); ?>
    				</h3>
					<?php 
						$bio = get_sub_field('presentation_speaker_bio');
    					if( $bio ): ?>
		    				<a href="<?php echo get_permalink($bio->ID);?>">
    							<?php the_sub_field('presentation_speaker'); ?>
    						</a>
    					<?php else: ?>
    							<?php the_sub_field('presentation_speaker'); ?>
    					<?php endif; ?>
					<p>
   						<?php the_sub_field('presentation_description'); ?>
   						<a class="button special small" href="<?php the_sub_field('presentation_download_link'); ?>" >Download Slideshow</a>
					</p>    					
				</div>
				<?php
   				endwhile;

			else :
    			echo 'no data found';
			endif;
			?>
	</section>

<?php
//get_sidebar();
get_footer();
