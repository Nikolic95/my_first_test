<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:inc/login.php');
	}
?>
<html>
<head> 
    <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>   
    <div class="container">   
		<a class="float-right" href="logout.php"><img src="logout.png" height="50px"></a>
		<h1>Welcome <?php echo $_SESSION['username']; ?> </h1> 
    </div>
    <div id="wrapper">				
          <header class="header">
            <h2 align="center"><a href="index.php">News</a></h2>
          </header>            
				<nav id="nav">
                    <form action="" method="POST">
					<input type="submit" name="ekonomija" value="Ekonomija">
			        <input type="submit" name="politika" value="Politika">
                    <input type="submit" name="biznis" value="Biznis">
                    <input type="submit" name="drustvo" value="Drustvo">
                        <?php
                         if(isset($_SESSION['username']) && $_SESSION['username'] === 'admin')
						 { 
							?>
							<a href="inc/add.php"><img src="plus.png" height="30px"></a>
							<a href="inc/delete.php"><img src="minus.png" height="30px"></a>
							<?php 
						} 	?>
                    </form>
                </nav>
				<div class="zag">
					<h2>Heep up with the latest news 24 hours with us!</h2>
				</div>
        <?php include 'inc/result.php'; ?>
    </div>   
</body>
</html>