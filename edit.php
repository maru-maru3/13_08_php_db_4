<?php

// 関数ファイル読み込み
include("functions.php");
// 送信されたidをgetで受け取る
$id = $_GET['id'];
// DB接続&id名でテーブルから検索
$pdo = connect_to_db();
$sql = 'SELECT * FROM kadai_question_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// fetch()で1レコード取得できる．
if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集画面</title>
  <link rel="stylesheet" href="css/read.css">
</head>

<body>

  <div>
    <!-- <a href="todo_read.php">一覧画面</a> -->
    <br>
    <button><a href="read.php">Back</a></button>
    <br>


    <div class="wrapper">

      <div class="all-wrapper">
        <form action="update.php" method="POST">
          <!-- <form action="todo_update.php" method="POST"> -->

          <div class="wrapper">

            <div class="form-box">

              <div>
                <!-- // htmlのタグに初期値として設定 -->
                nickname: <input type="text" name="nickname" value="<?= $record["nickname"] ?>">
              </div>
              <br>
              <div>
                field: <input type="text" name="field" value="<?= $record["field"] ?>">
              </div>
              <br>
              <div>
                field_text: <input type="text" name="field_text" value="<?= $record["field_text"] ?>">
              </div>

            </div>
            <br>



            <!-- idを見えないように送るinput type="hidden"を使用する！
      form内に以下を追加 -->
            <div>
              <input type="hidden" name="id" value="<?= $record['id'] ?>">
              <!-- 更新のformは，登録と同じくpostで各値を送信しています！ -->
            </div>

            <div>
              <button>送　信</button>
            </div>
          </div>
          <br>
          <div><img class="ghost" src="img/ghost.png" alt=""></div>

      </div>


      </form>
    </div>
  </div>

</body>

</html>