

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン・ログアウト画面</title>
  <link rel="stylesheet" href="css/index.css">
</head>

<body>

  <br>
  <button><a href="read.php">管理画面</a></button>
  <br>
  <br>

  <div>
    <img class="img" src="img/top.png" alt="">
  </div>


  <div class="form-wrapper">
    <form action="login_act.php" method="POST">
      <div class=form-box1>
        <div class="index-form">
          <br>
          <div class="form">
            Name : <input type="text" name="name">
          </div>
          <div class="form">
            E - mail : <input type="text" name="mail">
          </div>
          <div class="form">
            Password : <input type="text" name="password">
          </div>
        </div>
        <br>
        <div class="form-bt">
          <button>ログイン</button>
        </div>
        <br>
        <div class="form-bt">
          <button><a href="logout.php">ログアウト</a></button>
        </div>
        <br>
        <div class="form-bt">
          <button><a href="kaiin.php">会員登録</a></button>
        </div>
        <br>
        <br>
      </div>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</body>

</html>