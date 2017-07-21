<?php

$resendHTML = "<div id='main'>";

if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$resendHTML .= "<p>If $email matches an unverified account, a verification email will be resent to that address.</p></div>";
} else {
	$resendHTML .= "
	<legend>Resend your verification email</legend>
	<div id='resend-html'>
	<form method='post' action='index.php?page=resend'>
		<label>Email</label>
		<input type='text' name='email' placeholder='Email' required/>
		<input type='submit' value='Submit'/>
	</form>
	</div>
	";
}

return $resendHTML;

?>