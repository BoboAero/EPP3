<?php
$id = $_GET['id'];
$connection = new PDO('mysql:host=localhost;dbname=todo', 'root', '');

$query = "DELETE FROM todo_items WHERE id = :id";
$prep = $connection->prepare($query);
$prep->bindParam(':id', $id);
$prep->execute();

?>
<h1>succesfully deleted.</h1>
<a href="index.php">RETURN</a>