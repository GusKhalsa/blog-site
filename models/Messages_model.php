<?php


class Messages_model extends CI_Model {
	
	// Loads the database library 
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	// Obtains the messages from the database that are from the name specified in the parameter
	public function getMessagesByPoster($name){
		$userMessages = 'SELECT * FROM Messages WHERE user_username = ? ORDER BY posted_at DESC';
		$query = $this->db->query($userMessages, $name);
		return $query->result_array();
	}
	
	/* Uses the string parameter to search if there are any messages in the database that
	   contains the search string and returns them in an array.
	*/
	public function searchMessages($string){
		
		$searchMessages = 'SELECT * FROM Messages WHERE text LIKE ? ORDER BY posted_at DESC';
		$query = $this->db->query($searchMessages, '%' . $string . '%');
		return $query->result_array();
	}
	
	// Inserts the message and the user that is logged in when posting the message along with the current date/time
	public function insertMessage($poster, $string){
		$insert = 'INSERT INTO Messages (user_username, text, posted_at) VALUES (?, ?, "' . date('Y-m-d H:i:s') . '")';
		$this->db->query($insert, array($poster, $string));
	}
	
	/* Gets the messages of all the users that the current logged in user follows. 
	*/
	public function getFollowedMessages($name){
		$followedMessages = 'SELECT * FROM Messages WHERE user_username IN(SELECT followed_username FROM User_Follows WHERE follower_username = ?) ORDER BY posted_at DESC';
		$query = $this->db->query($followedMessages, $name);
		return $query->result_array();
	}
	
}

?>