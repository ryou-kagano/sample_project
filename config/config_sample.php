<?php

// 設定の追加
define("ACTIVE_MODE", 0);	// 本番かテストかを分ける

// サーバー設定
$config = array();

// ユーザーの設定
switch( ACTIVE_MODE ) {
	case 0:		// テスト

		$config = array(
			"master" => array(
				"db" => "db_name",

				"host" => "host_name",
//				"port" => "10080",

				"user" => "user_name",
				"pass" => "password",
			)
		);

		break;
}