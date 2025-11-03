<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <?php include('css.php'); ?>

</head>

<body>

    <?php
    // session_start();

    // if (!isset($_SESSION['username'])) {
    //     header('Location: login.php');
    //     exit();
    // }
    ?>

    <?php include('connection.php'); ?>

    <?php include('header.php'); ?>


    <?php include('navbar.php'); ?>

    <!-- heading section start -->

    <section class="heading">
        <h3>our shop</h3>
        <p><a href="index.php">home</a> / <span>blog</span></p>
    </section>

    <!-- heading section end -->

    <!-- blog section start -->

    <section class="blog">
        <h1 class="title"> <span>our blogs</span> <a href="blog_create.php" class="btn title-btn">Add new blog</a></h1>

        <div class="box-container">
            <?php

            $query = "SELECT * FROM blogs ORDER BY id DESC";
            $result = $connection->query($query);
            if ($result && $result ->num_rows > 0){
                while ($row = $result ->fetch_assoc()) {
                    echo '
                    <div class="box">
                        <div class="image">
                            <img src="image/' . htmlspecialchars($row['image']) . '" alt="">
                        </div>
                        <div class="content">
                            <h3>' . htmlspecialchars($row['title']) . '</h3>
                            <p>' . htmlspecialchars($stmt->error) . '</p>
                            <p>' . htmlspecialchars($row['description']) . '</p>
                            <a href="blog_update.php?id=' . $row['id'] .'" class="btn"><i class ="fas fa-edit"></i></a>
                            <a href="blog_delete.php?id=' . $row['id'] .'" class="btn" onclick="return confirm(\'Are you sure to delete this?\')"><i class = "fas fa-trash"></i></a>
                            
                            <div class="icons">
                                <a href="#"><i class="fas fa-calendar"></i> ' . date('jS M, Y', strtotime($row['date'])) . '</a>
                                <a href="#"><i class="fas fa-user"></i> by ' . htmlspecialchars($row['creator']) . '</a>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "<p style='text-align:center;'>No Service Found.</p>";
            }

            ?>
        </div>
        
        </div>
    </section>

    <!-- blog section end -->



    <?php include('footer.php'); ?>

    <?php include('js.php'); ?>

</body>

</html>