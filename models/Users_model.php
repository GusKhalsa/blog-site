<?php 

class Users_model extends CI_Model {
	
	public function __construct() {
		//loads the database library
		parent::__construct();
		$this->load->database();
	}
	
	// Checks if the username and password entered are valid.
	public function checkLogin($username, $pass){
		$check = 'SELECT username, password FROM Users WHERE username = ? AND password = ?';
		$query = $this->db->query($check, array($username, sha1($pass)));
		if($query->num_rows() != 0){
			return true;
		}else{
			return false;
		}
	}
	
	// Checks to see if a user is followed to another user. If they are then true is return or else false is.
	public function isFollowing($follower, $followed){
		$check = 'SELECT * FROM User_Follows WHERE follower_username = ? AND followed_username = ?';
		$query = $this->db->query($check, array($follower, $followed));
		if($query->num_rows() != 0){
			return true;
		}else{
			return false;
		}
	}
	
	/* If the current logged in user is not followed to the user then it will insert the follower and followed into
	   the database.
	*/
	public function follow($followed){
		$user = $this->session->userdata('user');
		$this->load->model('users_model');
		if(!($this->users_model->isFollowing($user, $followed))){
			$addFollow = 'INSERT INTO User_Follows (follower_username, followed_username) VALUES (?, ?)';
			$this->db->query($addFollow, array($user, $followed));
		}
	}
}

?>
