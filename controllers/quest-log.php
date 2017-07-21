<?php

include_once "models/Logs_Table.class.php";
$logsTable = new Logs_Table($db);
include_once "models/Quests_Table.class.php";
$questsTable = new Quests_Table($db);

if (isset($_GET['sort'])) {
	$sort = "byQuest";
} else {
	$sort = "chronologically";
}
$userLogs = $logsTable->getUserLogs($_SESSION['user_id'], $sort);
$allQuests = $questsTable->getQuests();

if (isset($_GET['id'])) {
	$userLog = $logsTable->getUserLog($_GET['id']);
}
	if (isset($_POST['edit'])) {
		$editStatus = $_POST['edit'];
		$logsAsHTML .= "<p>Log was $editStatus</p>";
	}

$logsAsHTML = include_once "views/quest-log-html.php";

return $logsAsHTML;

?>