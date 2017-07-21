<?php

include_once "models/Table.class.php";

class Logs_Plus_Table extends Table {
	
	public function getUserLogPlus($log_id) {
		$sql = "SELECT * FROM logs_plus WHERE log_id = ?";
		$data = array($log_id);
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
	
	public function saveLogPlus($log_id, $question_id, $answer) {
		$sql = "INSERT INTO logs_plus (log_id, question_id, answer) VALUES (?, ?, ?)";
		$data = array($log_id, $question_id, $answer);
		$statement = $this->makeStatement($sql, $data);
	}
	
	public function updateLogPlus($answer, $question_id, $log_id) {
		$sql = "UPDATE logs_plus SET answer = ? WHERE question_id = ? AND log_id = ?";
		$data = array($answer, $question_id, $log_id);
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
	
	public function deleteLogPlus($log_id) {
		$sql = "DELETE FROM logs_plus WHERE log_id = ?";
		$data = array($log_id);
		$statement = $this->makeStatement($sql, $data);
	}
}