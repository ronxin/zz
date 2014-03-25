<?php
require_once "db_info.php";

class SQL_Utils {
	public static $db = "zz";
	
	public static function useRawQuery($sql) {
		$mysqli = self::getConnection();
		$result = $mysqli->query($sql);
		if ($result === FALSE) {
			$query = $sql;
			if (strlen($query) > 1000) {
				$query = substr($sql, 0, 1000) . "..."; 
			}
			$message = "MySQL Error<br/>" .
					 			 "query = `$query`<br/>" .
								 "error = {$mysqli->error}.";

			throw new Exception($message); 
		} 
		return $result;
	}
	
	public static function getInsertId() {
		 $mysqli = self::getConnection();
		 if (!isset($mysqli->insert_id)) {
		   throw new Exception("MySQL Error: insert_id not available.");
		 }
		 return $mysqli->insert_id;
	}
	
	public static function escapeString($str) {
		$mysqli = self::getConnection();
		return $mysqli->real_escape_string($str);
	}
	
	public static function selectQuery($sql) {
		$sql_result = self::useRawQuery($sql);
		$result = array();
		while ($row = $sql_result->fetch_assoc()) {
			$result[] = $row;
		}
		return $result;
	}
	
	public static function updateQuery($sql) {
		self::useRawQuery($sql);
	}
	
	/**
	 * Returns a single mysql row, or FALSE if the row does not exist.
	 */
	public static function selectQueryExpectSingleResult($sql) {
		$result = self::selectQuery($sql);
		if (count($result) >= 1) {
			return $result[0];
		}
		return FALSE;
	}
	
	/**
	 * Returns a mysqli object.
	 */
	public static function getConnection() {
		if (self::$_connected_db != self::$db) {
			$host = DB_Info::getHost();
			$user = DB_Info::getUser();
			$pass = DB_Info::getPass();
			self::$_mysqli = new mysqli("$host", "$user", "$pass", self::$db);
			$mysqli = self::$_mysqli;
			if ($mysqli->connect_errno) {
				$message = "Failed to connect to MySQL. " .
								   "host=$host, user=$user, pass=$pass, database=$db, " .
								   "error_no={$mysqli->connect_errno}, " .
									 "error='{$mysqli->connect_error}'.";
				throw new Exception($message);
			}
			self::$_connected_db = self::$db;
		}
		return self::$_mysqli;
	}
	
	private static $_mysqli;
	private static $_connected_db;
}
?>
