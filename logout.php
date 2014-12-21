<?php
session_start();

if (isset($_SESSION["USERID"])) {
  $errorMessage = "ログアウトしました。";
}
else {
  $errorMessage = "セッションがタイムアウトしました。";
}
// セッション変数のクリア
$_SESSION = array();
// クッキーの破棄
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// セッションクリア
@session_destroy();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Logout Screen</title>
<link href="css/main.css" rel="stylesheet">
<link href="css/bootstrap2.css" rel="stylesheet">
<script type="text/javascript" src="js/addBeforeUnload.js"></script>
</head>
<body>
  
<div class="container">
<div class="panel panel-primary">

    <div class="panel-heading">
        <h1><span class=""></span>Logout Screen</h1>
    </div><!-- panel-heading -->

    <div class="panel-body">
    
  
  		<div><?php echo $errorMessage; ?></div>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="login.php">ログイン画面に戻る</a></li>
        </ul>
  
    </div><!-- panel-body -->
    
  </div><!-- panel panel-primary -->
</div><!-- container -->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
  
</body>
</html>