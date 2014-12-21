<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login History</title>
<link href="css/main.css" rel="stylesheet">
<link href="css/bootstrap2.css" rel="stylesheet">
<script type="text/javascript" src="js/addBeforeUnload.js"></script>
</head>


<body>
<div class="container">
<div class="panel panel-primary">

    <div class="panel-heading">
        <h1><span class=""></span>Download History</h1>
    </div><!-- panel-heading -->

    <div class="panel-body">

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
$query = "SELECT * FROM history_dw_table";

$result = $mysqli->query($query);
if (!$result) {
  print('クエリーが失敗しました。' . $mysqli->error);
  $mysqli->close();
  exit();
}

print"<table class='table table-bordered table-striped'><tr><td>No</td>";
print"<td>ログイン日時</td>";
print"<td>名前</td>";
print"<td>会社名</td>";
print"<td>ファイル名</td></tr>";

while ($row = $result->fetch_row()) {

	$Title1=strip_tags($row[0]);
	$Title2=strip_tags($row[5]);
	$Title3=strip_tags($row[1]);
	$Title4=strip_tags($row[4]);
	$Title5=strip_tags($row[3]);

	
	print"<tr>";
	print"<td class='td_title1'>$Title1</td>";
	print"<td class='td_title1'>$Title2</td>";
	print"<td class='td_title1'>$Title3</td>";
	print"<td class='td_title1'>$Title5</td>";
	print"<td class='td_title1'>$Title4</td>";
	print"</tr>";

}

// データベースの切断
$mysqli->close();


// ページング処理
/*
$P=$_GET["p"];

if($P>0){
	$Prev=$P-1;
	$PrevPage="<a href='history.php?p={$Prev}'>前の10件</a>";
}

$Size=sizeof($Data);
if($Size>10){
	if($Size/10-1>$P){
		$Next=$P+1;
		$NextPage="<a href='history.php?p={$Next}'>次の10件</a>";
	}
}
*/
?>

    <ul class="nav nav-pills nav-stacked">
    <li><a href="download_dw.php">CSVダウンロード</a></li>
    <li><a href="admin.php">メニューに戻る</a></li>
    <li><a href="logout.php">ログアウト</a></li>
    </ul>

    </div><!-- panel-body -->
    
  </div><!-- panel panel-primary -->
</div><!-- container -->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>
