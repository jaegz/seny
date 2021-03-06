<?php
/**
 * safetyexecsny functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package safetyexecsny
 */

if ( ! function_exists( 'safetyexecsny_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function safetyexecsny_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'safetyexecsny' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'safetyexecsny_setup' );

/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function safetyexecsny_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'safetyexecsny' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'safetyexecsny' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'safetyexecsny_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function safetyexecsny_scripts() {

    wp_enqueue_style( 'safetyexecsny-style', get_template_directory_uri() . '/style.css', array(), 01062018 );
	wp_enqueue_style( 'safetyexecsny-style-fonts', get_template_directory_uri() . '/styles/font-awesome.min.css', array(), 01062018, true);
    
    //scripts
	//wp_enqueue_script( 'safetyexecsny-jquery', get_template_directory_uri() . '/scripts/vendor/jquery.min.js', array(), '20170819', true );	
	wp_enqueue_script( 'safetyexecsny-dropotron', get_template_directory_uri() . '/scripts/vendor/jquery.dropotron.min.js', array(), '20170819', true );
	wp_enqueue_script( 'safetyexecsny-scrollress', get_template_directory_uri() . '/scripts/vendor/jquery.scrollgress.min.js', array(), '20170819', true );
	wp_enqueue_script( 'safetyexecsny-skel', get_template_directory_uri() . '/scripts/vendor/skel.min.js', array(), '20170819', true );
    wp_enqueue_script( 'safetyexecsny-util', get_template_directory_uri() . '/scripts/vendor/util.js', array(), '20170819', true );
    wp_enqueue_script( 'safetyexecsny-parsley', get_template_directory_uri() . '/scripts/vendor/parsley.min.js', array(), '20171228', true );
	wp_enqueue_script( 'safetyexecsny-main', get_template_directory_uri() . '/scripts/custom/main.js', array(), '20170819', true );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'safetyexecsny_scripts' );


/**
 * Register Custom Post Types
 * @see register_post_type()
 **/

// Conferences
function register_conferences_post_type() {
    $conferences_labels = array(
        'name'          => 'Conferences',
        'singular_name' => 'Conference',
        'menu_name'     => 'Conferences'
    );
    
    $conferences_args = array(
        'labels'          => $conferences_labels,
        'public'          => true,
        'capability_type' => 'post',
        'has_archive'     => true,
        'menu_icon'       => 'dashicons-images-alt2',
        'rewrite'         => array('slug' => 'conferences')
    );

    register_post_type( 'seny_conferences', $conferences_args);
}
add_action( 'init', 'register_conferences_post_type');

// Speaeker Bios
function register_speakerbio_post_type() {
    $speakerbio_labels = array(
        'name'          => 'Speaker Bios',
        'singular_name' => 'Speaker Bio',
        'menu_name'     => 'Speaker Bios'
    );

    $speakerbio_args = array(
        'labels'          => $speakerbio_labels,
        'public'          => true,
        'capability_type' => 'post',
        'has_archive'     => true,
        'menu_icon'       => 'dashicons-groups',
        'rewrite'         => array('slug' => 'speaker-bio')
    );

    register_post_type( 'seny_speakerbios', $speakerbio_args);
}
add_action( 'init', 'register_speakerbio_post_type');

// Jobs
function register_jobs_post_type() {
    $jobs_labels = array(
        'name'          => 'Job Postings',
        'singular_name' => 'Job Posting',
        'menu_name'     => 'Job Postings'
    );

    $jobs_args = array(
        'labels'          => $jobs_labels,
        'public'          => true,
        'capability_type' => 'post',
        'has_archive'     => true,
        'menu_icon'       => 'dashicons-id',
        'rewrite'         => array('slug' => 'job-openings')
    );

    register_post_type( 'seny_jobs', $jobs_args);
}
add_action( 'init', 'register_jobs_post_type');




/*
* Remove Excerpt Read More [...]
*/
function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
* Pagination Bar
*/
function pagination_bar() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

/**
* Dashboard Cleanup
**/

// Remove sidebar menu items
function remove_menus(){
  remove_menu_page( 'edit-comments.php' ); //Comments 
}
add_action( 'admin_menu', 'remove_menus' );

// Remove Sidebar Widgets - Appearance > Widgets
function remove_default_widgets() {
    unregister_widget('WP_Widget_Archives');              // Archives Widget
    unregister_widget('WP_Widget_Media_Audio');          // Audio Player Media Widget 
    unregister_widget('WP_Widget_Calendar');             // Calendar Widget
    unregister_widget('WP_Widget_Categories');           // Categories Widget
    //unregister_widget('WP_Widget_Custom_HTML');        // Custom HTML Widget
    unregister_widget('WP_Widget_Media_Image');          // Image Media Widget 
    //unregister_widget('WP_Nav_Menu_Widget');           // Menus Widget
    unregister_widget('WP_Widget_Meta');                 // Meta Widget
    unregister_widget('WP_Widget_Pages');                // Pages Widget
    unregister_widget('WP_Widget_Links');                // Links Widget
    unregister_widget('WP_Widget_Media_Video');          // Video Media Widget 
    unregister_widget('WP_Widget_Search');               // Search Widget
    //unregister_widget('WP_Widget_Text');               // Text Widget
    unregister_widget('WP_Widget_Recent_Posts');         // Recent Posts Widget
    unregister_widget('WP_Widget_Recent_Comments');      // Recent Comments Widget
    unregister_widget('WP_Widget_RSS');                  // RSS Widget
    unregister_widget('WP_Widget_Tag_Cloud');            // Tag Cloud Widget
}

add_action( 'widgets_init', 'remove_default_widgets' );

// Remove Dashboard Widgets
function disable_default_dashboard_widgets() {
    global $wp_meta_boxes;
    // wp..
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
    // bbpress
    unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);
    // yoast seo
    unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);
    // gravity forms
    unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
}
// add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets', 999);


// AJAX form 

// ****
// add code to load on form page only
// ****

function localize_ajaxForm_js() {
    wp_enqueue_script('ajax_formSubmit_js', get_template_directory_uri() . '/scripts/custom/ajax_formSubmit.js', array('jquery'), null, true);
    wp_localize_script('ajax_formSubmit_js', 'ajaxpath', array('ajaxurl' => admin_url('admin-ajax.php'), 'ajax_nonce' => wp_create_nonce('my-special')));
}
add_action('wp_enqueue_scripts', 'localize_ajaxForm_js');

// make sure we can handle file attachment
if (! function_exists('wp_handle_upload')) {
    require_once( ABSPATH . 'wp-admin/includes/file.php');
}

function formSubmitHandler_ajax() {
    // add nonce for security
    check_ajax_referer('my-special', 'security');

    //var_dump($_POST);
    //var_dump($_FILES);

    $firstname = ($_POST["first-name"]);
    $lastname = ($_POST["last-name"]);
    $phonenumber = ($_POST["phone-number"]);
    $email = ($_POST["email"]);
    $employer = ($_POST["employer"]);
    $businessaddress = ($_POST["business-address"]);
    $businesscity = ($_POST["business-city"]);
    $businessstate = ($_POST["business-state"]);
    $businesszip = ($_POST["business-zip"]);
    $title = ($_POST["title"]);
    $timecurrent = ($_POST["time-current"]);
    $timeehs = ($_POST["time-ehs"]);
    $report = ($_POST["report"]);
    $scope = ($_POST["scope"]);
    $related = ($_POST["related"]);
    $date = ($_POST["date"]);
    
    $uploadedfile = $_FILES['file'];
    $upload_overrides = array( 'test_form' => false );
    $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
    
    if ( $movefile && ! isset( $movefile['error'] ) ) {
        //echo "File is valid, and was successfully uploaded.\n";
        //print_r( $movefile );
        $attachments = $movefile['file'];
    } else {
        /**
         * Error generated by _wp_handle_upload()
         * @see _wp_handle_upload() in wp-admin/includes/file.php
         */
        echo $movefile['error'];
    }
    
    $to = "form@safetyexecutivesny.org";    
    $subject = "[NEW] SENY Membership Application from: " . $firstname;
    $body = "First Name: " . $firstname ."\n";
    $body .= "Last Name: " . $lastname ."\n";
    $body .= "Phone Number: " . $phonenumber ."\n";
    $body .= "Email: " . $email ."\n";
    $body .= "Employer: " . $employer ."\n";
    $body .= "Business Address: " . $businessaddress ."\n";
    $body .= "Business City: " . $businesscity ."\n";
    $body .= "Business State: " . $businessstate ."\n";
    $body .= "Business Zip: " . $businesszip ."\n";
    $body .= "Title: " . $title ."\n";
    $body .= "Time Current Role: " . $timecurrent ."\n";
    $body .= "Time in EHS: " . $timeehs ."\n";
    $body .= "Title of Whom You Report: " . $report ."\n";
    $body .= "Management Scope and Responsibilities: " . $scope ."\n";
    $body .= "Additional Professional Experience: " . $related ."\n";
    $body .= "Form submitted on: " . $date ."\n";
    
    if (wp_mail($to, $subject, $body, $headers, $attachments)) {
        echo json_encode(array('status' => 'success', 'message' => 'Contact message sent.'));
        exit;
    } else {
        throw new Exception('Failed to send email. Check AJAX handler.');
    }

    wp_die();
}
add_action( 'wp_ajax_formSubmitHandler_ajax', 'formSubmitHandler_ajax' );
add_action( 'wp_ajax_nopriv_formSubmitHandler_ajax', 'formSubmitHandler_ajax' );


