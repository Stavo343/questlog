<?php

$userTable = new User_Table($db);

if (isset($_GET['key']) === false) {
	$verifyHTML = include_once "views/unverified-html.php";
} else {
	$vericheck = $userTable->checkVerikey($_GET['key']);
	if ($vericheck === "verified") {
		$verifyHTML = include_once "views/verified-html.php";
		$verifyHTML .= include_once "views/login-html.php";
	} else {
		$verifyHTML = include_once "views/unverified-html.php";
	}
}
return $verifyHTML;

?>