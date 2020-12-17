<?php


// session_start(); // セッション開始


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

// var_dump($_POST);
// exit();

if (
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['mail']) || $_POST['mail'] == '' ||
  !isset($_POST['password']) || $_POST['password'] == '' ||
  !isset($_POST['address']) || $_POST['address'] == '' ||
  !isset($_POST['work']) || $_POST['work'] == '' ||
  !isset($_POST['bikou']) || $_POST['bikou'] == ''
) {
  exit('ParamError');
}


// データを変数に格納
$name = $_POST['name'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$address = $_POST['address'];
$work = $_POST['work'];
$bikou = $_POST['bikou'];
// 「dbname」「port」「host」「username」「password」を設定
$dbn
  = 'mysql:dbname=gacf_l04_08;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = ''; // （空文字）
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}
// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．


// SQL作成&実行
$sql = 'INSERT INTO
kadai_users_table(id, name, mail, password, address, work, bikou)
VALUES(NULL, :name, :mail, :password, :address, :work, :bikou)';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':work', $work, PDO::PARAM_STR);
$stmt->bindValue(':bikou', $bikou, PDO::PARAM_STR);
$status = $stmt->execute(); // SQLを実行



// 失敗時にエラーを出力し，成功時は登録画面に戻る
if ($status == false) {
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示
  exit('sqlError:' . $error[2]);
} else {
  // 登録ページへ移動
  header('Location:index.php');
}
