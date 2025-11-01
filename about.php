<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

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
        <p><a href="index.php">home</a> / <span>about</span></p>
    </section>

    <!-- heading section end -->



    <!-- about section start -->

    <section class="about">

        <div class="image">
            <img src="image/about-img.jpg" alt="">
        </div>

        <div class="content">
            <span>welcome to our shop</span>
            <h3>we make your home more astonishing</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid fugit labore facere non autem soluta tempora natus, sequi obcaecati esse officia aspernatur impedit dignissimos ut porro praesentium similique numquam magnam.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam sequi illo cum expedita, eius laboriosam? Blanditiis quisquam, iure nisi, ex amet odit obcaecati eaque voluptatibus porro repudiandae sit libero debitis!</p>
            <a href="#" class="btn">read more</a>
        </div>

    </section>

    <!-- about section end -->


    <!-- services section start -->

    <section class="services">

        <h1 class="title"> <span>our services</span> <a href="about_create.php" class="btn title-btn">Add new services</a></h1>

        <div class="box-container">

            <?php

            $query = "SELECT * FROM services ORDER BY id DESC";
            $result = $connection->query($query);
            if ($result && $result ->num_rows > 0){
                while ($row = $result ->fetch_assoc()) {
                    echo '
                    <div class="box">
                    <img src="image/' . htmlspecialchars($row['image']) . '" alt="">
                    <h3>' . htmlspecialchars($row['title']) . '</h3>
                    <p>' . htmlspecialchars($row['description']) . '</p>
                    <a href="about_update.php?id=' . $row['id'] .'" class="btn"><i class ="fas fa-edit"></i></a>
                    <a href="about_delete.php?id=' . $row['id'] .'" class="btn" onclick="return confirm(\'Are you sure to delete this?\')"><i class = "fas fa-trash"></i></a>
                    </div>';
                }
            } else {
                echo "<p style='text-align:center;'>No Service Found.</p>";
            }

            ?>

        </div>

    </section>

    <!-- services section end -->






    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>