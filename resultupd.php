<?php
$connection = new PDO('mysql:host=localhost;dbname=todo', 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $column = $_POST['column'];
    $value = $_POST['value'];

    $query = "UPDATE todo_items SET $column = :value WHERE id = :id";
    $prep = $connection->prepare($query);
    $prep->bindParam(':value', $value);
    $prep->bindParam(':id', $id);
    $prep->execute();

}
?>
<h1>succesfully updated.</h1>
<a href="index.php">RETURN</a>