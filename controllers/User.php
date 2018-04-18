<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller { 

	/* Uses the getMessagesByPoster function in messages_model and stores the result
	   into a array which wraps the result array so that it can be passed into the view.
	*/
	public function view($name){
		if($name == null)
			echo "Name not specified"; 
		
		$this->load->model('messages_model');
		$data = $this->messages_model->getMessagesByPoster($name);
		$view = array("messages" => $data);
		
		/* If the user is logged in then it will use the isFollowing function in users_model
		   to check if the user if they are following the user who's view page they are on. 
		   If they are then it will normally display the messages. If not then a user button is
		   passed into the view.
		*/
		if(isset($_SESSION['user'])){
			$this->load->model('users_model');
			$user = $this->session->userdata('user');
			$following = $this->users_model->isFollowing($user, $name);
			if(!($following) && $name != $user)
				$view["followButton"] = '<button id="follow">Follow</button>';
			else
				$view["followButton"] = '';
		}else{
		}
		$this->load->view('ViewMessages', $view);
	}
	
	public function login(){
		// Display login view 
		if(isset($_SESSION['user']))
			redirect('user/view/' . $this->session->userdata('user'));
		else
			$this->load->view('Login');
	}
	
	/* If the username and password are valid then it will create a new session
	   and set it to the username of the current user. If not then it will reload
	   the login view with an error message to tell the user that the details were not valid.
	*/
	public function doLogin(){
		$this->load->model('users_model');
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$authenticate = $this->users_model->checkLogin($username, $pass);
		if($authenticate){
			$_SESSION['user'] = $username;
			redirect('user/view/' . $username);
		}else {
			$error['errorMsg'] = 'Incorrect username and/or password!';
			$this->load->view('Login', $error);	
		}
	}
	
	// Clears the session and takes the user back to the login screen.
	public function logout(){
		$this->session->unset_userdata('user');
		$this->session->sess_destroy();
		redirect('user/login');
	}
	
	// Uses the follow function in the users_model to follow the user.
	public function follow($followed){
		$this->load->model('users_model');
		$this->users_model->follow($followed);
		redirect('/user/view/' . $followed);
	}
	
	/* If the session is set then it will loads the view and pass in an array of all the messages
	   of the users that the current logged in user is following.
	*/
	public function feed($name){
		if(!isset($_SESSION['user']))
			redirect('user/login');
		$this->load->model('messages_model');
		$followedMessages = $this->messages_model->getFollowedMessages($name);
		$data = array('messages' => $followedMessages);
		$this->load->view('ViewMessages', $data);
	}
}

?>