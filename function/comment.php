<?php
	function CommentsForm($category, $idpost) 
	{
		print '<form action="index.php" method="POST">
			<input type="hidden" name="add_comment" value="1" />
			<input type="hidden" name="' . $category . '" value="1" />
			<input type="hidden" name="idpost" value="' . $idpost . '" />
			<textarea style="width: 100%" name="comment"></textarea>
			<input type="submit" name="submit" value="Add comment" />
		</form>';
	}

	function validateComment() 
	{
		if (isset($_POST['add_comment'])) 
		{
			if (empty($_POST['comment'])) 
			{
				echo "All fields must be filled!";
				return false;
			}
		}
		return true;
	}
	
	function saveComment() 
	{
		$comment = trim($_POST['comment']);
		$iduser = $_SESSION['id_user'];
		$idpost = $_POST['idpost'];
		$conn = mysqli_connect('localhost', 'root', '', 'webapp');

		$query = "INSERT INTO comments (comment, id_user, id_post) VALUES ('{$comment}','{$iduser}',{$idpost})";
		if(mysqli_query($conn, $query) === TRUE)
		{
			echo "New comment inserted!";
		}
	}

	function deleteComment($idComment)
	{
		$conn = mysqli_connect('localhost', 'root', '', 'webapp');
		$query = "DELETE FROM comments WHERE id_comment = {$idComment} AND id_user = {$_SESSION['id_user']}";
		if(mysqli_query($conn, $query) === TRUE)
		{
			echo "Comment deleted!";
		}
		if(isset($_SESSION['username']) && $_SESSION['username'] === 'admin')
		{
			$comments = "DELETE FROM comments WHERE id_comment = {$idComment}";
		}
		else
		{
			$comments = "DELETE FROM comments WHERE id_comment = {$idComment} AND id_user = {$_SESSION['username']}";
		}
		if(mysqli_query($conn, $comments) === TRUE)
		{
			echo "Comment deleted!";
		}		
	}
	
	function showAllComments($conn, $idPost)
	{ 
		$query = "SELECT * FROM comments WHERE id_post = $idPost";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) 
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$twoquery = "SELECT username FROM users WHERE id_user = " . $row['id_user'];
				$tworesult = mysqli_query($conn, $twoquery);
				$row1 = mysqli_fetch_assoc($tworesult);
?>
				<div class="com">
                <b>Comment from <?php print $row1['username']; ?>:</b> <?php print $row['comment'];
				if ($row['id_user'] === $_SESSION['id_user']) 
				{
					?>
					<form style="float: right;" action="index.php" method="POST">
						<input type="hidden" name="delete_comment" value="1" />
						<input type="hidden" name="id_comment" value="<?php print $row['id_comment']; ?>" />
						<input type="hidden" name="<?php print getPostCategory(); ?>" value="1" />
						<input type="submit" value="Delete"/>
					</form>
					<?php
				}
				?>
				</div>
				<?php
			}
		}	
	} 