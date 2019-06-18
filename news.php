<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
    require_once 'mysql_connect.php';

    $sql = 'SELECT * FROM `articles` WHERE `id` = :id';
    //$id = $_GET['id'];
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $_GET['id']]);

    $article = $query->fetch(PDO::FETCH_OBJ);

    $website_title = $article->title;
    require 'blocks/head.php';
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <div class="jumbotron">
          <h1><?=$article->title?></h1>
          <p><b>Автор статьи:</b> <mark><?=$article->avtor?></mark></p>
          <?php
            //echo date("H:i:s", $article->date);
            $date = date('d ', $article->date);
            $array = ["Января","Февраля","Марта","Апреля","Мая","Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря"];
            $date .= $array[date('n', $article->date) - 1];
            $date .= date(' H:i', $article->date);
          ?>
          <p><b>Время публикации:</b> <u><?=$date?></u></p>
          <p>
              <?=$article->intro?>
              <br><br>
              <?=$article->text?>
          </p>
        </div>
      </div>

      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
</body>
</html>
