<?php
/**
 * Template Name: About Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package safetyexecsny
 */

get_header(); ?>

	<section id="banner">
		<h2><?php the_title();?></h2>
	</section>

	<section id="main" class="container">
		<div class="box">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
		</div>

		<div class="box">
			<?php 
			while( have_posts() ) : the_post();
				if ( have_rows('about_groups') ):
					while ( have_rows('about_groups') ): the_row(); ?>

			<header>
				<h3><?php the_sub_field('group_title'); ?></h3>
			</header>

			<?php if ( have_rows('group_members') ): ?>
			
			<div class="row">
				<?php while ( have_rows('group_members') ): the_row(); ?>

				<div class="6u 12u(mobilep) bio">
					<img src="<?php the_sub_field('member_image');?>" alt="<?php the_sub_field('member_name'); ?> Headshot">
					<h4><?php the_sub_field('member_name'); ?></h4>
					<b><?php the_sub_field('member_position'); ?></b>
					<p>
						<a href="mailto:<?php the_sub_field('member_email')?>">Contact</a>
					</p>
				</div>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</section>

<?php
get_footer();
