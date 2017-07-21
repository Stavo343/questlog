<?php

include_once "models/Table.class.php";

class Victory_Options_Table extends Table {
	
	public function getVictoryOptions($quest_id) {
		$sql = "SELECT * FROM victory_options WHERE quest_id = ?";
		$data = array($quest_id);
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
	
	
}