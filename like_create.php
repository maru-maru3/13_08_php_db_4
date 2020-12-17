<?php
// var_dump($_GET);
// exit();
// 関数ファイルの読み込み
include('functions.php');
// GETデータ取得
$user_id = $_GET['user_id'];
$todo_id = $_GET['kaisu_id'];
// DB接続
$pdo = connect_to_db();


// // ここからいいねしてるかのチェック P30

$sql = 'SELECT COUNT(*) FROM kadai_suki_table
WHERE user_id=:user_id AND kaisu_id=:kaisu_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':kaisu_id', $kaisu_id, PDO::PARAM_INT);
$status = $stmt->execute();
if ($status == false) {
    // エラー処理
} else {
    $like_count = $stmt->fetch();
    //     var_dump($like_count[0]); 
    //     exit();
    // }


    // いいねしていれば削除，していなければ追加のSQLを作成
    if ($like_count[0] != 0) {
        $sql = 'DELETE FROM kadai_suki_table
WHERE user_id=:user_id AND kaisu_id=:kaisu_id';
    } else {
        $sql = 'INSERT INTO kadai_suki_table(id, user_id, kaisu_id, hizuke_at)
VALUES(NULL, :user_id, :kaisu_id, sysdate())';
    }
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':kaisu_id', $kaisu_id, PDO::PARAM_INT);
    $status = $stmt->execute();

    if ($status == false) {
        // エラー処理
        $error = $stmt->errorInfo();
        echo json_encode(["error_msg" => "{$error[2]}"]);
        exit();
    } else {
        header('Location:read.php');
    }
}

// INSERTのSQLは前項で使用したものと同じ！
// 以降（SQL実行部分と一覧画面への移動）は変更なし！
// SQL文は1行にまとめる
