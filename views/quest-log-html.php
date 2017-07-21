<?php

if (isset($userLogs) === false) {
	trigger_error('views/quest-log-html.php needs $userLogs');
}

if (isset($_GET['sort'])) {
	$logsAsHTML = "Sort:  By Quest - <a href='index.php'>Chronologically</a></br></br>";
} else {
	$logsAsHTML = "Sort:  <a href='index.php?page=quest-log&sort=byQuest'>By Quest</a> - Chronologically</br></br>";
}

$logsAsHTML .= "
<div id='log-list'>
<ul>
";

$eachQuest = $allQuests->fetchAll(PDO::FETCH_OBJ);

while ($log = $userLogs->fetchObject()) {
	for ($i = 0; $i < count($eachQuest); $i++) {
		if ($eachQuest[$i]->id === $log->quest_id) {
			$quest = $eachQuest[$i]->name;
			break;
		}
	}
	$href = "index.php?page=editor&amp;log_id=$log->id";
	$logsAsHTML .= "<li><a class='log-list-entry' href='$href'>$log->date $quest</a></li>";
}
$logsAsHTML .= "</ul></div></br></br>";



return $logsAsHTML;

?>