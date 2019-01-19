<?php
class database{
	private $host;
	private $username;
	private $password;
	private $db;
	private $session;
	protected function __construct(){
		$this->host = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->db = "socialMoments";
		$this->createTables();
	}
	protected function connect(){
		if($this->session == null){
			$this->session = new mysqli($this->host, $this->username, $this->password, $this->db);
			return $this->session;
		}else{
			return $this->session;
		}
	}
	private function createTables(){
		$this->connect()->query("CREATE TABLE IF NOT EXISTS tbl_users(
		id INT NOT NULL AUTO_INCREMENT,
		username VARCHAR(255) NOT NULL,
		email VARCHAR(255) NOT NULL,
		password VARCHAR(255) NOT NULL,
		PRIMARY KEY(id))");
		$this->connect()->query("CREATE TABLE IF NOT EXISTS tbl_user_sessions(
		id INT NOT NULL AUTO_INCREMENT,
		session_hash TEXT NOT NULl,
		session_username TEXT NOT NULL,
		session_expire DATETIME NOT NULL,
		PRIMARY KEY(id))");
	}
}