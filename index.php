<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/index.css">
    <script src="del.js"></script>
</head>
<body>
<div id="maindiv">
    <div id="div1" class="gdiv">
        <?php
        $table = "<table id='table1'><tr><th>ID</th><th>TODO</th><th>CATEGORY</th><th>DELETE</th></tr>";
        $connection = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
        $query = "SELECT t.TODO, c.CategoryName, ID FROM todo_items t INNER JOIN categories c ON c.categoryID = t.categoryID";
        $result = $connection->query($query);

        while ($row = $result->fetch()){
            $table .= "<tr>";
            $table .= "<td>".$row["ID"]."</td>";
            $table .= "<td>".$row["TODO"]."</td>";
            $table .= "<td>".$row["CategoryName"]."</td>";
            $table .= "<td><button onclick='del(".$row["ID"].")'>DELETE</button></td>";
            $table .= "</tr>";
        }
        $table .= "</table>";
        echo $table;
        ?>
    </div>
    <div id="div2" class="gdiv">
        <h1>TO DO LIST</h1>
        <h3>Usage:</h3>
    </div>
    <div id="div3" class="gdiv">
        <form method="post" action="resultcreate.php">
            <h3>Create</h3>
            <p>What to do</p>
            <input type="text" name="todoitem">
            <p>Category</p>
            <select name="category">
                <option>School</option>
                <option>Work</option>
                <option>Private</option>
                <option>Misc</option>
            </select>
            <input type="submit">
        </form>
    </div>
    <div id="div4" class="gdiv">
        <form method="post" action="resultupd.php">
            <h3>Update</h3>
            <p>id</p>
            <input type="number" name="id" required>
            <br>
            <p>column</p>
            <input type="text" name="column" required>
            <br>
            <p>new value</p>
            <input type="text" name="value" required>
            <input type="submit">
        </form>
    </div>
</div>
</body>
</html>