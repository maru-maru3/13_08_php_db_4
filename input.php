<?php
session_start(); // セッションの開始
include('functions.php'); // 関数ファイル読み込み
check_session_id(); // idチェック関数の実行
// ここまでがログインしてない人対策、入れませんよのコード
?>





<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>会員用画面</title>
  <link rel="stylesheet" href="css/input.css">
</head>

<body>

  <button><a href="read.php">管理画面</a></button>
  <br>
  <h2>
    <?= $_SESSION['name'] ?>、ログインありがとう！<br>
    お好きなジャンルでクライアントを探しましょう！
  </h2>

  <form action="create.php" method="POST">

    <div class="form-wrapper">

      <div class=form-box1>
        <div class="form">
          公開用 Name : <input type="text" name="nickname">
        </div>
        <div class="form">
          <div class="radio-bt">
            分野 :
            <ul>
              <li><input type="radio" name="field" value="ファッション"> ファッション </li>
              <li><input type="radio" name="field" value="音楽"> 音楽</li>
              <li><input type="radio" name="field" value="アート"> アート</li>
              <li><input type="radio" name="field" value="社会福祉"> 社会福祉</li>
              <li><input type="radio" name="field" value="マンガ・ゲーム"> マンガ・ゲーム</li>
            </ul>
          </div>
        </div>
        <div class="form">
          キーワード入力 : <input type="text" name="field_text">
        </div>

        <br>
        <div class="form-bt">
          <button>送　信</button>
        </div>
        <br>

      </div>

      <div class=form-box2>
        <img class="img" src="img/ghosts.png" alt="">
      </div>

    </div>
    </div>
  </form>

  <br>
  <div class="form-bt">
    <button><a href="logout.php">ログアウト</a></button>
  </div>
  <br>

  </div>




  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</body>

</html>