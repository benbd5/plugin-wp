<?php
function game_delete()
{
    if (isset($_GET['id'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'video_game';
        $i = $_GET['id'];
        $wpdb->delete(
            $table_name,
            array('id' => $i)
        );
        echo "jeu supprimé";
        wp_redirect(admin_url('admin.php?page=blog_list'), 301);
    }
?>
<?php
}
?>