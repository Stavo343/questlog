<?php

include_once "models/Table.class.php";

class Quests_Table extends Table {
	
	public function getQuests() {
		$sql = "SELECT * FROM quests";
		$statement = $this->makeStatement($sql);
		return $statement;
	}
	
	public function getQuest($quest_id) {
		$sql = "SELECT * FROM quests WHERE id = ?";
		$data = array($quest_id);
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
}