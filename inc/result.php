<?php
	require 'db.php';
	require_once 'function/post.php';
	require_once 'function/comment.php';
	
	if (getPostCategory() !== '')
	{
		if (!empty($_POST['add_comment'])) 
		{
			if (validateComment()) 
			{
				saveComment();
			}
		}
	
		if (!empty($_POST['delete_comment'])) 
		{
			deleteComment($_POST['id_comment']);
		}
	}
	
	$category = getPostCategory();
	if ($category) 
	{
		$categoryId = getPostCategoryId($category);
		if ($categoryId)
		{
			allPostsInTheCategory($conn, $categoryId);
		}
	}
?>