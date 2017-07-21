<?php

if (isset($_GET['key']) || $keyMatch != "match") {
	$userFormMessage = "";
}

if (isset($_GET['key']) === false) {
	$key = array("", "");
}

$resetHTML = "<div id='main'>";

if ($keyMatch == "noMatch") {
	$resetHTML .= "
	<p>That link is invalid.</p>
	<a href='index.php?page=forgot'>Try again</a>
	";
} else if ($keyMatch == "match") {
	$resetHTML .= "
	<form method='post' action='index.php?page=reset'>
		<input type='hidden' name='user_id' value='$key[0]'/>
		<table>
		<tr><td><label>Enter new password</label></td>
		<td><input type='password' name='password1' placeholder='Enter new password' required/></td></tr>
		<tr><td><label>Re-enter new password</label></td>
		<td><input type='password' name='password2' placeholder='Re-enter new password' required/></td></trd>
		<tr><td><input type='submit' value='Reset'/></td></tr>
		</table>
	</form>
	<p class='messages'>$userFormMessage</p>
	</br></br>
	";
} else if ($keyMatch === "changed") {
	$resetHTML .= "
	<p>Your password has been changed!</p>
	<a href='index.php'>Log in</a>
	";
}

$resetHTML .= "</div>";

return $resetHTML;

?>