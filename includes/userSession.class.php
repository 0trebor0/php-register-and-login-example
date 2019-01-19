<?php
class userSession extends database{
	private $sessionHash;
	private $sessionUsername;
	public function __construct( $session, $username ){
		parent::__construct();
		$this->sessionHash = $session;
		$this->sessionUsername = $username;
		$this->checkSession();
	}
	private function checkSession(){
		$query = $this->connect()->query("SELECT session_expire FROM tbl_user_sessions WHERE session_hash='".$this->sessionHash."' AND session_username='".$this->sessionUsername."'");
		if($query->num_rows > 0){
			$fetch = $query->fetch_assoc();
			if(strtotime($fetch['session_expire']) < strtotime(date('Y-m-d H:i:s'))){
				$this->connect()->query("DELETE FROM tbl_user_sessions WHERE session_hash='".$this->sessionHash."' AND session_username='".$this->sessionUsername."'");
				userLogout();
			}else{
				$this->connect()->query("UPDATE tbl_user_sessions SET session_expire='".date('Y-m-d H:i:s', strtotime('+5 minutes'))."' WHERE session_hash='".$this->sessionHash."' AND session_username='".$this->sessionUsername."'");
			}
		}else{
			userLogout();
		}
	}
}
$session = new userSession( $_SESSION['user_sessionHash'], $_SESSION['user_username']);