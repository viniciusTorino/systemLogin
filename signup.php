<?php 
	include_once 'header.php';
?>
	<section class="main-container">
		<div class="main-wrapper">
			<h2>Sign Up</h2>
			<form class="signup-form" action="includes/sign.php" method="POST">
				<input type="text" name="first_name" placeholder="First Name">
				<input type="text" name="last_name" placeholder="Last Name">
				<input type="email" name="user_email" placeholder="Email">
				<input type="text" name="user_uid" placeholder="Username">
				<input type="password" name="user_password" placeholder="Password">
				<button type="submit" name="submit">Sign Up</button>
			</form>  
		</div>
	</section>
<?php
	include_once 'footer.php';
?>
