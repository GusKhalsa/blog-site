<!DOCTYPE html>

<html>

<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/messages.css");?>">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Quicksand:300" rel="stylesheet">
		
		<title><?php echo $this->session->userdata('user'); ?> | Messages</title>
</head>

<body onload="document.body.style.opacity = '1';">
	<?php $this->load->view('header'); ?>
	
	<!-- If the follow button variable has been declared then it will appear for those
		 that are not followed to the current logged in user. 
	-->
	<?php
		if(isset($followButton)){
			echo form_open('/user/follow/' . $this->uri->segment(3)); 
			echo $followButton;
			echo form_close();
		}else{}
	?>
	
	<!-- Table to store each message -->
	<div class="msg-container">
		<?php foreach($messages as $msg) { ?>
		<table>
			<tr>
				<td id="post-date"><em><?php echo $msg['posted_at']; ?></em></td>
				<td id="user"><?php echo $msg['user_username']; ?></td>
			</tr>
			<tr>
				<td id="msg" colspan="2"><?php echo $msg['text']; ?></td>
			</tr>
		</table>
		<?php } ?>
	</div>

</body>

</html>