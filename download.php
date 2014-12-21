<?php
//echo $_GET["file"];
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: logout.php");
  exit;
}


/**/
$file =strval($_GET["file"]);
$file_length = filesize($file);
$file_title = $file_title = str_replace("download/", "", $file);
$file_titles =strval($file_title);


$_SESSION["DOWNLOADNAME"] = $file_title;
//include "log_down.php"; 

header("Content-Disposition: attachment; filename=$file_title");
header("Content-Length:$file_length");
header("Content-Type: application/octet-stream");
readfile ($file);


?>
