<?php
include('functions.php');

//GETデータ取得
$id   = $_GET['id'];

//DB接続
$pdo = connectToDb();

//3．データ登録SQL作成
$sql = 'UPDATE user_table SET life_flg=1 WHERE id=:id';
// $sql = 'DELETE FROM user_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status == false) {
    showSqlErrorMsg($stmt);
} else {
    header('Location: user_select.php');
    exit();
}
