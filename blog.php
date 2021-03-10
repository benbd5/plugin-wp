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
};
