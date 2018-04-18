<!DOCTYPE html>

<html>

<head>
	<title><?php echo $this->session->userdata('user');?> | Search</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/search.css");?>">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

</head>

<body>
	<?php
	$this->load->view('header');
	?>
	<!-- Field for search terms which uses the dosearch action when submitted -->
	<div class="search-container">
		<h3>Enter search terms below:</h3>
		<?php 
		echo form_open('/search/dosearch', array('method'=>'get'));
		echo form_input('searchText');
		?>
		<br />
		<?php
		echo form_submit(array('type' => 'submit', 
								'value' => 'Search',
								'name' => 'search',
								'id' => 'searchButton'));
		echo form_close();
		?>
	</div>

</body>

</html>