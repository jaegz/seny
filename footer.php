<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package safetyexecsny
 */

?>

	</div><!-- #content -->

	<footer id="footer">
		<ul class="copyright">
			<li>&copy;  <span id="copyYear"></span> Safety Executives of New York, Inc. (SENY). All rights reserved.</li><li>Built by: <a href="http://blueantcreative.com">Blue Ant Creative</a></li>
		</ul>
	</footer>
	<div id="navButton">
		<a href="#navPanel" class="toggle"></a>
	</div>
	<div id="navPanel">
		<nav>
			<?php wp_nav_menu( array('menu'=> 'Menu 2','fallback_cb' => false) );?>
		</nav>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
