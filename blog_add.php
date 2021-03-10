<?php

/**
 * Created by Tuan.
 * Date: 23/11/2020
 * Time: 14:41
 */
function game_add()
{
?>
    <form action="" method="post">
        <label for="fname">Nom du jeu:</label><br>
        <input type="text" name="name"><br>
        <label for="lname">prix:</label><br>
        <input type="number" name="price"><br><br>
        <input type="submit" value="ajouter" name="ajouter">
    </form>

    <?php
    if (isset($_POST['ajouter'])) {
        global $wpdb;
        $name = $_POST['name'];
        $price = $_POST['price'];
        $table_name = $wpdb->prefix . 'video_game';
        $wpdb->insert(
            $table_name,
            array(
                'name' => $name,
                'price' => $price
            )
        );
        echo "Ajouté !";
        wp_redirect(admin_url('admin.php?page=game_list'), 301);
        //header("location:http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Employee_Listing");
        //  header("http://google.com");
    ?>
        <!-- <meta http-equiv="refresh"
    content="1; url=http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Employee_Listing" /> -->
<?php
        exit;
    }
}
