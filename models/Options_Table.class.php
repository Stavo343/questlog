<?php

include_once "models/Table.class.php";

class Options_Table extends Table {

	public function getOptions($question_id) {
		$sql = "SELECT * FROM options WHERE question_id = ?";
		$data = array($question_id);
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
}