<!DOCTYPE html>

<html>

<head>
	<title><?php echo $this->session->userdata('user');?> | Post Message</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/post.css");?>">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>

<body>	
	<?php $this->load->view('header'); ?>
	<!-- Field for the message to post -->
	<div class="post-container">
		<h3>Type your message below:</h3>
		<?php
		echo form_open('/message/doPost');
		echo form_textarea('messageText');
		?>
		<br />
		<?php
		echo form_submit(array('type' => 'submit', 
								'value' => 'Post Message',
								'name' => 'post',
								'id' => 'postButton'));
		echo form_close();
		?>
	</div>
</body>

</html>