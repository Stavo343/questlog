<?php

include_once "models/Table.class.php";

class Logs_Table extends Table {
	
	public function getUserLogs($userId, $sort) {
		$sql = "SELECT * FROM logs WHERE user_id = ? ORDER BY ";
		if ($sort === "byQuest") {
			$sql .= "quest_group, quest_id, ";
		}
		$sql .= "date DESC, id DESC";
		$data = array($userId);
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
	
	public function getUserLog($log_id) {
		$sql = "SELECT * FROM logs WHERE id = ?";
		$data = array($log_id);
		$statement = $this->makeStatement($sql, $data);
		$model = $statement->fetchObject();
		return $model;
	}
	
	public function saveLog($logFields, $logValues) {
		$sql = "INSERT INTO logs ($logFields[0]";
		for ($i = 1; $i < count($logFields); $i++) {
			$sql.= ", $logFields[$i]";
		}
		$sql .= ") VALUES (?";
		for ($i = 1; $i < count($logValues); $i++) {
			$sql .= ", ?";
		}
		$sql .= ")";
		$data = $logValues;
		$statement = $this->makeStatement($sql, $data);
		return $this->db->lastInsertId();
	}
	
	public function updateLog($logFields, $logValues, $log_id) {
		$sql = "UPDATE logs SET $logFields[0] = ?";
		for ($i = 1; $i < count($logFields); $i++) {
			$sql.= ", $logFields[$i] = ?";
		}
		$sql .= " WHERE id = ?";
		$logValues[] = $log_id;
		$data = $logValues;
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
	
	public function deleteLog($log_id) {
		$sql = "DELETE FROM logs WHERE id = ?";
		$data = array($log_id);
		$statement = $this->makeStatement($sql, $data);
	}
	
	//admin only below this

	public function getLogsByQuestId($quest_id) {
		$sql = "SELECT * FROM logs WHERE quest_id = ?";
		$data = array($quest_id);
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
}

