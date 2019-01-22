<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();
if (empty($_SESSION['status']) || $_SESSION['status'] !== 'user') {
  http_response_code(403);
  header('HTTP/1.1 403 Not Found');
  exit("<h1>403 Forbidden</h1><p>Перейти к <a href='index.php'>форме авторизации</a></p>");
}
if (!is_dir('temp/')) {
  mkdir("temp/", 0700);
}
 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Обработка форм</title>
  <meta charset="utf-8">
  <link type="text/css" href="css/style.css" rel="stylesheet">
</head>
<body>
  <form enctype="multipart/form-data" action="" method="POST">
    <div>Выбирите файл с тестом</div>
     <br>
       <input name="userfile" type="file" />
     <br>
     <br>
   <input type="submit" value="Отправить">
  </form>
  <?php
  if (!empty($_FILES)) {

    if (array_key_exists('userfile', $_FILES)) {
      if ($_FILES['userfile']['error'] === 0) {
        $name = basename($_FILES["userfile"]["name"]);
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], "temp/$name"))
        {
           //  echo "файл сохранен";
        //  echo '<meta http-equiv="refresh" content="0;URL=list.php">';
          header('Location: list.php');
        }



      }
    }
  }
   ?>
  <br>
  <br>
  <a href="list.php">lest.php</a>
  <br>
  <a href="logout.php">ВЫХОД</a>
</body>
</html>
