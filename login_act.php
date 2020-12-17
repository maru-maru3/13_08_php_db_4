<?php


session_start(); // セッションの開始

include('functions.php'); // 関数ファイル読み込み

$name = $_POST['name']; // データ受け取り→変数に入れる
$mail = $_POST['mail'];
$password = $_POST['password'];
// $is_admin = $_POST['is_admin'];
// $is_deleted = $_POST['is_deleted'];

// var_dump($_POST);
// exit();

$pdo = connect_to_db(); // DB接続


$sql = 'SELECT * FROM kadai_users_table
WHERE name=:name
AND password=:password
AND is_deleted=0'; //この３つが合致しないと入れない

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

$val = $stmt->fetch(PDO::FETCH_ASSOC); // 該当レコードだけ取得
if (!$val) { // 該当データがないときはログインページへのリンクを表示
    echo "<p>ログイン情報に誤りがあります．</p>";
    echo '<a href="index.php">login</a>';
    exit();
} else {
    $_SESSION = array(); // セッション変数を空にする
    $_SESSION["session_id"] = session_id();
    $_SESSION["is_admin"] = $val["is_admin"];
    $_SESSION["name"] = $val["name"];
    header("Location:input.php"); // 一覧ページへ移動
    exit();
}
