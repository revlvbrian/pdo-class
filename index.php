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
            $stmt = $pdo->query('SELECT * FROM List');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
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
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" type="text/CSS" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/CSS" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h2>To Do List <i class="fa fa-edit"></i></h2>
            <form role="form" class="form" action="insert.php" method="POST">
                <div class="form-group">
                    <label for="title">Title: </label>
                    <input class="form-control" type="text" name="title" value/>
                </div>
                <div class="form-group">
                    <label for="description">Description: </label>
                    <textarea class="form-control" name="description" rows="5" cols="40"></textarea>
                </div>
                <input type="submit" value="add" class="btn btn-success uppercase" name="submit">
            </form>

            <?php
                foreach($todo->fetchAllTodo($pdo) as $row)
                {
                    echo "<form role='form'>";
                    echo "<div class='panel panel-default'>";
                    echo "<div class='panel-body pull-right'><label>Date: </label> $row[created_date] </div>";
                    echo "<div class='panel-heading'><h4><label>Title: </label> $row[title] </h4></div>";
                    echo "<div class='panel-body desc'><h4>Description:</h4></div>";
                    echo "<div class='panel-body'>$row[description]</div>";
                    echo "<a class='button btn btn-danger form-control' href=delete.php?id=$row[id]>Delete</a>";
                    echo "<a class='button btn btn-primary form-control' href=update.php?id=$row[id]>Edit</a><br>";
                    echo "</div>";
                    echo "</form>";
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