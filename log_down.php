<?php
    $log_fl_down = "csv/log_download.csv";
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
	$csv_data_filename = mb_convert_encoding($_SESSION["DOWNLOADNAME"], "SJIS", "UTF-8");
    $log_ln[3] = str_replace ( ",", "，", $csv_data_filename);

	$value = file_get_contents($log_fl_down);
	
    if ( $csv = @fopen ( $log_fl_down, "a" ) )
    {
		$news = implode ( ",", $log_ln )."\n";
		$fp = fopen($log_fl_down,'w');
		fwrite($fp,$news.$value);
		fclose($fp);
    }
    else
    {
        echo "error";
    }

?>