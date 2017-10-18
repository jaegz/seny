<?php
/**
 * @package safetyexecsny
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--[if lte IE 8]><script src="scritps/vendor/html5shiv.js"></script><![endif]-->
<?php wp_head(); ?>
<!--[if lte IE 8]><link rel="stylesheet" href="styles/ie8.css" /><![endif]-->
</head>

<?php if (is_home()) { ?>
<body id="home">
<?php } else { ?>
<body>
<?php } ?>
	<header id="header" class="top alt">
		<h1>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
		</h1>

		<nav id="site-navigation" class="main-navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav>
	</header>

	<div id="content" class="site-content">
