<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/28/2023
 * Time: 4:03 PM
 *
 * Plugin Name: Quản lý đặt Tour
 * Plugin URI: https://wecan-group.com/
 * Description: Quản lý dặt Tour
 * Version: 1.0
 * Author URI: https://wecan-group.com/
 */

define('PATH', plugin_dir_path(__FILE__));
define('URI', plugin_dir_url(__FILE__));

add_action('admin_menu', 'register_tours_menu');

function register_tours_menu(){
    add_menu_page('Quản lý đặt tour', 'Quản lý đặt tour', 'manage_options', 'nguoi_dat_tour', 'nguoidattour', 'dashicons-star-filled', 40);
}

function nguoidattour(){
    include plugin_dir_path( __FILE__ ) . '/nguoi-dat-tour/nguoi-dat-tour.php';
}

include_once PATH . 'includes/includes.php';