<?php
function game_list()
{
?>
    <style>
        table {
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }
    </style>
    <div class="wrap">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                global $wpdb;
                // création de variable
                $table_name = $wpdb->prefix . 'video_game';
                $games = $wpdb->get_results("SELECT id,name,price from $table_name");
                foreach ($games as $game) {
                ?>
                    <tr>
                        <td><?= $game->id; ?></td>
                        <td><?= $game->name; ?></td>
                        <td><?= $game->price; ?></td>
                        <td>
                            <a href="<?php echo admin_url('admin.php?page=game_update&id=' . $game->id); ?>">Update</a>
                            <a href="<?php echo admin_url('admin.php?page=game_delete&id=' . $game->id); ?>"> Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php
}
add_shortcode('short_games_list', 'game_list');
?>