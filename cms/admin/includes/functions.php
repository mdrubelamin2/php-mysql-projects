<?php

// Confirm the Query
function confirmQuery($result){
	global $connection;
	if (!$result) {
      die("Query Failed " . mysqli_error($connection));
	}
}

// Insert Categories
function insert_categories(){
	global $connection;
	if(isset($_POST['add_category'])){
	  $cat_title = $_POST['cat_title'];

	  // Check if it is Blank
	  if($cat_title == "" || empty($cat_title)){
	    echo "<h4 class='text-danger'>This field should not be empty</h4>";
	  } else{
	    // Insert Query
	    $query = "INSERT INTO categories(cat_title) VALUES('{$cat_title}')";

	    // Running the Query
	    $create_category_query = mysqli_query($connection, $query);

	    if(!$create_category_query){
	      die ("Category not Added".mysqli_error($connection));
	    }
	  }
	}
}

// Find All Categories
function findAllCategories(){
	global $connection;
	$query = "SELECT * FROM categories";
    $select_categories_admin = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categories_admin)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a class='btn btn-warning btn-xs' href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "<td><a class='btn btn-danger btn-xs' href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "</tr>";
    }
}

// Delete Category
function deleteCategory(){
	global $connection;
	if(isset($_GET['delete'])){
	  $cat_id = $_GET['delete'];

	  // DELETE Query
	  $query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
	  $delete_query = mysqli_query($connection, $query);
	  header("Location: categories.php");
	}
}

?>