<?php

include_once "models/User_Table.class.php";

$loginFailMessage = "";

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$userTable = new User_Table($db);
	$loginResult = $userTable->checkCredentials($username, $password);
	if ($loginResult[0] === true) {
		$user->login();
	} else {
		if ($loginResult[1] == "unverified") {
			$loginFailMessage = "
			<p class='messages'>Your account has not yet been verified.</br> Please check for your verification email and follow the link provided there.</p>
			<p class='messages'><a href='index.php?page=resend'>Haven't received it?</a></p>
			";
		} else if ($loginResult[1] == "unmatched") {
			$loginFailMessage = "<p class='messages'>Either your username or password did not match an account in our records.</p>";
		}
	}
}

if (isset($_POST['logout'])) {
	$user->logout();
}

if ($user->isLoggedIn()) {
	$view = include_once "views/logout-html.php";
} else {
	if (isset($_GET['page'])) {
		if ($_GET['page'] === "register" || $_GET['page'] === "forgot" || $_GET['page'] === "resend" || $_GET['page'] === "verify" || $_GET['page'] === "reset") {
			$controller = $_GET['page'];
			$view = include_once "controllers/$controller.php";
		} else {
			$view = include_once "views/login-html.php";
		}
	} else {
		$view = include_once "views/login-html.php";
	}
}

return $view;

?>