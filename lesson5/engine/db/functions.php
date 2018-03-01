<?php
	/* ФУНКЦИИ ИСПОЛЬЗУЕМЫЕ ПРИ РАБОТЕ С БАЗОЙ ДАННЫХ */

	function dbExecuteQuery($sql) {

		$db = mysqli_connect(HOST, USER, PASS, DB);
		$result = mysqli_query($db, $sql);
		mysqli_close($db);

		return $result;

	}

	function dbGetResult($sql) {

		$db = mysqli_connect(HOST, USER, PASS, DB);
		$result = mysqli_query($db, $sql);

		$array_result = array();

		while($row = mysqli_fetch_assoc($result)) {
			$array_result[] = $row;
		}

		mysqli_close($db);

		return $array_result[0];

	}