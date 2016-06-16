<?php

require_once('lib.php');

updateById($_GET['id'], $_POST['title'], $_POST['description']);

header('Location: index.php');
exit();

?>