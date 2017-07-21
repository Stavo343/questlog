<?php

$userTable = new User_Table($db);

if (isset($_POST['newPassword']) === false) {
	$_POST['newPassword'] = "none";
}

if (isset($_GET['key']) === false && $_POST['newPassword'] === false) {
	$keyMatch = "noMatch";
} else if (isset($_GET['key'])) {
	$key = $userTable->verifyKey($_GET['key']);
	if ($key[1]) {
		$keyMatch = "match";
	} else {
		$keyMatch = "noMatch";
	}
} else {
	if ($_POST['password1'] === $_POST['password2']) {
		$userTable->changePassword($_POST['user_id'], $_POST['password1']);
		$keyMatch = "changed";
	} else {
		$keyMatch = "match";
		$userFormMessage = "Passwords do not match!";
	}
}

$resetHTML = include_once "views/reset-html.php";
return $resetHTML;

?>