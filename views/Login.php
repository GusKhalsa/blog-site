<!DOCTYPE html>

<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/login_screen.css");?>">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>

<body>
	<div class="login-container">
		<!-- If the user submits the login form and it does not perform the action because the
			 username and/or password is not recognised then an error message will display.
		-->
		
		<?php 
			if(isset($_POST['submit'])){
				echo $errorMsg;
			}else{
				echo "";
			}
			//Login form fields
			echo form_open('/user/dologin'); //Default POST method
		?>
			<strong>Username</strong>
		<?php
			echo form_input(array('name' => "username",
							       'id' => "username",
								   'required' => 'required'));
		?> 
			<br />
			<strong>Password</strong>
		<?php
			echo form_password(array('name' => "password",
								     'id' => "password", 
									 'required' => 'required'));
		?> <br />
		<?php
			echo form_submit(array('type' => 'submit', 
									'value' => 'Login',
									'name' => 'submit',
									'id' => 'loginButton'));
			echo form_close();
		?>
	</div>
</body>

</html>