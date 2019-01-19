<?php
class loginForm extends database{
	private $username;
	private $password;
	private $randomHash;
	private $ip_address;
	public function __construct( $username, $password ){
		$this->username = removeCodeTags( $username );
		$this->password = removeCodeTags( $password );
		parent::__construct();
	}
	
	public function start(){
		$query = $this->connect()->query("SELECT username,password FROM tbl_users WHERE username='".$this->username."'");
		if($query->num_rows > 0){
			$fetch = $query->fetch_assoc();
			if(password_verify($this->password, $fetch['password'])){
				//CREATE SESSION
				$hash = md5(rand(10000,90000).date('Y-m-d H:i:s'));
				$expiredDate = date('Y-m-d H:i:s', strtotime('+5 minutes'));
				$quu = $this->connect()->query("INSERT INTO tbl_user_sessions(session_hash,session_expire,session_username)VALUES('$hash','$expiredDate','".$this->username."')");
				if($quu){
					$_SESSION['user_username'] = $this->username;
					$_SESSION['user_sessionHash'] = $hash;
					header("Location: dashboard.php");
				}else{
					return "<p style='color:red;'>Can't login</p>";
				}
			}else{
				return "<p style='color:red;'>Username or Password Incorrect</p>";
			}
		}else{
			return "<p style='color:red;'>Username Not Found</p>";
		}
	}
}
$form = new loginForm( $_POST['username'], $_POST['password'] );