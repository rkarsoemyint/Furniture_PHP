<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Create</title>

    <?php include('css.php'); ?>
</head>

<body>
    <?php include('connection.php'); ?>
    <?php include('header.php'); ?>
    <?php include('navbar.php'); ?>

    <?php
    error_reporting(1);
    
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $image = $_FILES['image'] ['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file($_FILES['image']['tmp_name'], 'image/' .$image);
        $data = "INSERT INTO products(name,price,quantity,image) VALUES('$name','$price','$quantity','$image')";
        if ($connection->query($data)) {
            header('location: shop.php');
            exit;
        } else {
            echo "Database Error:" .$connection->error;
        }
    }
    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Product Create</h3>

            <input type="text" name="name"  placeholder="Enter your product name" class="box" required>
            <input type="number" name="price" placeholder="Enter your price" class="box" required>
            <input type="number" name="quantity" placeholder="Enter your quantity" class="box" required>
            <input type="file" name="image" class="box" required>
            <input type="submit" name="submit" value="Create Now" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>