<?php

$userTable = new User_Table($db);

if (isset($_POST['email'])) {
	$userTable->forgotPassword($_POST['email']);
}

$output = include_once "views/forgot-html.php";
return $output;

?>