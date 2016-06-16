<?php

require_once('lib.php');

deleteById($_GET['id']);

header("Location: index.php");
exit;

?>