<?php

function insertContent($title, $description)
{
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

    $sql = "INSERT INTO List(title,
                description) VALUES (
                :title,
                :description)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute($todo = [
    'title' => $title,
    'description' => $description
    ]);
}


function deleteById($id)
{
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

    $sql = "DELETE FROM List WHERE id =  :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}


function updateById($id, $title, $description)
{
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

    $sql = "UPDATE List
            SET id = :id,
                title = :title,
                description = :description
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":id" => $id,
                        ":title" => $title,
                        ":description" => $description));
}


?>