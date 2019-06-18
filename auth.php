<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
    $website_title = 'Авторизация на сайте';
    require 'blocks/head.php';
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h4>Форма авторизации</h4>
        <form action="" method="post">
          <label for="login">Логин</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="pass">Пароль</label>
          <input type="password" name="pass" id="pass" class="form-control">

          <div class="alert alert-danger mt-2" id="errorBlock"></div>

          <button type="button" id="auth_user" class="btn btn-success mt-5">
            Войти
          </button>
        </form>
      </div>

      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>
    $('#auth_user').click(function () {
      var login = $('#login').val();
      var pass = $('#pass').val();

      $.ajax({
        url: 'ajax/auth.php',
        type: 'POST',
        cache: false,
        data: {'login' : login, 'pass' : pass},
        dataType: 'html',
        success: function(data) {
          if(data == 'Готово') {
            $('#auth_user').text('Готово');
            $('#errorBlock').hide();
            document.location.reload(true);
          } else {
            $('#errorBlock').show();
            $('#errorBlock').text(data);
          }
        }
      });
    });
  </script>
</body>
</html>
