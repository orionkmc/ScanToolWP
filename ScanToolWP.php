<?php
/**
 * @package ScanToolWP
 * @version 0.1
 */
/*
Plugin Name: ScanToolWP
Plugin URI: 
Description: Panel que muestra la informacion tecnica de un sitio web creado con wordpress.
Author: Kuai-mare orion
Version: 0.1
Author URI: 
*/

// Define Constantes
define('SCANTOWP_DIR', plugin_dir_path( __FILE__ ) );

// Encola estilos y librerias
function sunset_load_admin_scripts(){ 
  wp_enqueue_style( 'wpb-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
  wp_enqueue_style( 'wpb-bootstrap', plugin_dir_url(__FILE__).'/assets/css/styles.css' );
}

// inicializo menus
function menu_scan_too_wp()
{
   add_menu_page(
      'ScanToolWP',
      'ScanToolWP',
      'manage_options',
      'scantoolwp-dashboard',
    );

    add_submenu_page(
      'scantoolwp-dashboard',
      'ScanToolWP - Dashboard',
      'Dashboard',
      'manage_options',
      'scantoolwp-dashboard',
      'display_dashboard_page'
    );

   add_submenu_page(
    'scantoolwp-dashboard',
    'ScanToolWP - About',
    'About',
    'manage_options',
    'scantoolwp-about',
    'display_about_page'
  );
}

// Funcion para el menu Dashboard
function display_dashboard_page() {
  global $wpdb;

  $tema_actual = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}options WHERE option_id = 40", OBJECT );
  $plugins = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}options WHERE option_id = 33", OBJECT );
  $all_post = $wpdb->get_results( "SELECT COUNT(id) as count_post FROM {$wpdb->prefix}posts WHERE post_type = 'post' and post_status='publish' ", OBJECT );
  $all_page = $wpdb->get_results( "SELECT COUNT(id) as count_page FROM {$wpdb->prefix}posts WHERE post_type = 'page' and post_status='publish'", OBJECT );
  require_once SCANTOWP_DIR.'templates/dashboard.php';
}

// Funcion para el menu About
function display_about_page() {
  require_once SCANTOWP_DIR.'templates/about.php';
}

// Ganchos
add_action( 'admin_enqueue_scripts', 'sunset_load_admin_scripts' );
add_action('admin_menu', 'menu_scan_too_wp');