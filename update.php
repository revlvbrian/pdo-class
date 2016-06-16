<?php

require_once('lib.php');

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
            <h2>To Do List - Edit <i class="fa fa-edit"></i></h2>
            <form role="form" class="form" action="edit.php?id=<?php print_r($_GET['id']); ?>" method="POST">
                <div class="form-group">
                    <label for="title">Title: </label>
                    <input class="form-control" type="text" name="title" value="<?php print_r(getId($_GET['id'])['title']); ?>"/>
                </div>
                <div class="form-group">
                    <label for="description">Description: </label>
                    <textarea class="form-control" name="description" rows="5" cols="40"><?php print_r(getId($_GET['id'])['description']); ?></textarea>
                </div>
                <input type="submit" value="update" class="btn btn-success uppercase" name="update">
            </form>
        </div>
    </div>
</body>
</html>