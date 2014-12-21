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
<title>【クライアントB】メニュー</title>
<link href="css/main.css" rel="stylesheet">
<link href="css/bootstrap2.css" rel="stylesheet">
<script type="text/javascript" src="js/addBeforeUnload.js"></script>
</head>
<body>
<div class="container">
<div class="panel panel-primary">

    <div class="panel-heading">
        <h1><span class=""></span>【クライアントB】 Menu</h1>
    </div><!-- panel-heading -->

    <div class="panel-body">
    
    	<p class="help-block">ようこそ<?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?>さん</p>

		<div>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="main2_1.php">製品リスト</a></li>
                <li><a href="main2_2.php">管理センター</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </div><!-- col-xs-4 -->

    </div><!-- panel-body -->
    
  </div><!-- panel panel-primary -->
</div><!-- container -->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
  
</html>