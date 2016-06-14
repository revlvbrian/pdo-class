<?php

require_once('lib.php');

insertContent($_POST['title'], $_POST['description']);

header("Location: index.php");
exit();

?>