<!-- Includes Header -->
<?php include("includes/admin_header.php"); ?>
<?php include("includes/functions.php"); ?>

<div id="wrapper">

<!-- Includes Navigation -->
<?php include("includes/admin_navigation.php"); ?>

<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">
            Welcome to Admin
            <small>Md Rubel Amin</small>
          </h1>
            <div class="col-xs-6">
              <!-- Inserting Data into Category [Database] -->
              <form action="" method="post">
                <div class="form-group">
                  <label for="cat_title">Add Category</label>
                  <?php
                    insert_categories();
                  ?>
                  <input type="text" name="cat_title" class="form-control">
                </div>
                <div class="form-group">
                  <input type="submit" name="add_category" value="Add Category" class="btn btn-primary">
                </div>
              </form>
              <!-- Include Edit Categories Form -->
              <?php
                if(isset($_GET['edit'])){
                  $cat_id = $_GET['edit'];
                  include('update_categories.php');
                }
              ?>
            </div> <!-- Add Category Form -->
            <div class="col-xs-6">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Category Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php // Find all Categories
                    findAllCategories();
                  ?>

                  <?php // DELETE Category
                    deleteCategory();
                  ?>
                </tbody>
              </table>
            </div>
        </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

</div><!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Includes Footer -->
<?php include("includes/admin_footer.php"); ?>