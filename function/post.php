<?php
	function getPostCategory()
	{
		$categories = array(
			'ekonomija',
			'politika',
			'biznis',
			'drustvo');
		
		foreach ($categories as $category) 
		{
			if (isset($_POST[$category])) 
			{
				return $category;
			}
		}
		return false;
	}	

	function getPostCategoryId($category)
	{
		$categories = array(
			'ekonomija' => 1,
			'politika' => 2,
			'biznis' => 3,
			'drustvo' => 4);
		if (isset($categories[$category])) 
		{
			return $categories[$category];
		}
		return false;
	}
	
	function allPostsInTheCategory($conn, $categoryId)
	{
		$query = "SELECT * FROM posts WHERE id_category = $categoryId";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				?> 
				<div id="res">
					<p><b>Post:</b> <?php echo $row['post']; ?></p>
					<p><b>Time:</b> <?php echo $row['time']; ?></p>
				</div>
				<?php
				showAllComments($conn, $categoryId);
				CommentsForm(getPostCategory(), $row['id_post']);
			}
		}
		else
		{
			echo 'No results';
		}
	} 
	?>