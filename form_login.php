<!doctype html>
<html>
<head>
    <tittle></tittle>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
<link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <!-- <h3>Login</h3> -->
    <div class="container">
	<div class="screen">
		<div class="screen__content">
		<h1 class="logo">RH Clinic Pet</h1><hr>
			<form class="login" method="post" action="login.php">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" name="username" placeholder="User name">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" name="password" id="pass" placeholder="Password">
				</div>
				<button class="button login__submit" type="submit" name="login">
					<span class="button__text"  >Log In</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
				<button class="button" type="submit" name="Register">
					<a href="add_user.php" class="btn-end">Register</a>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
				<!-- <h3>log in via</h3> -->
				<div class="social-icons">
					<!-- <a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a> -->
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>
	</div>
</div>

    <script>
        function show() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text"
            }   else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>