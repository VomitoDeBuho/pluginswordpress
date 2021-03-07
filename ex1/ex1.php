<?php
/*
Plugin Name: Ex1
Plugin URI: https://www.smartmirror.cat
Description: Plugin per realitzar les tasques principals
Version: 1.0
Author: Alex Blazquez Ruiz
Author URI: https://www.smartmirror.cat
License: GPLv2
*/
defined('ABSPATH') or die("Bye bye");
define('RUTA',plugin_dir_path(__FILE__));
function menu_principal() {
    add_menu_page('Menú tasques',
        'Menú tasques',
        'manage_options',
        RUTA . 'indexPlugin.php',
        );
}
add_action( 'admin_menu', 'menu_principal');
?>