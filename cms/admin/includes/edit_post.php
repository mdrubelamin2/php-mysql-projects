<?php

if (isset($_GET['p_id'])) {
  $post_id = $_GET['p_id'];
}

  // Select All Posts
  $query = "SELECT * FROM posts WHERE post_id={$post_id}";
  $select_posts_admin = mysqli_query($connection, $query);
  confirmQuery($select_posts_admin);

  while($row = mysqli_fetch_assoc($select_posts_admin)){
  $post_id = $row['post_id'];
  $post_author = $row['post_author'];
  $post_title = $row['post_title'];
  $post_category_id = $row['post_category_id'];
  $post_status = $row['post_status'];
  $post_image = $row['post_image'];
  $post_tags = $row['post_tags'];
  $post_comment_count = $row['post_comment_count'];
  $post_date = $row['post_date'];
  $post_content = $row['post_content'];
  }

  // Edit Post
  if (isset($_POST['edit_post'])) {
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp, "../images/$post_image");
    if(empty($post_image)){
      $query = "SELECT * FROM posts WHERE post_id = $post_id";
      $select_image = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($select_image)) {
        $post_image = $row['post_image'];
      }
    }

    $query = "UPDATE posts SET post_title = '{$post_title}', post_category_id = '{$post_category_id}', post_author = '{$post_author}', post_date = now(), post_status = '{$post_status}', post_tags = '{$post_tags}', post_image = '{$post_image}', post_content = '{$post_content}' WHERE post_id={$post_id}";
    
    $edit_query = mysqli_query($connection, $query);
    confirmQuery($edit_query);
    header("Location: posts.php");
  }

?>

<form action="" method="post" enctype="multipart/form-data">    
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="title">
  </div>

  <div class="form-group">
    <label for="post_category">Post Category</label>
    <select name="post_category_id" class="form-control">
    <?php
      $query = "SELECT * FROM categories";
      $select_categories = mysqli_query($connection, $query);
      confirmQuery($select_categories);
      while($row = mysqli_fetch_assoc($select_categories)){
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];

      echo "<option value=''>{$cat_title}</option>";
      }
    ?>
   </select>
  </div>

  <div class="form-group">
     <label for="title">Post Author</label>
      <input type="text" value="<?php echo $post_author; ?>" class="form-control" name="author">
  </div>

  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" value="<?php echo $post_status; ?>" class="form-control" name="post_status">
  </div>
  
  <div class="form-group">
    <img width="100px" src="../images/<?php echo $post_image; ?>" alt="image">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control" name="image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags">
  </div>
  
  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10"> <?php echo $post_content; ?>
    </textarea>
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_post" value="Update Post">
  </div>


</form>