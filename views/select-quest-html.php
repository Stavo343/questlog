<?php

$selectQuestHTML = "";
if (isset($_POST['edit'])) {
	if ($_POST['edit'] === "Confirm") {
		$selectQuestHTML .= "<p>Log was deleted</p></br>";
	}
}

$selectQuestHTML .= "<form method='post' action='index.php?page=editor'>
	<fieldset>
		<legend>Select Quest</legend>
		<table>
			<tr><td>Quest:</label></td>
			<td><select name='quest_id' required>
				<option></option>
				<optgroup label='Core Set'>
";

$quest_set = "Core Set";
for ($i = 1; $i < count($quests); $i++) {
	if ($quests[$i]->quest_set !== $quest_set) {
		$quest_set = $quests[$i]->quest_set;
		$selectQuestHTML .= "</optgroup>
		<optgroup label='$quest_set'>
		";
	}
	$quest_id = $quests[$i]->id;
	$quest_name = $quests[$i]->name;
	$selectQuestHTML .= "<option value='$quest_id'>$quest_name</option>
	";
}

$selectQuestHTML .= "</optgroup>
</select></td></tr></table>
</fieldset>
<fieldset>
	<input type='submit' name='edit' value='Select'/>
</form>
</br>
";

return $selectQuestHTML;