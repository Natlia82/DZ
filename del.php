<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$test = $_GET['test'];
$way = "temp/$test";
unlink($way);
//header("Locaiton: index.php");
//  echo '<meta http-equiv="refresh" content="0;URL=list.php">';
header('Location: list.php');
?>
