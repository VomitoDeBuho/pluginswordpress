<?php
/*
Plugin Name: Ex2
Plugin URI: https://www.smartmirror.cat
Description: Plugin per saber les hores destinades al projecte
Version: 1.0
Author: Alex Blazquez Ruiz
Author URI: https://www.smartmirror.cat
License: GPLv2
*/
defined('ABSPATH') or die("Bye bye");
define('RUTA2',plugin_dir_path(__FILE__));
function menu_principal2() {
    add_menu_page('Temps total',
        'Temps total',
        'manage_options',
        RUTA2 . 'indexPlugin2.php'
        );
}
add_action( 'admin_menu', 'menu_principal2');


?>