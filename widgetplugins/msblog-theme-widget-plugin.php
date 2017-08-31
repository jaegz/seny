<?php
/*
Plugin Name: MainStay Blog Sidebar Widgets
Description: Custom sidebar widgets for the msblog-theme. Go to 'Appearance > Widgets' to drag-and-drop widgets into a sidebar 
Author: Chris Jaeger
Author URI: mailto:chris_jaeger@nylim.com
Version: 1.0.0
*/


// SHARE THIS WIDGET
class sharethis_widget extends WP_Widget {
	
	function __construct(){
		parent::__construct(
			'sharethis_widget',
			__('Share/Print This', 'msblog_widget_domain'),
			array('description' => __('Add social media, email, and print icons', 'msblog_widget_domain'), )
		);
	}

	// front end
	public function widget($args, $instance) {
		// before and after arguments are defined by theme functions.php
		echo $args['before_widget'];
		// include ($_SERVER['DOCUMENT_ROOT'] . '/mainstay/msblog/wordpress/wp-content/themes/msblog-theme/widget-sharethis.php');
		include ('widget-sharethis.php');
		echo $args['after_widget'];
	}	

	// back end
	public function form( $instance ) {
	?>
		<ul>
			<li>LinkedIn</li>
			<li>Facebook</li>
			<li>Twitter</li>
			<li>Google+</li>
			<li>Email</li>
			<li>Print</li>
		</ul>
	<?php
	}
} // End class sharethis_widget

// RELATED POSTS WIDGET
class relatedPosts_widget extends WP_Widget {
	
	function __construct(){
		parent::__construct(
			'relatedPosts_widget',
			__('Related Posts', 'msblog_widget_domain'),
			array('description' => __('Posts related by matching Tags', 'msblog_widget_domain'), )
		);
	}

	// front end
	public function widget($args, $instance) {
		// before and after arguments are defined by theme functions
		echo $args['before_widget'];
		// include ($_SERVER['DOCUMENT_ROOT'] . '/mainstay/msblog/wordpress/wp-content/themes/msblog-theme/widget-relatedposts.php');
		include ('widget-relatedposts.php');
		echo $args['after_widget'];
	}	

	// back end
	// public function form( $instance ) { 
	// do something
	// }
} // End class relatedposts_widget

// LATEST POSTS WIDGET
class latestPosts_widget extends WP_Widget {
	
	function __construct(){
		parent::__construct(
			'latestPosts_widget',
			__('Latest Posts', 'msblog_widget_domain'),
			array('description' => __('Latest posts published to the blog', 'msblog_widget_domain'), )
		);
	}

	// front end
	public function widget($args, $instance) {
		// before and after arguments are defined by theme functions
		echo $args['before_widget'];
		// include ($_SERVER['DOCUMENT_ROOT'] . '/mainstay/msblog/wordpress/wp-content/themes/msblog-theme/widget-relatedposts.php');
		include ('widget-latestposts.php');
		echo $args['after_widget'];
	}	

	// back end
	// public function form( $instance ) { 
	// do something
	// }
} // End class latestposts_widget


// POPULAR POSTS WIDGET
class popularPosts_widget extends WP_Widget {
	
	function __construct(){
		parent::__construct(
			'popularPosts_widget',
			__('Popular Posts', 'msblog_widget_domain'),
			array('description' => __('Three popular posts', 'msblog_widget_domain'), )
		);
	}

	// front end
	public function widget($args, $instance) {
		// before and after arguments are defined by theme functions
		echo $args['before_widget'];
		// include ($_SERVER['DOCUMENT_ROOT'] . '/mainstay/msblog/wordpress/wp-content/themes/msblog-theme/widget-relatedposts.php');
		include ('widget-popularposts.php');
		echo $args['after_widget'];
	}	

	// back end
	// public function form( $instance ) { 
	// do something
	// }
} // End class popularposts_widget

// ELOQUA SUBSCRIPTION WIDGET
class eloqua_widget extends WP_Widget {
	
	function __construct(){
		parent::__construct(
			'eloqua_widget',
			__('Eloqua Subscription Form', 'msblog_widget_domain'),
			array('description' => __('Eloqua email capture form', 'msblog_widget_domain'), )
		);
	}

	// front end
	public function widget($args, $instance) {
		// before and after arguments are defined by theme functions
		echo $args['before_widget'];
		// include ($_SERVER['DOCUMENT_ROOT'] . '/mainstay/msblog/wordpress/wp-content/themes/msblog-theme/widget-relatedposts.php');
		include ('widget-eloqua.php');
		echo $args['after_widget'];
	}	

	// back end
	// public function form( $instance ) { 
	// do something
	// }
} // End class eloqua_widget


// TAG CLOUD
class tagcloud_widget extends WP_Widget {
	
	function __construct(){
		parent::__construct(
			'tagcloud_widget',
			__('Tag Cloud', 'msblog_widget_domain'),
			array('description' => __('Assortment of most popular tags', 'msblog_widget_domain'), )
		);
	}

	// front end
	public function widget($args, $instance) {
		// before and after arguments are defined by theme functions
		echo $args['before_widget'];
		// include ($_SERVER['DOCUMENT_ROOT'] . '/mainstay/msblog/wordpress/wp-content/themes/msblog-theme/widget-relatedposts.php');
		include ('widget-tagcloud.php');
		echo $args['after_widget'];
	}	

	// back end
	// public function form( $instance ) { 
	// do something
	// }
} // End class tagcloud_widget

// TWITTER FEED
class twitter_widget extends WP_Widget {
	
	function __construct(){
		parent::__construct(
			'twitter_widget',
			__('Twitter Feed', 'msblog_widget_domain'),
			array('description' => __('Most recent Tweets', 'msblog_widget_domain'), )
		);
	}

	// front end
	public function widget($args, $instance) {
		// before and after arguments are defined by theme functions
		echo $args['before_widget'];
		// include ($_SERVER['DOCUMENT_ROOT'] . '/mainstay/msblog/wordpress/wp-content/themes/msblog-theme/widget-relatedposts.php');
		include ('widget-twitter.php');
		echo $args['after_widget'];
	}	

	// back end
	// public function form( $instance ) { 
	// do something
	// }
} // End class twitter_widget

// Register and load the widgets
function msblog_load_widget() {
	register_widget( 'sharethis_widget' );
	register_widget( 'relatedPosts_widget' );
	register_widget( 'latestPosts_widget' );
	register_widget( 'popularPosts_widget' );
	register_widget( 'eloqua_widget' );
	register_widget( 'tagcloud_widget' );
	register_widget( 'twitter_widget' );
}
add_action( 'widgets_init', 'msblog_load_widget' );

?>




