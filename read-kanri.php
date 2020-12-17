<?php


session_start(); // セッションの開始
include('functions.php'); // 関数ファイル読み込み
check_session_id(); // idチェック関数の実行
// ここまでがログインしてない人対策、入れませんよのコード



// DB接続情報
$dbn = 'mysql:dbname=gacf_l04_08;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}


// データ参照SQL作成 ※PDF４９Pより追記
// SELECT文  ↓ テーブル名の後 ORDER BY id DESC で降順に
$sql = 'SELECT * FROM kadai_question_table  ORDER BY id DESC';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "<div class='arrow_box'>";
    $output .= "<p>NAME: {$record["nickname"]}</ｐ>";
    $output .= "<p>分野: {$record["field"]}</p><br>";
    $output .= "<p>{$record["field_text"]}</p>";
    // ここから自分でいじった箇所
    $output .= "<p><a href='edit.php?id={$record["id"]}'>edit</a></p>";
    $output .= "<p><a href='delete.php?id={$record["id"]}'>delete</a></p>";
    $output .= "</div>";
    $output .= "<br>";
    $output .= "　　😋👺😮🤖😋🤡🤣　　<br>";
    $output .= "<br>";
  }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理者画面</title>
  <link rel="stylesheet" href="css/read.css">
</head>

<body>

  <button><a href="input.php">戻る</a></button>

  <div class="wrapper">

    <div class="all-wrapper">
      <br>
      <h1>管理者用ページです。会員データの修正・管理をお願いします。</ｈ1>
        <br>
        <br>
        <div class="wrap">

          <table>
            <tbody>
              <!-- ここにフキダシの中に<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
              <?= $output ?>
            </tbody>


          </table>
        </div>


        <div>




          <!-- グラフ用javascriptライブラリと自作JSの読込み -->
          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
          <script src="js/read.js"></script>
        </div>
    </div>

  </div>

</body>

</html>