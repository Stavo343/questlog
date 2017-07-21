<?php

$userTable = new User_Table($db);

if (isset($_POST['email'])) {
	$userTable->resendKey($_POST['email']);
}

$output = include_once "views/resend-html.php";
return $output;

?>