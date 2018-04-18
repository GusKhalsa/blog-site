<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	//Loads the search view
	public function index(){
		$this->load->view('Search');
	}
	
	// Searches for messages containing the search string and passes them into the view.
	public function dosearch(){
		$this->load->model('messages_model');
		$searchString = $this->input->get('searchText');
		$getMessages = $this->messages_model->searchMessages($searchString);
		$data = array("messages" => $getMessages);
		$this->load->view('ViewMessages', $data);	
	}
}

?>