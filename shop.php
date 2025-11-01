<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <?php include('css.php'); ?>

</head>

<body>

    <?php include('connection.php'); ?>


    <?php include('header.php'); ?>

    <?php include('navbar.php'); ?>

    <!-- heading section start -->

    <section class="heading">
        <h3>our shop</h3>
        <p><a href="index.php">home</a> / <span>shop</span></p>
    </section>

    <!-- heading section end -->


    <!-- category section start -->

    <section class="category">
        <h1 class="title"> <span>our categories</span> <a href="category_create.php" class="btn title-btn">Add new category</a> </h1>

        <div class="box-container">

            <?php

            $query = "SELECT * FROM categories ORDER BY id DESC";
            $result = $connection->query($query);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="box">
                    <img src="image/' . htmlspecialchars($row['image']) . '" alt="">
                    <h3>' . htmlspecialchars($row['name']) . '</h3>
                    <a href="category_update.php?id=' . $row['id'] . '" class="btn"><i class ="fas fa-edit"></i></a>
                    <a href="category_delete.php?id=' . $row['id'] . '" class="btn" onclick="return confirm(\'Are you sure to delete this?\')"><i class = "fas fa-trash"></i></a>
                    </div>';
                }
            } else {
                echo "<p style='text-align:center;'>No Service Found.</p>";
            }

            ?>

        </div>
    </section>


    <!-- category section end -->


    <!-- products section start -->

    <section class="products">
        <h1 class="title"> <span>our products</span> <button onclick="window.location.href='product_create.php'" class="btn title-btn">Add new product</button></h1>

        <div class="box-container">

                <?php

                $query = "SELECT * FROM products ORDER BY id DESC";
                $result = $connection->query($query);
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                    <div class="box">
                        <div class="icons">
                            <a href="product_update.php?id=' . $row['id'] . '"><i class ="fas fa-edit"></i></a>
                            <a href="product_delete.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure to delete this?\')"><i class = "fas fa-trash"></i></a>
                        </div>
                        <div class="image">
                            <img src="image/' . htmlspecialchars($row['image']) . '" alt="">
                        </div>
                        <div class="content">
                            <div class="price">' . htmlspecialchars($row['price']) . '</div>
                            <h3>' . htmlspecialchars($row['name']) . '</h3>
                    
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span> (50) </span>
                            </div>
                        </div>
                    </div>
                        
                    ';
                    }
                }

                ?>
        </div>
    </section>

    <!-- products section end -->

    <?php include('footer.php'); ?>

    <?php include('js.php'); ?>

</body>

</html>