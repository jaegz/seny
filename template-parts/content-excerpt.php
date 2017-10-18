<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package safetyexecsny
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php the_time('F jS, Y') ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<a class="button special small" href="<?php echo get_permalink(); ?>"> Read More...</a>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
