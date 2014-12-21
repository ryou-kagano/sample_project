<?php
require_once("init.php");

session_start();

// エラーメッセージ
$errorMessage = "";

// ログインボタンが押された場合      
if (isset($_POST["login"])) {

	// 入力値のセット
	$user_id = $_POST["user_id"];
	$name = $_POST["name"];

	$user = new User();
	$result = $user->getData($user_id);
	
	$db_hashed_pwd = $result['password'];
	$client = $result['client'];
	$location = $result['location'];
	  
/*	  
	$dsn = "mysql:dbname=freesquare_db;host=mysql319.db.sakura.ne.jp;charset=utf8";
	$user = "freesquare";
	$pass = "78rumblefish";  
	
  // mysqlへの接続
	$db = new PDO($dsn,$user,$pass);

	
  // クエリの実行
  $sql = "SELECT * FROM user_table WHERE user_id = '" . $userid . "'";
	
	// プリペアドステートメント
	$stmt = $db->prepare($sql);
	
	// 変数をバインド
	$stmt->bindParam(':id', $userId, PDO::PARAM_INT);
	
	// 実行
   $stmt->execute();
	
	while ($row = $stmt->fetch()) {
		$db_hashed_pwd = $row['password'];
		$client = $row['client'];
		$location = $row['location'];
	}
   
	// 接続を閉じる
	$db->null;
*/

	// 画面から入力されたパスワードとデータベースから取得したパスワードのハッシュを比較
	/*if (hash('sha256', $_POST['password']) === $db_hashed_pwd) {*/
	if ($_POST['password'] === $db_hashed_pwd) {

		// セッションIDを新規に発行する
		session_regenerate_id(true);
		$_SESSION["USERID"] = $user_id;
		$_SESSION["NAME"] = $name;
		$_SESSION["CLIENT"] = $client;
		$_SESSION["LOCATION"] = $location;

		header("Location:db_history.php");

		exit;
		
	} else {

		// 認証失敗
		$errorMessage = "ユーザIDあるいはパスワードに誤りがあります。";
	} 
  
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ログイン画面</title>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/bootstrap2.css" rel="stylesheet">
    <script type="text/javascript" src="js/addBeforeUnload.js"></script>
  </head>
<body>

  <div class="container">
  <div class="panel panel-primary">
  
  	<div class="panel-heading">
    	<h1><span class=""></span>Login Screen</h1>
    </div><!-- panel-heading -->

  	<div class="panel-body">
    	    
        	<p class="help-block">クライアントA [ ID:ID1 / パスワード: pass1 ]</p>
        	<p class="help-block">クライアントB [ ID:ID2 / パスワード: pass2 ]</p>
        	<p class="help-block">管理画面 [ ID:admin / パスワード: passadmin ]</p>
  
        <form class="form-horizontal" id="loginForm" name="loginForm" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">
        
          <fieldset>
          
<!--              <legend>Login</legend>-->
              <div><?php echo $errorMessage ?></div>
              
              <div class="form-group">
              	<label for="name" class="control-label col-sm-4">名前</label>
                <div class="col-sm-6"><input type="text" id="name" name="name" value="" placeholder="" class="form-control"></div>
                <div class="col-sm-2"></div>
              </div><!-- form-group -->  

              <div class="form-group">
              	<label for="user_id" class="control-label col-sm-4">ID</label>
                <div class="col-sm-6"><input type="text" id="user_id" name="user_id" value="" placeholder="" class="form-control"></div>
                <div class="col-sm-2"></div>
              </div><!-- form-group -->  

              <div class="form-group">
              	<label for="password" class="control-label col-sm-4">パスワード</label>
                <div class="col-sm-6"><input type="password" id="password" name="password" value="" placeholder="" class="form-control"></div>
                <div class="col-sm-2"></div>
              </div><!-- form-group -->  

              <div class="form-group">
                <div class="col-sm-4"></div>
			  	<div class="col-sm-6"><input class="btn btn-default" type="submit" id="login" name="login" value="ログイン"></div>
                <div class="col-sm-2"></div>
              </div><!-- form-group -->  
<!--             
              <label for="name">名前</label>
              <input type="text" id="name" name="name" value="">
               <br>
            
              <label for="user_id">ID</label>
              <input type="text" id="user_id" name="user_id" value="">
              <br>
              <label for="password">パスワード</label><input type="password" id="password" name="password" value="">
              <br>
              <label></label><input type="submit" id="login" name="login" value="ログイン">
-->
              
          </fieldset>
          
        </form>
    
    </div><!-- panel-body -->
    
    </div><!-- panel panel-primary -->
  </div><!-- container -->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
  
</html>
