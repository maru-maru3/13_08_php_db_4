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
// $sql = 'SELECT * FROM kadai_question_table  ORDER BY id DESC';

$sql = 'SELECT * FROM kadai_question_table  
LEFT OUTER JOIN (SELECT todo_id, COUNT(id) AS cnt
FROM kadai_suki_table GROUP BY todo_id) AS likes
ON kadai_question_table.id = likes.todo_id';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // ここから今回、フォーいーちのためにコメントアウト

}

// var_dump($_POST);
// exit();

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
              <!-- この下からフキダシ要素 -->
              <?php foreach ($result as $record) : ?>
                <div class="record-wrapper" style="display: inline-block;">
                  <p>

                    <div class="record-box1">
                      <div class='arrow_box'>
                        <p>NAME: <?php echo "{$record["nickname"]}" ?></ｐ>
                          <p>分野: <?php echo "{$record["field"]}" ?></p><br>
                          <p><?php echo "{$record["field_text"]}" ?></p>
                          <!-- // ここから自分でいじった箇所 -->
                          <p><a href='edit.php?id=<?php echo $record["id"] ?>'>like</a></p>
                          <p><a href='edit.php?id=<?php echo $record["id"] ?>'>edit</a></p>
                          <p><a href='delete.php?id=<?php echo $record["id"] ?>'>delete</a></p>
                      </div>
                      <br>
                      　　😋👺😮🤖😋🤡🤣　　<br>
                      <br>
                    </div>
                    <!-- ここまでフキダシ -->
                    <div class="record-box2">
                      <img class="portfolio" width="100px" src="img/portfolio.png" alt="">
                      <br>
                      <button>会員情報</button>
                      <br>
                      <br>
                    </div>

                  </p>
                </div>
              <?php endforeach; ?>
              <!-- ここまでレコードで出てくる -->

            </tbody>


          </table>
        </div>


        <div>

        </div>
    </div>

  </div>

</body>

</html>