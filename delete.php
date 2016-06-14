<?php

require_once('lib.php');

deleteById($_POST['id']);

header("Location: index.php");
exit();

?>