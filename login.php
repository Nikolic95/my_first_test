<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
</head>
<body> 
	<div class="hed">
		<h3>If you are not registered then register!<br> But if you are registered, sign up and follow the latest vesters! <br>Thank you for your trust :)</h3>
	</div>
	<div class="box">
		<div class="row">
			<div class="login">
				<h3>Registration Users</h3>
				<form action="inc/registration.php" method="post">
					<div>
						<label>Username:</label>
						<input type="text" name="username" class="form-control">
					</div> 
					<div>
						<label>Password:</label>
						<input type="password" name="password" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>    
			<div class="login">
				<h3>Login Users</h3>
				<form action="inc/validation.php" method="post">
					<div>
						<label>Username:</label>
						<input type="text" name="username" class="form-control">
					</div>
					<div>
						<label>Password:</label>
						<input type="password" name="password" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
                  </form>
			</div>    
       </div> 
    </div>
</body>
</html>