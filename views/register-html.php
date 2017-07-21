<?php

if (isset($userFormMessage) === false) {
	$userFormMessage = "";
}

return "
<div id='main'>
<div id='register-html'>
<form method='post' action='index.php?page=register'>
	<fieldset>
		<legend>Register your account</legend>
		<table>
		<tr><td><label>Email</label></td>
		<td><input type='text' name='email' placeholder='Email' required/></td></tr>
		</br>
		<tr><td><label>Username</label></td>
		<td><input type='text' name='username' placeholder='Username' required/></td></tr>
		</br>
		<tr><td><label>Password</label></td>
		<td><input type='password' name='password1' placeholder='Password' required/></td></tr>
		</br>
		<tr><td><label>Re-enter Password</label></td>
		<td><input type='password' name='password2' placeholder='Re-enter Password' required/></td></tr>
		</table>
		</br>
		<input type='submit' name='register' value='Register'/>
	</fieldset>
</form>
<p class='messages'>$userFormMessage</p>
</br></br>
</div>
";

?>