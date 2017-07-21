<?php

$forgotHTML = "<div id='main'>";

if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$forgotHTML .= "<div id='forgot-html'>If $email matches an account, a password reset email will be sent to that address.</br></br></div>";
} else {
	$forgotHTML .= "
	<legend>Reset your password</legend>
	<div id='forgot-html'>
	<form method='post' action='index.php?page=forgot'>
		<label>Email</label>
		<input type='text' name='email' placeholder='Email' required/>
		<input type='submit' value='Submit'/>
	</form>
	</div>
	";
}

return $forgotHTML;

?>