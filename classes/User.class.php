<?php

class User {
/*
	function login($email)
	{
		$result = false;

		// DB生成
		$db = DBConnect::getDB();

		// クエリ
		$regist_query = "INSERT IGNORE INTO `tbl_auth`(`user_email`, `register_datetime`) VALUES (:user_email, NOW() );";

		try {

			$stmt = $db->prepare($regist_query);
			$stmt->bindParam(":user_email", $email, PDO::PARAM_STR);

			$stmt->execute();

//同じメールアドレスで再度登録しようとした際に問題がありましたので、
//INSERT文にIGNOREをつけて、エラーを無視するようにしました。
//そのため、ここではlastInsertIdではなく、emailアドレスよりuser_idを検索して
//返す方法に変更しました。
//			$result = $db->lastInsertId();
			$result = $this->getData2($email);
			
		} catch (PDOException $e) {

			print $e->getMessage();

		} catch (Exception $e)
		{
			print $e->getMessage();
		}

		return $result;
	}

	function auth($user_id)
	{
		$result = false;

		// DB生成
		$db = DBConnect::getDB();

		// クエリ
		$auth_query = "UPDATE `tbl_auth` SET `mail_valid` = 1, mail_valid_datetime = NOW() WHERE user_id = :user_id;";

		try {

			// トランザクション開始
			$db->beginTransaction();

			$stmt = $db->prepare($auth_query);
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);

			$stmt->execute();

			// 各テーブルに初期値をユーザーを追加
			$minigame_query = "INSERT IGNORE INTO `tbl_minigame` (`user_id`) VALUES (:user_id);";

			$stmt = $db->prepare($minigame_query);
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);

			$stmt->execute();

			$db->commit();

			$result = true;

		} catch (Exception $e) {
			$db->rollBack();
			return false;

		}
		return $result;
	}
*/
	function getData($user_id)
	{
		$result = false;

		// DB生成
		$db = DBConnect::getDB();

		// クエリ
		$get_data_query = "
				SELECT *
				FROM
				 user_table
				WHERE
				 user_id = :user_id ;";

		$stmt = $db->prepare($get_data_query);
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);

		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}
	
	/**
	 * emailを条件にユーザーIDを取得
	 */
/*	function getData2($user_email)
	{
		$result = false;

		// DB生成
		$db = DBConnect::getDB();

		// クエリ
		$get_data_query = "
				SELECT
				 `user_id`
				FROM
				 `tbl_auth`
				WHERE
				 user_email = :user_email ;";

		$stmt = $db->prepare($get_data_query);
		$stmt->bindParam(":user_email", $user_email, PDO::PARAM_INT);

		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result['user_id'];
	}

	/**
	 * 育成処理
	 */
/*	function updateData($user_id, $data1, $data2, $data3)
	{
		$result = false;

		// DB生成
		$db = DBConnect::getDB();

		// クエリ
		$update_data_query = "
				UPDATE
				 `tbl_minigame`
				SET
				 `remain_count` = `remain_count` - 1,
				 `param_attack` = `param_attack` + :data1,
				 `param_support` = `param_support` + :data2,
				 `param_heal` = `param_heal` + :data3,
				 `gacya_point` = `param_attack` + `param_support` + `param_heal`
				WHERE
				 user_id = :user_id ;";

		$stmt = $db->prepare($update_data_query);
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->bindParam(":data1", $data1, PDO::PARAM_INT);
		$stmt->bindParam(":data2", $data2, PDO::PARAM_INT);
		$stmt->bindParam(":data3", $data3, PDO::PARAM_INT);
		
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}

	/**
	 * モンスター決定処理
	 */
/*	function updateData2($user_id, $monster_id)
	{
		$result = false;

		// DB生成
		$db = DBConnect::getDB();

		// クエリ
		$update_data_query2 = "
				UPDATE
				 `tbl_auth`
				SET
				 `monster_id` = :monster_id
				WHERE
				 user_id = :user_id ;";

		$stmt = $db->prepare($update_data_query2);
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->bindParam(":monster_id", $monster_id, PDO::PARAM_INT);
		
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}

	/**
	 * モンスターストック処理及びガチャポイントのクリア
	 */
/*	function updateData3($user_id, $monster_id)
	{
		$result = false;

		// DB生成
		$db = DBConnect::getDB();

		// クエリ
		$update_data_query3 = "
				UPDATE
				 `tbl_minigame`
				SET
				 `gacya_point` = 0,
				 `param_attack` = 0,
				 `param_support` = 0,
				 `param_heal` = 0,
				 `stock_monster` = :monster_id
				WHERE
				 user_id = :user_id ;";

		$stmt = $db->prepare($update_data_query3);
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->bindParam(":monster_id", $monster_id, PDO::PARAM_INT);
		
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}

	/**
	 * ガチャポイントのクリア処理
	 */
/*	function updateData4($user_id)
	{
		$result = false;

		// DB生成
		$db = DBConnect::getDB();

		// クエリ
		$update_data_query4 = "
				UPDATE
				 `tbl_minigame`
				SET
				 `gacya_point` = 0,
				 `param_attack` = 0,
				 `param_support` = 0,
				 `param_heal` = 0
				WHERE
				 user_id = :user_id ;";

		$stmt = $db->prepare($update_data_query4);
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}

	/**
	 * 特定の属性からランダムでモンスターを選出して返す
	 */
/*	function randData($property)
	{
		$result = false;

		// DB生成
		$db = DBConnect::getDB();

		// クエリ
		$rand_data_query = "
				SELECT
				 `monster_id`
				FROM
				 `tbl_monster`
				WHERE
				 property = :property
				ORDER BY RAND();";

		$stmt = $db->prepare($rand_data_query);
		$stmt->bindParam(":property", $property, PDO::PARAM_INT);
		
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}

	/**
	 * ツイート実行時に育成回数を初期値(５回)に回復させる
	 */
/*	function tweetData($user_id)
	{
		$result = false;

		// DB生成
		$db = DBConnect::getDB();

		// クエリ
		$tweet_data_query = "
				UPDATE
				 `tbl_minigame`
				SET
				 `remain_count` = 5
				WHERE
				 user_id = :user_id ;";

		$stmt = $db->prepare($tweet_data_query);
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);

		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}
*/	
}