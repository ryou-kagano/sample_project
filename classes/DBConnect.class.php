<?php

require_once dirname(__FILE__).'/../config/config.php';

/**
 * @author
 * @
 */
class DBConnect {

	// DB接続のインスタンス
	private static $db = null;

	// DB接続するための設定を保存
	protected static $config = null;

	function __construct() {
	}

	// インスタンスを渡す
	/**
	 * @return PDO
	 * データベースに接続。エラーモードをエクセプションに設定
	 */
	public static function getDB()
	{
		if( is_null(self::$db) )
		{
			try {
				$conf = self::$config['master'];

				$dsn = 'mysql:dbname='.$conf['db'].';host='.$conf['host'].';charset=utf8';
				$user = $conf['user'];
				$password = $conf['pass'];

				$option = array(
						PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
						PDO::ATTR_EMULATE_PREPARES => false,
				);

				// 例外の処理
				self::$db = new PDO($dsn, $user, $password, $option );
				self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch (PDOException $e) {
				$message = "エラー!: " . $e->getMessage() . "<br/>";

				print $message;
			}
		}

		return self::$db;
	}

	// 設定をセット
	public static function Set($conf)
	{
		self::$config = $conf;
	}
}

DBConnect::Set($config);