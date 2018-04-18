<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/header.css");?>">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<nav>
		<ul>
			<p id="log-info"></p>
			<?php $user = $this->session->userdata('user'); ?>
			<!-- Navigation to the different areas in the site, some are only viewed if the user is logged in -->
			<?php if(isset($_SESSION['user'])){ ?>
			<li><a href="<?php echo site_url('user/view/' . $user); ?>">My Messages</a></li>
			<li><a href="<?php echo site_url('message'); ?>">Post Message</a></li>
			<li><a href="<?php echo site_url('user/feed/' . $user); ?>">Feed</a></li>
			<?php } ?>
			<li><a href="<?php echo site_url('search'); ?>">Search</a></li>
			
			
			<!-- If the session variable is set then it will display who is logged in
			     and it will give the option to the user to logout.
				 If not and the user views someone's page then it will tell the user that
				 they are not logged in and replaces the logout option with a login option
			-->
			<?php if(isset($_SESSION['user'])) {?>
				<script>
					document.getElementById("log-info").innerHTML = "Logged in as: <strong><?php echo $this->session->userdata('user'); ?>";
				</script>
				<li><a href="<?php echo site_url('user/logout'); ?>">Logout</a></li>
			<?php }else{ ?>
				<script>
					document.getElementById('log-info').innerHTML = "Not Logged In";
				</script>
				<li><a href="<?php echo site_url('user/login'); ?>">Login</a></li>
			<?php } ?>
		</ul>
	</nav>
</body>

</html>