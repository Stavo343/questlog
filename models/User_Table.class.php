<?php

include_once "models/Table.class.php";

class User_Table extends Table {
	
	public function create($email, $username, $password) {
		$this->checkUsername($username);
		$this->checkEmail($email);
		$verify = 12345;
		//$verify = bin2hex(random_bytes(20));
		//figure out how to do email hyperlinks
		$message = wordwrap("Hello $username,\nWelcome to the Quest Log!\nFollow the link below to verify your account\n127.0.0.1/quest log/index.php?page=verify&key=$verify", 70);
		mail($email, "Account Verification", $message);
		$sql = "INSERT INTO users(email, username, password, active, verify) VALUES (?, ?, MD5(?), ?, ?)";
		$data = array($email, $username, $password, 1, $verify);
		$this->makeStatement($sql, $data);
	}
	
	private function checkUsername($username) {
		$sql = "SELECT username FROM users WHERE username = ?";
		$data = array($username);
		$statement = $this->makeStatement($sql, $data);
		if ($statement->rowCount() === 1) {
			$e = new Exception("Error: '$username' already used!");
			throw $e;
		}
	}
	
	private function checkEmail($email) {
		$sql = "SELECT email FROM users WHERE email = ?";
		$data = array($email);
		$statement = $this->makeStatement($sql, $data);
		if ($statement->rowCount() === 1) {
			$e = new Exception("Error: '$email' already used!");
			throw $e;
		}
	}
	
	public function checkCredentials($username, $password) {
		$sql = "SELECT id, username, active FROM users WHERE username = ? AND password = MD5(?)";
		$data = array($username, $password);
		$statement = $this->makeStatement($sql, $data);
		if ($statement->rowCount() === 1) {
			$userInfo = $statement->fetchObject();
			if ($userInfo->active == 0) {
				$out = array(false, "unverified");
			} else {
				$_SESSION['user_id'] = $userInfo->id;
				$_SESSION['username'] = $userInfo->username;
				$out = array(true);
			}
		} else {
			$out = array(false, "unmatched");
		}
		return $out;
	}
	
	public function checkVerify($key) {
		$sql = "SELECT user_id, username, active FROM users WHERE verify = ?";
		$data = array($key);
		$statement = $this->makeStatement($sql, $data);
		if ($statement->rowCount() === 1) {
			try {
				$sql2 = "UPDATE users SET active = ?, verify = ? WHERE verify = ?";
				$data2 = array(1, 0, $key);
				$statement2 = $this->makeStatement($sql2, $data2);
				$out = "verified";
			} catch (Exception $e) {
				
			}
		} else {
			$out = "unverified";
		}
		return $out;
	}
	
	public function forgotPassword($email) {
		$sql = "SELECT username FROM users WHERE email = ?";
		$data = array($email);
		$statement = $this->makeStatement($sql, $data);
		if ($statement->rowCount() === 1) {
			$row = $statement->fetchObject();
			$username = $row->username;
			$verify = 12345;
			//$verify = bin2hex(random_bytes(20));
			$sql = "UPDATE users SET verify = ? WHERE email = ?";
			$data = array($verify, $email);
			$updateStatement = $this->makeStatement($sql, $data);
			$message = wordwrap("Hello $username,\nFollow the link below to reset your password\n127.0.0.1/quest log/index.php?page=reset&key=$verify", 70);
			mail($email, "Password Reset", $message);
		}		
	}
	
	public function resendKey($email) {
		$sql = "SELECT username, verify FROM users WHERE email = ?";
		$data = array($email);
		$statement = $this->makeStatement($sql, $data);
		if ($statement->rowCount() === 1) {
			$row = $statement->fetchObject();
			$username = $row->username;
			$verify = $row->verify;
			$message = wordwrap("Hello $username,\nWelcome to the Quest Log!\nFollow the link below to verify your account\n127.0.0.1/quest log/index.php?page=verify&key=$verify", 70);
			mail($email, "Account Verification", $message);
		}		
	}
	
	public function verifyKey($key) {
		$sql = "SELECT user_id, verify from users WHERE verify = ?";
		$data = array($key);
		$statement = $this->makeStatement($sql, $data);
		if ($statement->rowCount() === 1) {
			$row = $statement->fetchObject();
			if ($row->verify === $key) {
				$key = array($row->user_id, true);
			} else {
				$key = array(0, false);
			}
		} else {
			$key = array(0, false);
		}
		return $key;
	}
	
	public function changePassword($user_id, $newPassword) {
		$sql = "UPDATE users SET password = MD5(?), verify = ? WHERE user_id = ?";
		$data = array($newPassword, 0, $user_id);
		$statement = $this->makeStatement($sql, $data);
	}
}

?>