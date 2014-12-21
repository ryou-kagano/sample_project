<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: logout.php");
  exit;
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>【クライアントB】製品リスト</title>
<link href="css/main.css" rel="stylesheet">
<link href="css/bootstrap2.css" rel="stylesheet">
<script type="text/javascript" src="js/addBeforeUnload.js"></script>
</head>

<body>
<div class="container">
<div class="panel panel-primary">

    <div class="panel-heading">
        <h1><span class=""></span>【クライアントB】 Product List</h1>
    </div><!-- panel-heading -->

    <div class="panel-body">
  
<table class="table table-bordered table-striped">

<tr>
<th rowspan="2">製品１</th>
<td>認定書</td> 
<td class="text-right"><a href="db_history_dw.php?file=download/pdf_a.pdf">ダウンロード</a></td> 
</tr>


<tr>
<td>カタログ/図面</td> 
<td class="text-right"><a href="db_history_dw.php?file=download/pdf_a.pdf">ダウンロード</a></td> 
</tr>


<tr>
<th rowspan="2">製品２</th>
<td>認定書</td> 
<td class="text-right"><a href="db_history_dw.php?file=download/pdf_a.pdf">ダウンロード</a></td> 
</tr>

<tr>
<td>カタログ/図面</td> 
<td class="text-right"><a href="db_history_dw.php?file=download/pdf_a.pdf">ダウンロード</a></td> 
</tr>


<tr>
<th rowspan="2">製品３</th>
<td>認定書</td> 
<td class="text-right"><a href="db_history_dw.php?file=download/pdf_a.pdf">ダウンロード</a></td> 
</tr>

<tr>
<td>カタログ/図面</td> 
<td class="text-right"><a href="db_history_dw.php?file=download/pdf_a.pdf">ダウンロード</a></td> 
</tr>


<tr>
<th rowspan="2">製品４</th>
<td>認定書</td> 
<td class="text-right"><a href="db_history_dw.php?file=download/pdf_a.pdf">ダウンロード</a></td> 
</tr>

<tr>
<td>カタログ/図面</td> 
<td class="text-right"><a href="db_history_dw.php?file=download/pdf_a.pdf">ダウンロード</a></td> 
</tr>


<tr>
<th rowspan="2">製品５</th>
<td>認定書</td> 
<td class="text-right"><a href="db_history_dw.php?file=download/pdf_a.pdf">ダウンロード</a></td> 
</tr>

<tr>
<td>カタログ/図面</td> 
<td class="text-right"><a href="db_history_dw.php?file=download/pdf_a.pdf">ダウンロード</a></td> 
</tr>

</table>
  
<ul class="nav nav-pills nav-stacked">
<li><a href="menu2.php">メニューに戻る</a></li>
<li><a href="logout.php">ログアウト</a></li>
</ul>

    </div><!-- panel-body -->
    
  </div><!-- panel panel-primary -->
</div><!-- container -->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
  
</html>