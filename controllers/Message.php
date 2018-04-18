<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
	
	// Loads the post view if the user is logged in.
	public function index(){
		if(!isset($_SESSION['user'])){
			redirect('/user/login');
		}else{
		}
		
		$this->load->view('Post');
	}
	
	/* Obtains the users message and inserts the message in the database so that it 
	   shows up in the ViewMessages view.
	*/
	public function doPost(){
		if(!isset($_SESSION['user'])){
			redirect('/user/login');
		}else{
		}
		
		$this->load->model('messages_model');
		$username = $this->session->userdata('user');
		$msgText = $this->input->post('messageText');
		$this->messages_model->insertMessage($username, $msgText);
		redirect('/user/view/' . $username);
	}
}

?>