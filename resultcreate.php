<?php
 $connection = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
 $ti = $_POST['todoitem'];
 $cat = $_POST['category'];

 switch ($cat){
     case "School":
         $cat = 1;
         break;
     case "Work":
         $cat = 2;
         break;
     case "Private":
         $cat = 3;
         break;
     case "Misc":
         $cat = 4;
         break;
 }

    $query = "INSERT INTO todo_items (TODO, categoryID) values (:do, :cat)";
    $prep = $connection->prepare($query);
    $prep->bindParam(':do', $ti);
    $prep->bindParam(':cat', $cat);
    $prep->execute();

?>
<h1>succesfully created.</h1>
<a href="index.php">RETURN</a>