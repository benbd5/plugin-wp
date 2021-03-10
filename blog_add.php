<?php
function game_add()
{
?>
    <form action="" method="post">
        <label for="fname">Nom du jeu:</label><br>
        <input type="text" name="name"><br>
        <label for="lname">prix:</label><br>
        <input type="number" name="price">
        <input type="submit" value="ajouter" name="ajouter">
    </form>
<?php
}
