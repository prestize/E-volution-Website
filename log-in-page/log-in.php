<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="/log-in-page/design.css">
	<link rel="stylesheet" href="/homepage/styles.css" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<section id="header">
		<h1>E-VOLUTION</h1>
	  </section>
  
	<img class="wave" src="/log-in-page/imgs/wave.png">
	<div class="container">
		<div class="img">
			<img src="/log-in-page/imgs/bg.svg">
		</div>
		<div class="login-content">
			<form action="login-confirm.php" autocomplete="off" method="POST">
				<img src="/log-in-page/imgs/avatar.svg">
				<h2 class="title">Welcome</h2>
				<?php require_once 'messages.php'; ?>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="text" class="input" name="email">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="pass">
            	   </div>
            	</div>
            	 <input type="submit" class="btn" value="Login" style="padding: 0;">
				<a href="/log-in-page/register.php" style="text-align: center;text-decoration: underline;">Sign Up Instead.</a>

            </form>
        </div>
    </div>
    <script type="text/javascript" src="/log-in-page/log-script.js"></script>

</body>
</html>