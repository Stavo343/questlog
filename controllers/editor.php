<?php
include_once "models/Quests_Table.class.php";
$questsTable = new Quests_Table($db);
$allQuests = $questsTable->getQuests();
$quests = $allQuests->fetchAll(PDO::FETCH_OBJ);

include_once "models/Logs_Table.class.php";
$logsTable = new Logs_Table($db);
include_once "models/Logs_Plus_Table.class.php";
$logs_plusTable = new Logs_Plus_Table($db);
include_once "models/Victory_Logs_Table.class.php";
$victory_logsTable = new Victory_Logs_Table($db);

if (isset($_GET['log_id'])) {
	$log_id = $_GET['log_id'];
}
if (isset($_POST['log_id'])) {
	$log_id = $_POST['log_id'];
}
if (isset($log_id) && $log_id !== 0) {
	$userLog = $logsTable->getUserLog($log_id);
	$userLogPlus = $logs_plusTable->getUserLogPlus($log_id);
	$logPlus = $userLogPlus->fetchAll(PDO::FETCH_OBJ);
	$userVictoryLog = $victory_logsTable->getVictoryLogs($log_id);
	$victoryLog = $userVictoryLog->fetchAll(PDO::FETCH_OBJ);
	for ($i = 0; $i < count($quests); $i++) {
		if ($quests[$i]->id === $userLog->quest_id) {
			$quest = $quests[$i]->name;
		}
	}
}

include_once "models/Questions_Table.class.php";
$questionsTable = new Questions_Table($db);
include_once "models/Victory_Options_Table.class.php";
$victory_optionsTable = new Victory_Options_Table($db);
if (isset($_GET['quest_id'])) {
	$quest_id = $_GET['quest_id'];
}
if (isset($_POST['quest_id'])) {
	$quest_id = $_POST['quest_id'];
}
if (isset($quest_id)) {
	if (!isset($log_id)) {
		for ($i = 0; $i < count($quests); $i++) {
			if ($quests[$i]->id === $quest_id) {
				$quest = $quests[$i]->name;
			}
		}
	}
	$allQuestions = $questionsTable->getQuestions($quest_id);
	$questions = $allQuestions->fetchAll(PDO::FETCH_OBJ);
	$allVictoryOptions = $victory_optionsTable->getVictoryOptions($quest_id);
	$victoryOptions = $allVictoryOptions->fetchAll(PDO::FETCH_OBJ);
}

include_once "models/Options_Table.class.php";
$optionsTable = new Options_Table($db);
if (isset($quest_id)) {
	$options = array();
	for ($i = 0; $i < count($questions); $i++) {
		$optionSet = $optionsTable->getOptions($questions[$i]->id);
		while ($option = $optionSet->fetchObject()) {
			$options[] = $option;
		}
	}
}

if (isset($_POST['edit'])) {
	if ($_POST['edit'] === "Delete") {
		$output = include_once "views/single-log-html.php";
		
	} else if ($_POST['edit'] === "Save" || $_POST['edit'] === "Update") {
		$logFields = array('user_id');
		$logValues = array($_SESSION['user_id']);
		foreach($_POST as $field => $value) {
			if ($field !== "edit" && $field !== "log_id" && $field !== "plus" && $field !== "victory") {
				$logFields[] = $field;
				$logValues[] = htmlspecialchars($value, ENT_QUOTES);
			}
		}
		//save a new log
		if ($_POST['edit'] === "Save") {
			$log_id = $logsTable->saveLog($logFields, $logValues);
			if (isset($_POST['plus'])) {
				for ($i = 0; $i < count($_POST['plus']); $i++) {
					$logs_plusTable->saveLogPlus($log_id, $_POST['plus'][$i][0], htmlspecialchars($_POST['plus'][$i][1]), ENT_QUOTES);
				}
				$userLogPlus = $logs_plusTable->getUserLogPlus($log_id);
				$logPlus = $userLogPlus->fetchAll(PDO::FETCH_OBJ);
			}
			if (isset($_POST['victory'])) {
				for ($i = 0; $i < count($_POST['victory']); $i++) {
					$victory_logsTable->saveVictoryLog($log_id, $_POST['victory'][$i][0], htmlspecialchars($_POST['victory'][$i][1], ENT_QUOTES));
				}
				$userVictoryLog = $victory_logsTable->getVictoryLogs($log_id);
				$victoryLog = $userVictoryLog->fetchAll(PDO::FETCH_OBJ);
			}
			$userLog = $logsTable->getUserLog($log_id);
			$output = include_once "views/single-log-html.php";
		//update an existing log
		} else if ($_POST['edit'] === "Update") {
			$log_id = $_POST['log_id'];
			$logsTable->updateLog($logFields, $logValues, $log_id);
			$userLog = $logsTable->getUserLog($log_id);
			if (isset($_POST['plus'])) {
				for ($i = 0; $i < count($_POST['plus']); $i++) {
					$logs_plusTable->updateLogPlus($_POST['plus'][$i][1], $_POST['plus'][$i][0], $log_id);
				}
				$userLogPlus = $logs_plusTable->getUserLogPlus($log_id);
				$logPlus = $userLogPlus->fetchAll(PDO::FETCH_OBJ);
			}
			if (isset($_POST['victory'])) {
				for ($i = 0; $i < count($_POST['victory']); $i++) {
					$victory_logsTable->updateVictoryLog($_POST['victory'][$i][1], $log_id, $_POST['victory'][$i][0]);
				}
				$userVictoryLog = $victory_logsTable->getVictoryLogs($log_id);
				$victoryLog = $userVictoryLog->fetchAll(PDO::FETCH_OBJ);
			}
			$output = include_once "views/single-log-html.php";
		}
	//setup to edit a log
	} else if ($_POST['edit'] === "Edit") {
		$legend = "Edit Quest Log";
		$output = include_once "views/editor-html.php";
	//select a quest	
	} else if ($_POST['edit'] === "Select") {
		$legend = "New Quest Log";
		$output = include_once "views/editor-html.php";
	//delete an existing log
	} else if ($_POST['edit'] === "Confirm") {
		$victory_logsTable->deleteVictoryLog($log_id);
		$logs_plusTable->deleteLogPlus($log_id);
		$logsTable->deleteLog($log_id);
		$output = include_once "views/select-quest-html.php";
	}
} else if (isset($log_id)) {
	$quest_id = $userLog->quest_id;
	for ($i = 0; $i < count($quests); $i++) {
		if ($quests[$i]->id === $quest_id) {
			$quest = $quests[$i]->name;
		}
	}
	$allQuestions = $questionsTable->getQuestions($quest_id);
	$questions = $allQuestions->fetchAll(PDO::FETCH_OBJ);
	$allVictoryOptions = $victory_optionsTable->getVictoryOptions($quest_id);
	$victoryOptions = $allVictoryOptions->fetchAll(PDO::FETCH_OBJ);
	//prohibit cross-user manip
	if ($_SESSION['user_id'] === $userLog->user_id) {
		$output = include_once "views/single-log-html.php";
	} else {
		$output = include_once "views/select-quest-html.php";
	}
} else {
	$output = include_once "views/select-quest-html.php";
}

return $output;

?>