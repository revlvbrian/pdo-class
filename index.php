<?php

    $dsn = 'mysql: host=localhost; dbname=todo';
    $user = 'root';
    $password = 'P@ssw0rd';
    try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    }
    require_once('lib.php');

    class Index
    {
        public function __construct($pdo)
        {

        }
        public function fetchAllTodo($pdo)
        {
            $sql= "SELECT * FROM List";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    $todo = new Index($pdo);
    $todo->fetchAllTodo($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

    <div class="wrapper">
        <div class="form-container">
            <h1>To Do List <i class="fa fa-edit"></i></h1>
            <form class="form" action="insert.php" method="POST">
                <label>Title: </label><input type="text" name="title" value/>
                <label>Description: </label><textarea name="description" rows="5" cols="40"></textarea>
                <input type="submit" value="add" class="uppercase" name="submit">
            </form>
            <?php
                foreach($todo->fetchAllTodo($pdo) as $row)
                {
                    echo "<div class='wrapper'><form action='delete.php' method='POST' class='form-display'>";
                    echo "<label for=''>ID: </label><input type='text' name='updateid' value='$row[id]'>";
                    echo "<label for=''>Title: </label><input type='text' name='updatetitle' value='$row[title]'>";
                    echo "<label for=''>Description: </label><input type='text' name='updatedesc' value='$row[description]'>";
                    echo "<label for=''>Date: </label><input type='text' name='updated_date' value='$row[created_date]'>";
                    echo "<a class='' href='edit.php?id=$row[id]'>Update</a>";
                    echo "<a class='' href='delete.php?id=$row[id]'>Delete</a>";
                    echo "</form></div>";
                }
            ?>
        </div>
    </div>

<script src="jquery-2.2.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
    $(".buttonadd").click(function(){
    $(".form").toggle();
    });
</script>

</body>
</html>