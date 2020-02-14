<html> 
<head> 
      <link href="../style.css" rel="stylesheet" type="text/css">	  
</head>
    
<body>
    <div id="wrapper">
        <div id="search">
            <a href="../index.php"><img src="../strelica.png" height="50px"></a>
            <?php
               require 'db.php';
               $query = "SELECT * FROM posts";
               $result = mysqli_query($conn, $query);
               if(mysqli_num_rows($result) > 0)
			   {
                   while($row = mysqli_fetch_assoc($result))
				   { 
                       ?>
                        <div id="res">
							<a href="deletePost.php?id_post=<?php echo $row['id_post'] ?>"><img src="../delete.png" height="50px"></a>
							<p><b>Post:</b><?php echo $row['post']; ?></p>
							<p><b>Time:</b><?php echo $row['time']; ?></p>
                        </div>
                       <?php
                   }
               }
			   else
			   {
                   echo "No posts";
               }
            ?>
        </div>  
    </div>    
</body>
</html>