<?php

include_once "models/Table.class.php";

class Victory_Logs_Table extends Table {
	
	public function getVictoryLogs($log_id) {
		$sql = "SELECT * FROM victory_logs WHERE log_id = ?";
		$data = array($log_id);
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
	
	public function saveVictoryLog($log_id, $victory_option_id, $acquired) {
		$sql = "INSERT INTO victory_logs (log_id, victory_option_id, acquired) VALUES (?, ?, ?)";
		$data = array($log_id, $victory_option_id, $acquired);
		$statement = $this->makeStatement($sql, $data);
	}
	
	public function updateVictoryLog($acquired, $log_id, $victory_option_id) {
		$sql = "UPDATE victory_logs SET acquired = ? WHERE log_id = ? AND victory_option_id = ?";
		$data = array($acquired, $log_id, $victory_option_id);
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
	
	public function deleteVictoryLog($log_id) {
		$sql = "DELETE FROM victory_logs WHERE log_id = ?";
		$data = array($log_id);
		$statement = $this->makeStatement($sql, $data);
	}
}