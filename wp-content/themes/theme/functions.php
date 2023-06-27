<?php
/**
 * theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme
 */

//Includes
include(get_theme_file_path('/templates/includes/pagination.php'));
include (get_template_directory_uri() . '/templates/includes/scripts.php');

if ( ! function_exists( 'theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on theme, use a find and replace
		 * to change 'theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'theme', get_template_directory() . '/languages' );

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
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'theme' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if ( function_exists( 'acf_add_options_page' ) ) {
    // add parent
    $parent = acf_add_options_page( array(
        'page_title' => 'Tùy chỉnh chung',
        'menu_title' => 'Tùy chỉnh chung',
        'redirect'   => false
    ) );
    // add sub page
//    acf_add_options_sub_page( array(
//        'page_title'  => '',
//        'menu_title'  => '',
//        'parent_slug' => $parent['menu_slug'],
//    ) );

}

show_admin_bar(false);

function checkImage($id)
{
    $avatar_hot = get_the_post_thumbnail_url($id, 'full');
    if ($avatar_hot == '') {
        $avatar_hot = get_field('image_no_image', 'option');
    }
    return $avatar_hot;
}

function getIdPage($name){
    // Lấy dữ liệu data
    $pages_data = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'templates/'.$name.'.php'
    ));
    $id_dv = $pages_data[0]->ID;
    return $id_dv;
}

function no_sql_injection($input)
{
    $arr = array("from", "select", "insert", "insert", "delete", "where", "drop", "drop table", "show tables", "*", "=", "update");
    $sql = str_replace($arr, "", $input);
    return trim(strip_tags(addslashes($sql))); #strtolower()
}
function xss($input)
{
    $input = str_replace('=', '', $input);
    $input = str_replace(';', '', $input);
    $input = str_replace(':', '', $input);
    $input = str_replace('[', '', $input);
    $input = str_replace(']', '', $input);
    $input = str_replace('?', '', $input);
    $input = str_replace('AND', '', $input);
    $input = str_replace('OR ', '', $input);
//    $input = str_replace('&', '', $input);
    $input = str_replace('\'', '', $input);
    $input = str_replace('"', '', $input);
    $input = str_replace('`', '', $input);
    $input = str_replace("'", '', $input);
    $input = str_replace('%', '', $input);
    $input = str_replace('<', '', $input);
    $input = str_replace('>', '', $input);
    $input = str_replace('*', '', $input);
    $input = str_replace('+', '', $input);
    $input = str_replace('#', '', $input);
    $input = str_replace(')', '', $input);
    $input = str_replace('(', '', $input);
    $input = str_replace('\\', '', $input);
    $input = str_replace('\/', '', $input);
//    $input = str_replace('-', '', $input);
    $input = str_replace('SHUTDOWN', '', $input);
    $input = str_replace('DROP', '', $input);
    $input = preg_replace("/[`]/", '', $input);
    $input = addslashes($input);
    $input = htmlspecialchars($input);
    $input = strip_tags($input);

    return $input;
}
// Hàm cắt chuỗi
function cutString($string='',$size=100,$link='...')
{
    $string = strip_tags(trim($string));
    $strlen = strlen($string);
    $str = substr($string,$size,20);
    $exp = explode(" ",$str);
    $sum =  count($exp);
    $yes= "";
    for($i=0;$i<$sum;$i++)
    {
        if($yes==""){
            $a = strlen($exp[$i]);
            if($a==0){ $yes="no"; $a=0;}
            if(($a>=1)&&($a<=12)){ $yes = "no"; $a;}
            if($a>12){ $yes = "no"; $a=12;}
        }
    }
    $sub = substr($string,0,$size+$a);
    if($strlen-$size>0){ $sub.= $link;}
    return $sub;
}

// Menu
function checkChild($data, $id){
    foreach ($data as $value){
        if ($value->menu_item_parent == $id){
            return true;
        }
    }
    return false;
}

function menuMobile($data, $parentID=0,$lv=0){
    if($lv == 0){
        $result = "<ul id='menu-main-navigation' class='m-menu'>";
    }else{
        $result = "<ul class='sub-menu'>";
    }

    foreach ($data as $value){
        if ($value->menu_item_parent == $parentID){
            if ($lv == 0){
                $result .= "<li class='menu-item menu-item-type-post_type menu-item-object-page menu-item-home traveltour-normal-menu'>";
                $result .= "<a href='$value->url'>$value->title</a>";
            }else{
                $result .= "<li class='menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children'>";
                $result .= "<a href='$value->url'>$value->title</a>";
            }
            if (checkChild($data, $value->ID)){
                $result .= menu($data, $value->ID, $lv+1);
            }
            $result .= "</li>";
        }
    }
    $result .= "</ul>";
    return $result;
}

function menu($data, $parentID=0,$lv=0){
    if($lv == 0){
        $result = "<ul id='menu-main-navigation-1' class='sf-menu'>";
    }else{
        $result = "<ul class='sub-menu'>";
    }

    foreach ($data as $value){
        if ($value->menu_item_parent == $parentID){
            if ($lv == 0){
                $result .= "<li class='menu-item menu-item-type-post_type menu-item-object-page menu-item-home traveltour-normal-menu'>";
                $result .= "<a href='$value->url'>$value->title</a>";
            }else{
                $result .= "<li class='menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children'>";
                $result .= "<a href='$value->url'>$value->title</a>";
            }
            if (checkChild($data, $value->ID)){
                $result .= menu($data, $value->ID, $lv+1);
            }
            $result .= "</li>";
        }
    }
    $result .= "</ul>";
    return $result;
}

function my_posts_where( $where ) {

    $where = str_replace("meta_key = general_imformation_$", "meta_key LIKE general_imformation_%", $where);

    return $where;
}

add_filter('posts_where', 'my_posts_where');

function load_scripts() {
    wp_enqueue_script('ajax', get_template_directory_uri() . '/includes/js/scripts.js', array('jquery'), NULL, true);

    wp_localize_script('ajax', 'wpAjax', array(
        'ajaxUrl' => admin_url('admin-ajax.php')
    ));
}

add_action('wp_enqueue_scripts', 'load_scripts');

function filter_ajax(){
    $sort_order = xss(no_sql_injection($_POST['sort_order']));
    $tourSearch = xss(no_sql_injection($_POST['tourSearch']));
    $destination = xss(no_sql_injection($_POST['destination']));
    $duration = xss(no_sql_injection($_POST['duration']));

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    if (!empty($destination)){
        $arrTour = array(
            'post_type'=>'dia_diem_du_lich',
            'paged' => $paged,
            'relation'=>'AND',
            'tax_query'=>array(
                array(
                    'taxonomy'=>'location',
                    'field'=>'slug',
                    'terms'=>$destination,
                ),
            ),
            'meta_query'=>array(
                'relation'=>'AND',
                array(
                    'key'=>'general_imformation_name',
                    'value'=>$tourSearch,
                    'compare'=>'LIKE',
                ),
                array(
                    'key'=>'general_imformation_day_vacation',
                    'value'=>$duration,
                    'compare'=>'LIKE',
                )
            ),
            'meta_key'=>'general_imformation_save_price',
            'orderby' => 'meta_value_num',
            'order' => $sort_order
        );
        echo '<script>console.log("tren");</script>';
    }else{
        $arrTour = array(
            'post_type'=>'dia_diem_du_lich',
            'paged' => $paged,
            'meta_query'=>array(
                'relation'=>'AND',
                array(
                    'key'=>'general_imformation_name',
                    'value'=>$tourSearch,
                    'compare'=>'LIKE',
                ),
            ),
            'meta_key'=>'general_imformation_save_price',
            'orderby' => 'meta_value_num',
            'order' => $sort_order
        );
        echo '<script>console.log("duoi");</script>';
    }

    $tour = new WP_Query($arrTour);
    $count = 1;

    $output = "";
    foreach ($tour->posts as $value){
        $field = get_field('general_imformation', $value->ID);
        if(($count % 2) == 1){
            if($field['best_seller'] == 'yes'){
               $output .= '<div class="gdlr-core-item-list  tourmaster-item-pdlr tourmaster-column-30 tourmaster-column-first">';
               $output .= '<div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">';
               $output .= '<div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">';
               $output .= '<div class="tourmaster-tour-thumbnail tourmaster-media-image  gdlr-core-outer-frame-element">';
               $output .= '<a href="<?= $value->guid?>">';
               $output .= '<img src="'. get_the_post_thumbnail_url($value->ID).'" width="700" height="430" srcset="'.get_the_post_thumbnail_url($value->ID).' 400w, '. get_the_post_thumbnail_url($value->ID) .' 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 50vw, 575px" alt=""/>';
               $output .= '</a>';
               $output .= '</div>';
               $output .= '<div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-52">';
               $output .= '<div class="tourmaster-thumbnail-ribbon gdlr-core-outer-frame-element" style="color: #ffffff;background-color: #f97150;">';
               $output .= '<div class="tourmaster-thumbnail-ribbon-cornor" style="border-right-color: rgba(249, 113, 80, 0.5);"></div>';
               $output .= 'Best Seller';
               $output .= '</div>';
               $output .= '<h3 class="tourmaster-tour-title gdlr-core-skin-title">';
               $output .= '<a href="<?= $value->guid?>">';
               $output .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve" style="fill: #f97150">
                                                                                <path d="M397.413,199.303c-2.944-4.576-8-7.296-13.408-7.296h-112v-176c0-7.552-5.28-14.08-12.672-15.648
			c-7.52-1.6-14.88,2.272-17.952,9.152l-128,288c-2.208,4.928-1.728,10.688,1.216,15.2c2.944,4.544,8,7.296,13.408,7.296h112v176
			c0,7.552,5.28,14.08,12.672,15.648c1.12,0.224,2.24,0.352,3.328,0.352c6.208,0,12-3.616,14.624-9.504l128-288
			C400.805,209.543,400.389,203.847,397.413,199.303z"/>
                                                                            </svg>';
               $output .= '<span> '. $value->post_title .' </span>';
               $output .= '</a>';
               $output .= '</h3>';
                                if (empty($field['old_price'])):
                                    $output .= '<div class="tourmaster-tour-price-wrap">';
                                    $output .= '<span class="tourmaster-tour-price">';
                                    $output .= '<span class="tourmaster-head">From</span>';
                                    $output .= '<span class="tourmaster-tail">$ '. $field['save_price'].' </span>';
                                    $output .= '</span>';
                                    $output .= '</div>';
                                else:
                                    $output .= '<div class="tourmaster-tour-price-wrap tourmaster-discount">
                                                                        <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>';
                                                                            $output .= '<span class="tourmaster-tail">$ '. $field['old_price'] .'</span>';
                                                                            $output .= '</span>';
                                        $output .= '<span class="tourmaster-tour-discount-price">$ '.$field['save_price'].'</span>';
                                    $output .= '</div>';
                                endif;
                                $output .= '<div class="tourmaster-tour-info-wrap clearfix">';
                                    $output .= '<div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">';
                                        $output .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 465 465" xml:space="preserve">
                                                                                <path d="M279.591,423.714c-3.836,0.956-7.747,1.805-11.629,2.52c-10.148,1.887-16.857,11.647-14.98,21.804
				c0.927,4.997,3.765,9.159,7.618,11.876c3.971,2.795,9.025,4.057,14.175,3.099c4.623-0.858,9.282-1.867,13.854-3.008
				c10.021-2.494,16.126-12.646,13.626-22.662C299.761,427.318,289.618,421.218,279.591,423.714z"/>
                                            <path d="M417.887,173.047c1.31,3.948,3.811,7.171,6.97,9.398c4.684,3.299,10.813,4.409,16.662,2.475
				c9.806-3.256,15.119-13.83,11.875-23.631c-1.478-4.468-3.118-8.95-4.865-13.314c-3.836-9.59-14.714-14.259-24.309-10.423
				c-9.585,3.834-14.256,14.715-10.417,24.308C415.271,165.528,416.646,169.293,417.887,173.047z"/>
                                            <path d="M340.36,397.013c-3.299,2.178-6.704,4.286-10.134,6.261c-8.949,5.162-12.014,16.601-6.854,25.546
				c1.401,2.433,3.267,4.422,5.416,5.942c5.769,4.059,13.604,4.667,20.127,0.909c4.078-2.352,8.133-4.854,12.062-7.452
				c8.614-5.691,10.985-17.294,5.291-25.912C360.575,393.686,348.977,391.318,340.36,397.013z"/>
                                            <path d="M465.022,225.279c-0.407-10.322-9.101-18.356-19.426-17.953c-10.312,0.407-18.352,9.104-17.947,19.422
				c0.155,3.945,0.195,7.949,0.104,11.89c-0.145,6.473,3.021,12.243,7.941,15.711c2.931,2.064,6.488,3.313,10.345,3.401
				c10.322,0.229,18.876-7.958,19.105-18.285C465.247,234.756,465.208,229.985,465.022,225.279z"/>
                                            <path d="M414.835,347.816c-8.277-6.21-19.987-4.524-26.186,3.738c-2.374,3.164-4.874,6.289-7.434,9.298
				c-6.69,7.86-5.745,19.666,2.115,26.361c0.448,0.38,0.901,0.729,1.371,1.057c7.814,5.509,18.674,4.243,24.992-3.171
				c3.057-3.59,6.037-7.323,8.874-11.102C424.767,365.735,423.089,354.017,414.835,347.816z"/>
                                            <path d="M442.325,280.213c-9.855-3.09-20.35,2.396-23.438,12.251c-1.182,3.765-2.492,7.548-3.906,11.253
				c-3.105,8.156-0.13,17.13,6.69,21.939c1.251,0.879,2.629,1.624,4.126,2.19c9.649,3.682,20.454-1.159,24.132-10.812
				c1.679-4.405,3.237-8.906,4.646-13.382C457.66,293.795,452.178,283.303,442.325,280.213z"/>
                                            <path d="M197.999,426.402c-16.72-3.002-32.759-8.114-47.968-15.244c-0.18-0.094-0.341-0.201-0.53-0.287
				c-3.584-1.687-7.162-3.494-10.63-5.382c-0.012-0.014-0.034-0.023-0.053-0.031c-6.363-3.504-12.573-7.381-18.606-11.628
				C32.24,331.86,11.088,209.872,73.062,121.901c13.476-19.122,29.784-35.075,47.965-47.719c0.224-0.156,0.448-0.311,0.67-0.468
				c64.067-44.144,151.06-47.119,219.089-1.757l-14.611,21.111c-4.062,5.876-1.563,10.158,5.548,9.518l63.467-5.682
				c7.12-0.64,11.378-6.799,9.463-13.675L387.61,21.823c-1.908-6.884-6.793-7.708-10.859-1.833l-14.645,21.161
				C312.182,7.638,252.303-5.141,192.87,5.165c-5.986,1.036-11.888,2.304-17.709,3.78c-0.045,0.008-0.081,0.013-0.117,0.021
				c-0.225,0.055-0.453,0.128-0.672,0.189C123.122,22.316,78.407,52.207,46.5,94.855c-0.269,0.319-0.546,0.631-0.8,0.978
				c-1.061,1.429-2.114,2.891-3.145,4.353c-1.686,2.396-3.348,4.852-4.938,7.308c-0.199,0.296-0.351,0.597-0.525,0.896
				C10.762,149.191-1.938,196.361,0.24,244.383c0.005,0.158-0.004,0.317,0,0.479c0.211,4.691,0.583,9.447,1.088,14.129
				c0.027,0.302,0.094,0.588,0.145,0.89c0.522,4.708,1.177,9.427,1.998,14.145c8.344,48.138,31.052,91.455,65.079,125.16
				c0.079,0.079,0.161,0.165,0.241,0.247c0.028,0.031,0.059,0.047,0.086,0.076c9.142,9.017,19.086,17.357,29.793,24.898
				c28.02,19.744,59.221,32.795,92.729,38.808c10.167,1.827,19.879-4.941,21.703-15.103
				C214.925,437.943,208.163,428.223,197.999,426.402z"/>
                                            <path d="M221.124,83.198c-8.363,0-15.137,6.78-15.137,15.131v150.747l137.87,71.271c2.219,1.149,4.595,1.69,6.933,1.69
				c5.476,0,10.765-2.982,13.454-8.185c3.835-7.426,0.933-16.549-6.493-20.384l-121.507-62.818V98.329
				C236.243,89.978,229.477,83.198,221.124,83.198z"/>
                                                                            </svg>';
                                        if (!empty($field['day_vacation']) && $field['day_vacation']!=0):
                                            $output .= $field['day_vacation'] . 'Day';
                                        endif;
                                        if (!empty($field['night_vacation']) && $field['night_vacation']!=0):
                                            $output .=  $field['night_vacation'] . 'Nights';
                                        endif;
                                        if (!empty($field['hour']) && $field['hour']!=0):
                                            $output .=  $field['hour'] . 'Hours';
                                        endif;
                                    $output .= '</div>';
                                    $output .= '<div class="tourmaster-tour-info tourmaster-tour-info-availability ">';
                                        $output .= '<i class="fa fa-calendar"></i>';
                                        $infoTour = get_field('information_tour', $value->ID);
                                        if(!empty($infoTour['tour_start']) && !empty($infoTour['tour_end'])){
                                            $dateStart = date_create($infoTour['tour_start']);
                                            $dateEnd = date_create($infoTour['tour_end']);
                                            $start = date_format($dateStart, "M d");
                                            $end = date_format($dateEnd, "M d");
                                        }
                                        $output .= 'Availability :';
                                        if(!empty($start)){
                                            $output .=  $start;
                                        }else{
                                            $output .=  get_the_date();
                                        }
                                        $output .= '’ -';
                                        if(!empty($end)){
                                            $output .= $end;
                                        }else{
                                            $output .= get_the_date();
                                        }$output .= '’';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '<div class="tourmaster-tour-content">Donec id elit non mi porta gravida at eget metus. Nulla vitae elit libero, [&hellip;]</div>';
                $output .= '<div class="tourmaster-tour-rating">';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<span class="tourmaster-tour-rating-text"></span>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
            }
            else{
                $output .= '<div class="gdlr-core-item-list  tourmaster-item-pdlr tourmaster-column-30 tourmaster-column-first">';
                $output .= '<div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">';
                $output .= '<div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">';
                $output .= '<div class="tourmaster-tour-thumbnail tourmaster-media-image  gdlr-core-outer-frame-element">';
                $output .= '<a href="'. $value->guid .'">';
                $output .= '<img src="'. get_the_post_thumbnail_url($value->ID).'" width="700" height="430" srcset="'. get_the_post_thumbnail_url($value->ID).' 400w, '. get_the_post_thumbnail_url($value->ID).' 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 50vw, 575px" alt=""/>';
                $output .= '</a>';
                $output .= '</div>';
                $output .= '<div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-52">';
                $output .= '<h3 class="tourmaster-tour-title gdlr-core-skin-title">';
                $output .= '<a href="'. $value->guid.'">'.$value->post_title .'</a>';
                $output .= '</h3>';
                                if (empty($field['old_price'])):
                                    $output .= '<div class="tourmaster-tour-price-wrap">';
                                    $output .= '<span class="tourmaster-tour-price">';
                                    $output .= '<span class="tourmaster-head">From</span>';
                                    $output .= '<span class="tourmaster-tail">$ '.$field['save_price'].'</span>';
                                    $output .= '</span>';
                                    $output .= '</div>';
                                else:
                                    $output .= '<div class="tourmaster-tour-price-wrap tourmaster-discount">';
                                    $output .= '<span class="tourmaster-tour-price">';
                                    $output .= '<span class="tourmaster-head">From</span>';
                                    $output .= '<span class="tourmaster-tail">$ '.$field['old_price'].'</span>';
                                    $output .= '</span>';
                                    $output .= '<span class="tourmaster-tour-discount-price">$ '.$field['save_price'].'</span>';
                                    $output .= '</div>';
                                endif;
                $output .= '<div class="tourmaster-tour-info-wrap clearfix">';
                $output .= '<div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">';
                $output .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 465 465" xml:space="preserve">
                                                                                <path d="M279.591,423.714c-3.836,0.956-7.747,1.805-11.629,2.52c-10.148,1.887-16.857,11.647-14.98,21.804
				c0.927,4.997,3.765,9.159,7.618,11.876c3.971,2.795,9.025,4.057,14.175,3.099c4.623-0.858,9.282-1.867,13.854-3.008
				c10.021-2.494,16.126-12.646,13.626-22.662C299.761,427.318,289.618,421.218,279.591,423.714z"/>
                                            <path d="M417.887,173.047c1.31,3.948,3.811,7.171,6.97,9.398c4.684,3.299,10.813,4.409,16.662,2.475
				c9.806-3.256,15.119-13.83,11.875-23.631c-1.478-4.468-3.118-8.95-4.865-13.314c-3.836-9.59-14.714-14.259-24.309-10.423
				c-9.585,3.834-14.256,14.715-10.417,24.308C415.271,165.528,416.646,169.293,417.887,173.047z"/>
                                            <path d="M340.36,397.013c-3.299,2.178-6.704,4.286-10.134,6.261c-8.949,5.162-12.014,16.601-6.854,25.546
				c1.401,2.433,3.267,4.422,5.416,5.942c5.769,4.059,13.604,4.667,20.127,0.909c4.078-2.352,8.133-4.854,12.062-7.452
				c8.614-5.691,10.985-17.294,5.291-25.912C360.575,393.686,348.977,391.318,340.36,397.013z"/>
                                            <path d="M465.022,225.279c-0.407-10.322-9.101-18.356-19.426-17.953c-10.312,0.407-18.352,9.104-17.947,19.422
				c0.155,3.945,0.195,7.949,0.104,11.89c-0.145,6.473,3.021,12.243,7.941,15.711c2.931,2.064,6.488,3.313,10.345,3.401
				c10.322,0.229,18.876-7.958,19.105-18.285C465.247,234.756,465.208,229.985,465.022,225.279z"/>
                                            <path d="M414.835,347.816c-8.277-6.21-19.987-4.524-26.186,3.738c-2.374,3.164-4.874,6.289-7.434,9.298
				c-6.69,7.86-5.745,19.666,2.115,26.361c0.448,0.38,0.901,0.729,1.371,1.057c7.814,5.509,18.674,4.243,24.992-3.171
				c3.057-3.59,6.037-7.323,8.874-11.102C424.767,365.735,423.089,354.017,414.835,347.816z"/>
                                            <path d="M442.325,280.213c-9.855-3.09-20.35,2.396-23.438,12.251c-1.182,3.765-2.492,7.548-3.906,11.253
				c-3.105,8.156-0.13,17.13,6.69,21.939c1.251,0.879,2.629,1.624,4.126,2.19c9.649,3.682,20.454-1.159,24.132-10.812
				c1.679-4.405,3.237-8.906,4.646-13.382C457.66,293.795,452.178,283.303,442.325,280.213z"/>
                                            <path d="M197.999,426.402c-16.72-3.002-32.759-8.114-47.968-15.244c-0.18-0.094-0.341-0.201-0.53-0.287
				c-3.584-1.687-7.162-3.494-10.63-5.382c-0.012-0.014-0.034-0.023-0.053-0.031c-6.363-3.504-12.573-7.381-18.606-11.628
				C32.24,331.86,11.088,209.872,73.062,121.901c13.476-19.122,29.784-35.075,47.965-47.719c0.224-0.156,0.448-0.311,0.67-0.468
				c64.067-44.144,151.06-47.119,219.089-1.757l-14.611,21.111c-4.062,5.876-1.563,10.158,5.548,9.518l63.467-5.682
				c7.12-0.64,11.378-6.799,9.463-13.675L387.61,21.823c-1.908-6.884-6.793-7.708-10.859-1.833l-14.645,21.161
				C312.182,7.638,252.303-5.141,192.87,5.165c-5.986,1.036-11.888,2.304-17.709,3.78c-0.045,0.008-0.081,0.013-0.117,0.021
				c-0.225,0.055-0.453,0.128-0.672,0.189C123.122,22.316,78.407,52.207,46.5,94.855c-0.269,0.319-0.546,0.631-0.8,0.978
				c-1.061,1.429-2.114,2.891-3.145,4.353c-1.686,2.396-3.348,4.852-4.938,7.308c-0.199,0.296-0.351,0.597-0.525,0.896
				C10.762,149.191-1.938,196.361,0.24,244.383c0.005,0.158-0.004,0.317,0,0.479c0.211,4.691,0.583,9.447,1.088,14.129
				c0.027,0.302,0.094,0.588,0.145,0.89c0.522,4.708,1.177,9.427,1.998,14.145c8.344,48.138,31.052,91.455,65.079,125.16
				c0.079,0.079,0.161,0.165,0.241,0.247c0.028,0.031,0.059,0.047,0.086,0.076c9.142,9.017,19.086,17.357,29.793,24.898
				c28.02,19.744,59.221,32.795,92.729,38.808c10.167,1.827,19.879-4.941,21.703-15.103
				C214.925,437.943,208.163,428.223,197.999,426.402z"/>
                                            <path d="M221.124,83.198c-8.363,0-15.137,6.78-15.137,15.131v150.747l137.87,71.271c2.219,1.149,4.595,1.69,6.933,1.69
				c5.476,0,10.765-2.982,13.454-8.185c3.835-7.426,0.933-16.549-6.493-20.384l-121.507-62.818V98.329
				C236.243,89.978,229.477,83.198,221.124,83.198z"/>
                                                                            </svg>';
                                        if (!empty($field['day_vacation'])):
                                            $output .=  $field['day_vacation'] .' Days';
                                        endif;
                                        if (!empty($field['night_vacation'])):
                                            $output .= $field['night_vacation'] .'Nights';
                                        endif;
                                        if (!empty($field['hour'])):
                                            $output .= $field['hour'] .' Hours';
                                        endif;
                $output .= '</div>';
                $output .= '<div class="tourmaster-tour-info tourmaster-tour-info-availability ">';
                $output .= '<i class="fa fa-calendar"></i>';
                                        $infoTour = get_field('information_tour', $value->ID);
                                        if(!empty($infoTour['tour_start']) && !empty($infoTour['tour_end'])){
                                            $dateStart = date_create($infoTour['tour_start']);
                                            $dateEnd = date_create($infoTour['tour_end']);
                                            $start = date_format($dateStart, "M d");
                                            $end = date_format($dateEnd, "M d");
                                        }
                $output .= 'Availability :';
                                        if(!empty($start)){
                                            $output .= $start;
                                        }else{
                                            $output .= get_the_date();
                                        }
                                        $output .= '’ -';
                                        if(!empty($end)){
                                            $output .= $end;
                                        }else{
                                            $output .= get_the_date();
                                        }
                                        $output .='’';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '<div class="tourmaster-tour-content">Donec id elit non mi porta gravida at eget metus. Nulla vitae elit libero, [&hellip;]</div>';
                $output .= '<div class="tourmaster-tour-rating">';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<span class="tourmaster-tour-rating-text"></span>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
            }
        }else{
            if ($field['best_seller'] == 'yes'){
                $output .= '<div class="gdlr-core-item-list  tourmaster-item-pdlr tourmaster-column-30">';
                $output .= '<div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">';
                $output .= '<div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">';
                $output .= '<div class="tourmaster-tour-thumbnail tourmaster-media-image  gdlr-core-outer-frame-element">';
                $output .= '<a class="gdlr-core-lightgallery gdlr-core-js " href="https://www.youtube.com/watch?v=eZjmjT5SLYs">';
                $output .= '<div class="tourmaster-tour-thumbnail-overlay">';
                $output .= '<i class="fa fa-film"></i>';
                $output .= '</div>';
                $output .= '<img src="'.get_the_post_thumbnail_url($value->ID) .'" width="700" height="430" srcset="'.get_the_post_thumbnail_url($value->ID).' 400w, '. get_the_post_thumbnail_url($value->ID).'" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 50vw, 575px" alt=""/>';
                $output .= '</a>';
                $output .= '</div>';
                $output .= '<div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-52">';
                $output .= '<div class="tourmaster-thumbnail-ribbon gdlr-core-outer-frame-element" style="color: #ffffff;background-color: #e85e34;">';
                $output .= '<div class="tourmaster-thumbnail-ribbon-cornor" style="border-right-color: rgba(232, 94, 52, 0.5);"></div>';
                $output .= 'Best Seller';
                $output .= '</div>';
                $output .= '<h3 class="tourmaster-tour-title gdlr-core-skin-title">';
                $output .= '<a href="'.$value->guid.'">';
                                        $output .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve" style="fill: #e85e34">
                                                                                <path d="M397.413,199.303c-2.944-4.576-8-7.296-13.408-7.296h-112v-176c0-7.552-5.28-14.08-12.672-15.648
			c-7.52-1.6-14.88,2.272-17.952,9.152l-128,288c-2.208,4.928-1.728,10.688,1.216,15.2c2.944,4.544,8,7.296,13.408,7.296h112v176
			c0,7.552,5.28,14.08,12.672,15.648c1.12,0.224,2.24,0.352,3.328,0.352c6.208,0,12-3.616,14.624-9.504l128-288
			C400.805,209.543,400.389,203.847,397.413,199.303z"/>
                                                                            </svg>';
                                        $output .= '<span>'.$value->post_title.'</span>';
                                    $output .= '</a>';
                                $output .= '</h3>';
                                if (empty($field['old_price'])):
                                    $output .= '<div class="tourmaster-tour-price-wrap">';
                                    $output .= '<span class="tourmaster-tour-price">';
                                    $output .= '<span class="tourmaster-head">From</span>';
                                    $output .= '<span class="tourmaster-tail">$ '.$field['save_price'].'</span>';
                                    $output .= '</span>';
                                    $output .= '</div>';
                                else:
                                    $output .= '<div class="tourmaster-tour-price-wrap tourmaster-discount">';
                                    $output .= '<span class="tourmaster-tour-price">';
                                    $output .= '<span class="tourmaster-head">From</span>';
                                    $output .= '<span class="tourmaster-tail">$ '.$field['old_price'].'</span>';
                                    $output .= '</span>';
                                    $output .= '<span class="tourmaster-tour-discount-price">$ '.$field['save_price'].'</span>';
                                    $output .= '</div>';
                                endif;
                                $output .= '<div class="tourmaster-tour-info-wrap clearfix">';
                                    $output .= '<div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">';
                                        $output .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 465 465" xml:space="preserve">
                                                                                <path d="M279.591,423.714c-3.836,0.956-7.747,1.805-11.629,2.52c-10.148,1.887-16.857,11.647-14.98,21.804
				c0.927,4.997,3.765,9.159,7.618,11.876c3.971,2.795,9.025,4.057,14.175,3.099c4.623-0.858,9.282-1.867,13.854-3.008
				c10.021-2.494,16.126-12.646,13.626-22.662C299.761,427.318,289.618,421.218,279.591,423.714z"/>
                                            <path d="M417.887,173.047c1.31,3.948,3.811,7.171,6.97,9.398c4.684,3.299,10.813,4.409,16.662,2.475
				c9.806-3.256,15.119-13.83,11.875-23.631c-1.478-4.468-3.118-8.95-4.865-13.314c-3.836-9.59-14.714-14.259-24.309-10.423
				c-9.585,3.834-14.256,14.715-10.417,24.308C415.271,165.528,416.646,169.293,417.887,173.047z"/>
                                            <path d="M340.36,397.013c-3.299,2.178-6.704,4.286-10.134,6.261c-8.949,5.162-12.014,16.601-6.854,25.546
				c1.401,2.433,3.267,4.422,5.416,5.942c5.769,4.059,13.604,4.667,20.127,0.909c4.078-2.352,8.133-4.854,12.062-7.452
				c8.614-5.691,10.985-17.294,5.291-25.912C360.575,393.686,348.977,391.318,340.36,397.013z"/>
                                            <path d="M465.022,225.279c-0.407-10.322-9.101-18.356-19.426-17.953c-10.312,0.407-18.352,9.104-17.947,19.422
				c0.155,3.945,0.195,7.949,0.104,11.89c-0.145,6.473,3.021,12.243,7.941,15.711c2.931,2.064,6.488,3.313,10.345,3.401
				c10.322,0.229,18.876-7.958,19.105-18.285C465.247,234.756,465.208,229.985,465.022,225.279z"/>
                                            <path d="M414.835,347.816c-8.277-6.21-19.987-4.524-26.186,3.738c-2.374,3.164-4.874,6.289-7.434,9.298
				c-6.69,7.86-5.745,19.666,2.115,26.361c0.448,0.38,0.901,0.729,1.371,1.057c7.814,5.509,18.674,4.243,24.992-3.171
				c3.057-3.59,6.037-7.323,8.874-11.102C424.767,365.735,423.089,354.017,414.835,347.816z"/>
                                            <path d="M442.325,280.213c-9.855-3.09-20.35,2.396-23.438,12.251c-1.182,3.765-2.492,7.548-3.906,11.253
				c-3.105,8.156-0.13,17.13,6.69,21.939c1.251,0.879,2.629,1.624,4.126,2.19c9.649,3.682,20.454-1.159,24.132-10.812
				c1.679-4.405,3.237-8.906,4.646-13.382C457.66,293.795,452.178,283.303,442.325,280.213z"/>
                                            <path d="M197.999,426.402c-16.72-3.002-32.759-8.114-47.968-15.244c-0.18-0.094-0.341-0.201-0.53-0.287
				c-3.584-1.687-7.162-3.494-10.63-5.382c-0.012-0.014-0.034-0.023-0.053-0.031c-6.363-3.504-12.573-7.381-18.606-11.628
				C32.24,331.86,11.088,209.872,73.062,121.901c13.476-19.122,29.784-35.075,47.965-47.719c0.224-0.156,0.448-0.311,0.67-0.468
				c64.067-44.144,151.06-47.119,219.089-1.757l-14.611,21.111c-4.062,5.876-1.563,10.158,5.548,9.518l63.467-5.682
				c7.12-0.64,11.378-6.799,9.463-13.675L387.61,21.823c-1.908-6.884-6.793-7.708-10.859-1.833l-14.645,21.161
				C312.182,7.638,252.303-5.141,192.87,5.165c-5.986,1.036-11.888,2.304-17.709,3.78c-0.045,0.008-0.081,0.013-0.117,0.021
				c-0.225,0.055-0.453,0.128-0.672,0.189C123.122,22.316,78.407,52.207,46.5,94.855c-0.269,0.319-0.546,0.631-0.8,0.978
				c-1.061,1.429-2.114,2.891-3.145,4.353c-1.686,2.396-3.348,4.852-4.938,7.308c-0.199,0.296-0.351,0.597-0.525,0.896
				C10.762,149.191-1.938,196.361,0.24,244.383c0.005,0.158-0.004,0.317,0,0.479c0.211,4.691,0.583,9.447,1.088,14.129
				c0.027,0.302,0.094,0.588,0.145,0.89c0.522,4.708,1.177,9.427,1.998,14.145c8.344,48.138,31.052,91.455,65.079,125.16
				c0.079,0.079,0.161,0.165,0.241,0.247c0.028,0.031,0.059,0.047,0.086,0.076c9.142,9.017,19.086,17.357,29.793,24.898
				c28.02,19.744,59.221,32.795,92.729,38.808c10.167,1.827,19.879-4.941,21.703-15.103
				C214.925,437.943,208.163,428.223,197.999,426.402z"/>
                                            <path d="M221.124,83.198c-8.363,0-15.137,6.78-15.137,15.131v150.747l137.87,71.271c2.219,1.149,4.595,1.69,6.933,1.69
				c5.476,0,10.765-2.982,13.454-8.185c3.835-7.426,0.933-16.549-6.493-20.384l-121.507-62.818V98.329
				C236.243,89.978,229.477,83.198,221.124,83.198z"/>
                                                                            </svg>';
                                        if (!empty($field['day_vacation'])):
                                            $output .= $field['day_vacation'] .' Days';
                                        endif;
                                        if (!empty($field['night_vacation'])):
                                            $output .= $field['night_vacation'] .' Nights';
                                        endif;
                                        if (!empty($field['hour'])):
                                            $output .= $field['hour'].' Hours';
                                        endif;
                                    $output .= '</div>';
                                    $output .= '<div class="tourmaster-tour-info tourmaster-tour-info-availability ">';
                                        $output .= '<i class="fa fa-calendar"></i>';
                                        $infoTour = get_field('information_tour', $value->ID);
                                        if(!empty($infoTour['tour_start']) && !empty($infoTour['tour_end'])){
                                            $dateStart = date_create($infoTour['tour_start']);
                                            $dateEnd = date_create($infoTour['tour_end']);
                                            $start = date_format($dateStart, "M d");
                                            $end = date_format($dateEnd, "M d");
                                        }
                                        $output .= 'Availability :';
                                        if(!empty($start)){
                                            $output .= $start;
                                        }else{
                                            $output .= get_the_date();
                                        } $output .= '’ - ';
                                        if(!empty($end)){
                                            $output .= $end;
                                        }else{
                                            $output .= get_the_date();
                                        } $output .= '’';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="tourmaster-tour-content">Donec id elit non mi porta gravida at eget metus. Nulla vitae elit libero, [&hellip;]</div>';
            $output .= '<div class="tourmaster-tour-rating">';
            $output .= '<i class="fa fa-star"></i>';
            $output .= '<i class="fa fa-star"></i>';
            $output .= '<i class="fa fa-star"></i>';
            $output .= '<i class="fa fa-star"></i>';
            $output .= '<i class="fa fa-star"></i>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            }
            else{
                $output .= '<div class="gdlr-core-item-list  tourmaster-item-pdlr tourmaster-column-30">';
                $output .= '<div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">';
                $output .= '<div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">';
                $output .= '<div class="tourmaster-tour-thumbnail tourmaster-media-image  gdlr-core-outer-frame-element">';
                $output .= '<a href="'.$value->guid.'">';
                $output .= '<img src="'.get_the_post_thumbnail_url($value->ID).'" width="700" height="430" srcset="'.get_the_post_thumbnail_url($value->ID).' 400w, '. get_the_post_thumbnail_url($value->ID).' 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 50vw, 575px" alt=""/>';
                $output .= '</a>';
                $output .= '</div>';
                $output .= '<div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-52">';
                $output .= '<h3 class="tourmaster-tour-title gdlr-core-skin-title">';
                $output .= '<a href="'.$value->guid.'">'.$value->post_title.'</a>';
                $output .= '</h3>';
                                if (empty($field['old_price'])):
                                    $output .= '<div class="tourmaster-tour-price-wrap">';
                                    $output .= '<span class="tourmaster-tour-price">';
                                    $output .= '<span class="tourmaster-head">From</span>';
                                    $output .= '<span class="tourmaster-tail">$'.$field['save_price'].'</span>';
                                    $output .= '</span>';
                                    $output .= '</div>';
                                else:
                                    $output .= '<div class="tourmaster-tour-price-wrap tourmaster-discount">';
                                    $output .= '<span class="tourmaster-tour-price">';
                                    $output .= '<span class="tourmaster-head">From</span>';
                                    $output .= '<span class="tourmaster-tail">$ '.$field['old_price'].'</span>';
                                    $output .= '</span>';
                                    $output .= '<span class="tourmaster-tour-discount-price">$ '.$field['save_price'].'</span>';
                                    $output .= '</div>';
                                endif;
                $output .= '<div class="tourmaster-tour-info-wrap clearfix">';
                $output .= '<div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">';
                $output .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 465 465" xml:space="preserve">
                                                                                <path d="M279.591,423.714c-3.836,0.956-7.747,1.805-11.629,2.52c-10.148,1.887-16.857,11.647-14.98,21.804
				c0.927,4.997,3.765,9.159,7.618,11.876c3.971,2.795,9.025,4.057,14.175,3.099c4.623-0.858,9.282-1.867,13.854-3.008
				c10.021-2.494,16.126-12.646,13.626-22.662C299.761,427.318,289.618,421.218,279.591,423.714z"/>
                                            <path d="M417.887,173.047c1.31,3.948,3.811,7.171,6.97,9.398c4.684,3.299,10.813,4.409,16.662,2.475
				c9.806-3.256,15.119-13.83,11.875-23.631c-1.478-4.468-3.118-8.95-4.865-13.314c-3.836-9.59-14.714-14.259-24.309-10.423
				c-9.585,3.834-14.256,14.715-10.417,24.308C415.271,165.528,416.646,169.293,417.887,173.047z"/>
                                            <path d="M340.36,397.013c-3.299,2.178-6.704,4.286-10.134,6.261c-8.949,5.162-12.014,16.601-6.854,25.546
				c1.401,2.433,3.267,4.422,5.416,5.942c5.769,4.059,13.604,4.667,20.127,0.909c4.078-2.352,8.133-4.854,12.062-7.452
				c8.614-5.691,10.985-17.294,5.291-25.912C360.575,393.686,348.977,391.318,340.36,397.013z"/>
                                            <path d="M465.022,225.279c-0.407-10.322-9.101-18.356-19.426-17.953c-10.312,0.407-18.352,9.104-17.947,19.422
				c0.155,3.945,0.195,7.949,0.104,11.89c-0.145,6.473,3.021,12.243,7.941,15.711c2.931,2.064,6.488,3.313,10.345,3.401
				c10.322,0.229,18.876-7.958,19.105-18.285C465.247,234.756,465.208,229.985,465.022,225.279z"/>
                                            <path d="M414.835,347.816c-8.277-6.21-19.987-4.524-26.186,3.738c-2.374,3.164-4.874,6.289-7.434,9.298
				c-6.69,7.86-5.745,19.666,2.115,26.361c0.448,0.38,0.901,0.729,1.371,1.057c7.814,5.509,18.674,4.243,24.992-3.171
				c3.057-3.59,6.037-7.323,8.874-11.102C424.767,365.735,423.089,354.017,414.835,347.816z"/>
                                            <path d="M442.325,280.213c-9.855-3.09-20.35,2.396-23.438,12.251c-1.182,3.765-2.492,7.548-3.906,11.253
				c-3.105,8.156-0.13,17.13,6.69,21.939c1.251,0.879,2.629,1.624,4.126,2.19c9.649,3.682,20.454-1.159,24.132-10.812
				c1.679-4.405,3.237-8.906,4.646-13.382C457.66,293.795,452.178,283.303,442.325,280.213z"/>
                                            <path d="M197.999,426.402c-16.72-3.002-32.759-8.114-47.968-15.244c-0.18-0.094-0.341-0.201-0.53-0.287
				c-3.584-1.687-7.162-3.494-10.63-5.382c-0.012-0.014-0.034-0.023-0.053-0.031c-6.363-3.504-12.573-7.381-18.606-11.628
				C32.24,331.86,11.088,209.872,73.062,121.901c13.476-19.122,29.784-35.075,47.965-47.719c0.224-0.156,0.448-0.311,0.67-0.468
				c64.067-44.144,151.06-47.119,219.089-1.757l-14.611,21.111c-4.062,5.876-1.563,10.158,5.548,9.518l63.467-5.682
				c7.12-0.64,11.378-6.799,9.463-13.675L387.61,21.823c-1.908-6.884-6.793-7.708-10.859-1.833l-14.645,21.161
				C312.182,7.638,252.303-5.141,192.87,5.165c-5.986,1.036-11.888,2.304-17.709,3.78c-0.045,0.008-0.081,0.013-0.117,0.021
				c-0.225,0.055-0.453,0.128-0.672,0.189C123.122,22.316,78.407,52.207,46.5,94.855c-0.269,0.319-0.546,0.631-0.8,0.978
				c-1.061,1.429-2.114,2.891-3.145,4.353c-1.686,2.396-3.348,4.852-4.938,7.308c-0.199,0.296-0.351,0.597-0.525,0.896
				C10.762,149.191-1.938,196.361,0.24,244.383c0.005,0.158-0.004,0.317,0,0.479c0.211,4.691,0.583,9.447,1.088,14.129
				c0.027,0.302,0.094,0.588,0.145,0.89c0.522,4.708,1.177,9.427,1.998,14.145c8.344,48.138,31.052,91.455,65.079,125.16
				c0.079,0.079,0.161,0.165,0.241,0.247c0.028,0.031,0.059,0.047,0.086,0.076c9.142,9.017,19.086,17.357,29.793,24.898
				c28.02,19.744,59.221,32.795,92.729,38.808c10.167,1.827,19.879-4.941,21.703-15.103
				C214.925,437.943,208.163,428.223,197.999,426.402z"/>
                                            <path d="M221.124,83.198c-8.363,0-15.137,6.78-15.137,15.131v150.747l137.87,71.271c2.219,1.149,4.595,1.69,6.933,1.69
				c5.476,0,10.765-2.982,13.454-8.185c3.835-7.426,0.933-16.549-6.493-20.384l-121.507-62.818V98.329
				C236.243,89.978,229.477,83.198,221.124,83.198z"/>
                                                                            </svg>';
                                        if (!empty($field['day_vacation'])):
                                            $output .= $field['day_vacation'].' Days';
                                        endif;
                                        if (!empty($field['night_vacation'])):
                                            $output .= $field['night_vacation'].' Nights';
                                        endif;
                                        if (!empty($field['hour'])):
                                            $output .= $field['hour'].' Hours';
                                        endif;
                $output .= '</div>';
                $output .= '<div class="tourmaster-tour-info tourmaster-tour-info-availability ">';
                $output .= '<i class="fa fa-calendar"></i>';
                                        $infoTour = get_field('information_tour', $value->ID);
                                        if(!empty($infoTour['tour_start']) && !empty($infoTour['tour_end'])){
                                            $dateStart = date_create($infoTour['tour_start']);
                                            $dateEnd = date_create($infoTour['tour_end']);
                                            $start = date_format($dateStart, "M d");
                                            $end = date_format($dateEnd, "M d");
                                        }
                $output .= 'Availability : ';
                                         if(!empty($start)){
                                             $output .= $start;
                                         }else{
                                             $output .= get_the_date();
                                         }
                                         $output .= '’ -';
                                         if(!empty($end)){
                                             $output .= $end;
                                         }else{
                                             $output .= get_the_date();
                                         }
                                         $output .= '’';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '<div class="tourmaster-tour-content">Donec id elit non mi porta gravida at eget metus. Nulla vitae elit libero, [&hellip;]</div>';
                $output .= '<div class="tourmaster-tour-rating">';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<i class="fa fa-star"></i>';
                $output .= '<span class="tourmaster-tour-rating-text"></span>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
            }
        }
        $count ++;
    }

    echo $output;

    wp_reset_postdata();
    die();

}
add_action('wp_ajax_ajax_example_request', 'filter_ajax');
add_action('wp_ajax_nopriv_ajax_example_request', 'filter_ajax');