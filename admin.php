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
<title>Administrator Menu</title>
<link href="css/main.css" rel="stylesheet">
<link href="css/bootstrap2.css" rel="stylesheet">
<script type="text/javascript" src="js/addBeforeUnload.js"></script>
</head>
<body>
<div class="container">
<div class="panel panel-primary">

    <div class="panel-heading">
        <h1><span class=""></span>Administrator Menu</h1>
    </div><!-- panel-heading -->

    <div class="panel-body">

    	<p class="help-block">ようこそ<?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?>さん</p>


<ul class="nav nav-pills nav-stacked">
<li><a href="history.php">ログイン履歴</a></li>
<li><a href="history_dw.php">ダウンロード履歴</a></li>
<li><a href="logout.php">ログアウト</a></li>
</ul>

    </div><!-- panel-body -->
    
  </div><!-- panel panel-primary -->
</div><!-- container -->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
  
</html>