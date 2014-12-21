<?php

	$login_date = $_SESSION["LOGIN_DATE"];
	$name = $_SESSION["NAME"];
	$client = $_SESSION["CRIENT"];

	echo 'login_date:'.$login_date.'<br>';
	echo 'name:'.$name.'<br>';
	echo 'client:'.$client.'<br>';
/*
   $log_fl = "csv/log_acc.csv";

// 日時
    $log_ln[0] = date ( "Y-m-d H:i:s" );
// 文字化け対策にSJISへエンコード
	$csv_data = mb_convert_encoding($_SESSION["USERID"], "SJIS", "UTF-8");
// 登録名前
    $log_ln[1] = str_replace ( ",", "，", $csv_data);
// 登録名前
	$csv_data_comapny = mb_convert_encoding($_SESSION["COMPANY"], "SJIS", "UTF-8");
    $log_ln[2] = str_replace ( ",", "，", $csv_data_comapny);
// IPアドレス
   // $log_ln[3] = str_replace ( ",", "，", $_SERVER["REMOTE_ADDR"] );
// ホスト名
    //$log_ln[4] = str_replace ( ",", "，", @gethostbyaddr ( $_SERVER["REMOTE_ADDR"] ) );
/*
// ブラウザ
    $log_ln[5] = str_replace ( ",", "，", $_SERVER["HTTP_USER_AGENT"] );
*/
/*
	$value = file_get_contents($log_fl);

    if ( $csv = @fopen ( $log_fl, "a" ) )
    {
		$new = implode ( ",", $log_ln )."\n";
		$fp = fopen($log_fl,'w');
		fwrite($fp,$new.$value);
		fclose($fp);
	    //$ln = implode ( ",", $log_ln )."\n";
        //fwrite ( $csv, $ln );
        //fclose ( $csv );
    }
    else
    {
        echo "error";
    }

?>