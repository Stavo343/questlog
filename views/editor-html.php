<?php

$editorHTML = "";
$saveOrUpdate = "Save";

if (isset($_POST['edit'])) {
	if ($_POST['edit'] === "Edit") {
		$saveOrUpdate = "Update";
	}
}

$editorHTML .= "
<form method='post' action='index.php?page=editor'>";
if ($saveOrUpdate === "Update") {
	$editorHTML .= "<input type='hidden' name='log_id' value='$log_id'/>
	";
}
$editorHTML .= "<fieldset>
		<legend>$legend</legend>
		<div id='quest-log-form'>
		<table>
		";
		
$plusCounter = -1;
for ($i = 0; $i < count($questions); $i++) {
	$question_type = $questions[$i]->question_type;
	$question = $questions[$i]->question;
	$question_id = $questions[$i]->id;
	$questionQuestId = $questions[$i]->quest_id;
	if ($questionQuestId == 1) {
		$name = $questions[$i]->logs_column;
	} else {
		$plusCounter++;
		$name = "plus[$plusCounter][1]";
		//possibly optimal to move this to right after the switch statement
		$editorHTML .= "<input type='hidden' name='plus[$plusCounter][0]' value='$question_id'/>";
	}
	
	if (isset($userLog) && $name !== "plus[$plusCounter][1]") {
		$value = htmlspecialchars_decode($userLog->$name);
	} else {
		$value = "";
	}
	if ($name === "plus[$plusCounter][1]") {
		if (isset($logPlus)) {
			$value = htmlspecialchars_decode($logPlus[$plusCounter]->answer);
		} else {
			$value = "";
		}
	}
	
	switch ($question_type) {
		case "quest":
			$editorHTML .= "<tr><td><label>Quest:</label></td>
			<input type='hidden' name='quest_group' value='$quest_group'/>
			<input type='hidden' name='$name' value='$quest_id'/>
			<td>$quest</td></tr>
			";
			break;
		case "date":
			$editorHTML .= "<tr><td><label>Date:</label></td>
			<td><input type='date' name='$name' value='$value' placeholder='yyyy-mm-dd' required/></td></tr>";
			break;
		case "text":
			$editorHTML .= "<tr><td><label>$question:</label></td>
			<td><input type='text' name='$name' value='$value'/></td></tr>
			";
			break;
		case "textarea":
			$editorHTML .= "<tr><td><label>$question:</label></td>
			<td><textarea name='$name'>$value</textarea></td></tr>
			";
			break;
		case "checkbox":
			if ($value === "Yes") {
				$checked = "checked='checked'";
			} else {
				$checked = "";
			}
			$editorHTML .= "<tr><td><label>$question:</label></td>
			<input type='hidden' name='$name' value=''/>
			<td><input type='checkbox' name='$name' value='Yes' $checked /></td></tr>
			";
			break;
		case "select":
			$editorHTML .= "<tr><td><label>$question:</label></td>
			<td><select name='$name' value='$value'>
			<option>$value</option>
			";
			for ($j = 0; $j < count($options); $j++) {
				if ($options[$j]->question_id === $question_id) {
					$option_text = $options[$j]->option_text;
					$editorHTML .= "<option value='$option_text'>$option_text</option>
					";
				}
			}
			$editorHTML .= "</select></td></tr>
			";
			break;
		default:
			break;
	}
}

$editorHTML .= "<tr><td><label>Victory Display:</label></td></tr>";
for ($i = 0; $i < count($victoryOptions); $i++) {
	$option = $victoryOptions[$i]->victory_option_text;
	$id = $victoryOptions[$i]->id;
	if (isset($victoryLog)) {
		$value = $victoryLog[$i]->acquired;
	} else {
		$value = "";
	}
	if ($value === "Yes") {
		$checked = "checked='checked'";
	} else {
		$checked = "";
	}
	$editorHTML .= "<tr><td><input type='hidden' name='victory[$i][0]' value='$id'/>
	<input type='hidden' name='victory[$i][1]' value='No'/>
	</td><td>$option</td><td><input type='checkbox' name='victory[$i][1]' value='Yes' $checked/></td></tr>";
}

$editorHTML .= "</table></br>
		<fieldset>
			<input type='submit' name='edit' value='$saveOrUpdate'/>
		</fieldset>
	</div>
	</fieldset>
</form>
</br>
</br>
";

return $editorHTML;