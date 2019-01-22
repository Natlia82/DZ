<?php

function user() {
session_start();
if (empty($_SESSION['status']) ||  ($_SESSION['status'] !== 'user' and  $_SESSION['status'] !== 'guest')) {
  http_response_code(403);
  header('HTTP/1.1 403 Not Found');
  exit("<h1>403 Forbidden</h1><p>Перейти к <a href='index.php'>форме авторизации</a></p>");
}
}
 ?>
