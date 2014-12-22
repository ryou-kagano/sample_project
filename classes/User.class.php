<?php

class User {

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
	
}