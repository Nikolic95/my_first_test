<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:../login.php');
	}
?>

<html>
<head>
      <link href="../style.css" rel="stylesheet" type="text/css">
</head>  
<body>   
    <div id="wrapper">
        <div id="search">
            <a href="../index.php"><img src="../strelica.png" height="50px"></a>
            <form action="" method="POST">
                <label>Post:<br/>
                <textarea type="text" name="post"></textarea></label><br/>
                <label>Time:<br/>
                <input type="text" name="time"></label><br/>
                <label>Category:<br/>
                <select name="category">
                    <option value="1">Ekonimija</option>
                    <option value="2">Politika</option>
                    <option value="3">Biznis</option>
                    <option value="4">Drustvo</option>
                </select></label><br/>
                <input type="submit" name="add" value="add"><br/>
            </form>
        </div>
        <div>
            <?php
              if(isset($_POST['add']))
			  {
                  if(isset($_POST['post']) && isset($_POST['time']) && isset($_POST['category']))
				  {
                      if(!empty($_POST{'post'}) && !empty($_POST{'time'})&& !empty($_POST['category']))
					  {
                          $post = trim($_POST['post']);
                          $time = trim($_POST['time']);
                          $category = trim($_POST['category']);
                          $conn = mysqli_connect('localhost', 'root', '', 'webapp');
                          $post = mysqli_real_escape_string($conn, $post);
                          $time = mysqli_real_escape_string($conn, $time);
                          $category = mysqli_real_escape_string($conn, $category);
                                                   
                          $query = "INSERT INTO posts (post, time, id_category) VALUES ('{$post}','{$time}','{$category}')";
                          if(mysqli_query($conn, $query) === TRUE)
						  {
                              echo "A new post has been inserted";
                          }
						  else
						  {
                              echo "Error!";
                          }
                      }
					  else
					  {
                          echo "All fields must be filled!";
                      }
                  }
				  else
				  {
                      echo "All fields must be filled!";
                  }
              }
             ?> 
        </div>
    </div>    
</body> 
</html>