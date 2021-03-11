<?php

/**
 * Plugin Name: Jeux
 */

global $jal_db_version;
$jal_db_version = '1.0';
function jal_install()
{
    // step 1
    global $wpdb;
    global $jal_db_version;
    $table_name = $wpdb->prefix . "video_game";
    $charset_collate = $wpdb->get_charset_collate();
    // step 2
    $sql = "CREATE TABLE $table_name (
      id mediumint(9) PRIMARY KEY NOT NULL AUTO_INCREMENT,
      time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      name tinytext NOT NULL,
      price int NOT NULL
    --   PRIMARY KEY  (id)
    ) $charset_collate;";
    //step 3
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    add_option('jal_db_version', $jal_db_version);
}

register_activation_hook(__FILE__, 'jal_install');

//add menu_admin
add_action('admin_menu', 'my_menu');
function my_menu()
{
    add_menu_page(
        'liste des jeux', //<title>
        'Liste des jeux', //titre du menu
        'manage_options', //capabilities - https://wordpress.org/support/article/roles-and-capabilities/#manage_options
        'game_list', //slug et url
        'game_list' //$function
    );
    add_submenu_page(
        'game_list', //parent page slug
        'ajouter un jeu', //<title>
        'Ajouter un jeu', //titre du menu
        'manage_options', //capabilities - https://wordpress.org/support/article/roles-and-capabilities/#manage_options
        'game_add', //slug et url
        'game_add' //$function
    );
    add_submenu_page(
        null, //parent page slug
        'modifier un jeu', //<title>
        'Modifier un jeu', //titre du menu
        'manage_options', //capabilities - https://wordpress.org/support/article/roles-and-capabilities/#manage_options
        'game_update', //slug et url
        'game_update' //$function
    );
};

//function 
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'blog_list.php');
require_once(ROOTDIR . 'blog_add.php');
require_once(ROOTDIR . 'blog_update.php');
