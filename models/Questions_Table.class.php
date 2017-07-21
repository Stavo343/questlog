<?php

include_once "models/Table.class.php";

class Questions_Table extends Table {

	public function getQuestions($quest_id) {
		$sql = "SELECT * FROM questions WHERE quest_id = 1 OR quest_id = ?";
		$data = array($quest_id);
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
	
	//admin only below here
	public function getQuestIds() {
		$sql = "SELECT * FROM questions WHERE quest_id > 1";
		$statement = $this->makeStatement($sql);
		$questIdArray = $statement->fetchAll(PDO::FETCH_OBJ);
		return $questIdArray;
	}
}