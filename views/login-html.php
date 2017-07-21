<?php

$loginHTML = "
<div id='main'>
$loginFailMessage
<div id='login-html'>
<form id='login-form'method='post' action='index.php?page=quest-log'>
	<table>
	<tr><td><label>Username</label></td>
	<td><input placeholder='Username' type='text' name='username' required/></td></tr></br>
	<tr><td><label>Password</label></td>
	<td><input placeholder='Password' type='password' name='password' required/></td></tr>
	</table>
	</br>
	<input type='submit' name='login' value='Log in'/>
</form>
</br>
<p><a href='index.php?page=register'>Register</a></p>";
//<p><a href='index.php?page=forgot'>Forgot your password?</a></p></br></br>
$loginHTML .= "</div>
";

return $loginHTML;

?>