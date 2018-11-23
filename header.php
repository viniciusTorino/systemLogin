-<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type-"text/css" href="style.css">
	<title></title>
</head>
<body>
	<header>
		<nav>
			<div class="main-wrapper">
				<ul>
				    <li><a href="index.php">Home</a></li>
				</ul>
				<div class="nav-login">
					<form action="includes/login.php" method="post">
						<input type="text" name="user_uid" placeholder="Username/Email" required>
						<input type="password" name="user_password" placeholder="Password" required>
						 <button type="submit" name="submit">Login</button>
					</form>
					<a href="signup.php">Sign Up</a>
				</div>
			</div>
		</nav>
	</header>
