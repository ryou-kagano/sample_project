<?php
session_start();

// エラーメッセージ
$errorMessage = "";
  	
// mysqlへの接続
$mysqli = new mysqli('mysql319.db.sakura.ne.jp', 'freesquare', '78rumblefish', 'freesquare_db');

// 文字セットを utf8 に変更
$mysqli->set_charset("utf8");

if ($mysqli->connect_error) {
  print('<p>データベースへの接続に失敗しました。</p>' . $mysqli->connect_error);
  exit();
}

$user_id = $_SESSION["USERID"];
$name = $_SESSION["NAME"];
$client = $_SESSION["CLIENT"];
$location = $_SESSION["LOCATION"];

// クエリの実行
$query = "INSERT INTO history_table(user_id, name, client, login_date) VALUES ('".$user_id."','".$name."','".$client."',NOW())";
$result = $mysqli->query($query);
if (!$result) {
  print('クエリーが失敗しました。' . $mysqli->error);
  $mysqli->close();
  exit();
}

// データベースの切断
$mysqli->close();

header("Location: ".$location);

exit;
  
?>