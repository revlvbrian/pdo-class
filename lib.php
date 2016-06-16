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

    $stmt = $pdo->prepare("DELETE FROM List WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function getId($id)
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

    $stmt = $pdo->prepare("SELECT * FROM List WHERE id= :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
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

    $sql = "UPDATE todo.List
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