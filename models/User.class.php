<?php

class User {
	
	public function __construct() {
		session_start();
	}
	
	private $loggedIn = false;
	
	public function isLoggedIn() {
		if (isset($_SESSION['logged_in'])) {
			$out = $_SESSION['logged_in'];
		} else {
			$out = false;
		}
		return $out;
	}
	
	public function login() {
		$_SESSION['logged_in'] = true;
	}
	
	public function logout() {
		$_SESSION['logged_in'] = false;
		$_SESSION['username'] = false;
		$_SESSION['user_id'] = false;
	}
}

?>