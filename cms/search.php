<!-- Database Connection -->
<?php include('includes/db.php'); ?>

<!-- Header -->
<?php include('includes/header.php'); ?>

<!-- Navigation -->
<?php include('includes/navigation.php'); ?>

<!-- Page Content -->
<div class="container"> <!-- Ends in Footer.php -->

<div class="row">

    <!-- Blog  -->
    <div class="col-md-8">

        <!-- Blog Post -->

        <!-- Blog Post PHP Query-->
        <?php

            // <!-- Search Form PHP Query-->
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                // Search Query
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                $search_query = mysqli_query($connection, $query);

                if(!$search_query){
                    die("Query Failed".mysqli_error($connection));
                }

                // If something searched
                $count = mysqli_num_rows($search_query);
                if ($count == 0) {
                    echo "<h1 class='text-danger'>NO Result!</h1>";
                } else{
                    while($row = mysqli_fetch_assoc($search_query)){
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];

        ?> <!-- Search Query Fetched -->

                    <!-- Blog Post Markup -->
                    <h2>
                        <a href="#"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>

        <?php // to Complete Curly Brackets
        } // While Loop Complete 
                } // Else of If Searched Complete
                    } // If of Submit Complete 
        ?>





    </div> <!-- col-md-8 -->

    <!-- Blog Sidebar Column -->
    <?php include('includes/sidebar.php'); ?>


</div> <!-- /.row -->

<hr>

<!-- Footer -->
<?php include('includes/footer.php'); ?>