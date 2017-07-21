<?php

include_once "models/User_Table.class.php";

if (isset($_POST['register'])) {
	$newEmail = $_POST['email'];
	$newUsername = $_POST['username'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	if ($password1 === $password2) {
		$userTable = new User_Table($db);
		try {
			$userTable->create($newEmail, $newUsername, $password1);
			//$userFormMessage = "You should receive an email at $newEmail. Follow the link there to activate your account.";
			$userFormMessage = "You've registered! <a href='index.php'>Log in</a>";
		} catch (Exception $e) {
			$userFormMessage = $e->getMessage();
		}
	} else {
		$userFormMessage = "Passwords do not match!";
	}
}

$newUserForm = include_once "views/register-html.php";
return $newUserForm;

?>