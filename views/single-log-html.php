<?php

//need to change?
if (isset($userLog) === false) {
	trigger_error('views/single-log-html.php needs $userLog');
}

$singleLogHTML = "";

if (isset($_POST['edit'])) {
	if ($_POST['edit'] === "Save") {
		$singleLogHTML .= "<p>Log was saved</p>";
	} else if ($_POST['edit'] === "Delete") {
		$singleLogHTML .= "
		<p>Do you want to delete this log?</p>
		<form method='post' action='index.php?page=editor'>
			<input type='hidden' name='log_id' value='$log_id'/>
			<input type='submit' name='edit' value='Confirm'/>
		</form>
		</br>
		";
	} else if ($_POST['edit'] === "Update") {
		$singleLogHTML .= "<p>Log was updated</p>";
	}
}

$singleLogHTML .= "<table>
";

$plusCounter = -1;
for ($i = 0; $i < count($questions); $i++) {
	$question = $questions[$i]->question;
	$questionQuestId = $questions[$i]->quest_id;
	if ($questionQuestId == 1) {
		$logs_column = $questions[$i]->logs_column;
		if ($logs_column === "quest_id") {
			$answer = $quest;
		} else {
			$answer = $userLog->$logs_column;
		}
	} else {
		$plusCounter++;
		$answer = $logPlus[$plusCounter]->answer;
	}
	$singleLogHTML .= "<tr><td>$question:</td><td>$answer</td></tr>
	";
}

$victoryCounter = -1;
$victoryList = "";
if (isset($victoryLog)) {
	for ($i = 0; $i < count($victoryLog); $i++) {
		if ($victoryLog[$i]->acquired === "Yes") {
			$victoryCounter++;
			$victoryObject = $victoryOptions[$i]->victory_option_text;
			if ($victoryCounter === 0) {
				$victoryList .= "$victoryObject";
			} else {
				$victoryList .= ", $victoryObject";
			}
		}
	}
}

$singleLogHTML .= "<tr><td>Victory Display:</td><td>$victoryList</td></tr>";

$singleLogHTML .= "</table>
</br>
<form method='post' action='index.php?page=editor'>
	<input type='hidden' name='log_id' value='$log_id'/>
	<input type='hidden' name='quest_id' value='$quest_id'/>
	<input type='submit' name='edit' value='Edit'/>
	<input type='submit' name='edit' value='Delete'/>
</form>
</br>
</br>
";

return $singleLogHTML;

?>