<?php


// mysqlへの接続
$mysqli = new mysqli('mysql319.db.sakura.ne.jp', 'freesquare', '78rumblefish', 'freesquare_db');

// 文字セットを utf8 に変更
$mysqli->set_charset("utf8");

if ($mysqli->connect_error) {
  print('<p>データベースへの接続に失敗しました。</p>' . $mysqli->connect_error);
  exit();
}


// クエリの実行
$query = "SELECT * FROM history_table";

$result = $mysqli->query($query);
if (!$result) {
  print('クエリーが失敗しました。' . $mysqli->error);
  $mysqli->close();
  exit();
}

$log_fl = "csv/log_acc.csv";	
fopen($log_fl,'w');
while ($row = $result->fetch_assoc()) {


	$login_date = $row['login_date'];
	$name = $row['name'];
	$client = $row['client'];


// 日時
	$log_ln[0] = $login_date;
	
// 文字化け対策にSJISへエンコード
	$csv_data_name = mb_convert_encoding($name, "SJIS", "UTF-8");
	$log_ln[1] = str_replace ( ",", "，", $csv_data_name);

	$csv_data_client = mb_convert_encoding($client, "SJIS", "UTF-8");
	$log_ln[2] = str_replace ( ",", "，", $csv_data_client);
	

	$value = file_get_contents($log_fl);

	if ( $csv = @fopen ( $log_fl, "a" ) ) {
		$new = implode ( ",", $log_ln )."\n";
		$fp = fopen($log_fl,'w');
		fwrite($fp,$value.$new);
		fclose($fp);
	} else {
		echo "error";
	}
		
}
	

// データベースの切断
$mysqli->close();


// ファイルダウンロード
$file =strval("csv/log_acc.csv");
$file_length = filesize($file);
$file_title = $file_title = str_replace("csv/", "", $file);
$file_titles =strval($file_title);

header("Content-Disposition: attachment; filename=$file_title");
header("Content-Length:$file_length");
header("Content-Type: application/octet-stream");
readfile ($file);

?>
