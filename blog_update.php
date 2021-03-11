<?php
function game_update()
{
    $i = $_GET['id'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'video_game';
    $games = $wpdb->get_results("SELECT id,name,price from $table_name where id=$i");
    echo $games[0]->id;
?>
    <form action="" method="post">
        <!-- <input type="hidden" name="id" value="<?= $games[0]->id; ?>"> -->
        <label for=" fname">Nom du jeu:</label><br>
        <input type="text" name="name" value="<?= $games[0]->name; ?>"><br>
        <label for=" lname">prix:</label><br>
        <input type="number" name="price" value="<?= $games[0]->price; ?>"><br><br>
        <input type="submit" value="mettre à jour" name="update">
    </form>
<?php
    if (isset($_POST['update'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'video_game';
        // $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $wpdb->update(
            $table_name,
            array(
                'name' => $name,
                'price' => $price,
            ),
            array(
                'id' => $i
            )
        );
        wp_redirect(admin_url('admin.php?page=game_list'), 301);
        //   header("location:http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Employee_Listing");
    }
}
?>