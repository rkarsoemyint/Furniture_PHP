<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>

    <?php include('css.php'); ?>
</head>

<body>
    <?php include('connection.php'); ?>
    <?php include('header.php'); ?>
    <?php include('navbar.php'); ?>

    <?php
    error_reporting(1);
    
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $result = $connection->query("SELECT * FROM products WHERE id=$id");
        $row = $result->fetch_assoc();
    } else {
        header('location: shop.php');
        exit;
    }

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];


    if(!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $image);
    

    if(!empty($row['image']) && file_exists('image/' . $row['image'])) {
        unlink('image/' . $row['image']);
    }
    $query = "UPDATE products SET name='$name', image='$image' WHERE id=$id";
    } else {
        $query = "UPDATE products SET name='$name' WHERE id=$id";
    }

    if($connection->query($query)) {
        header('location: shop.php');
        exit;
    } else {
        echo "Error updating record:" . $connection->error;
    }
}
    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Product Update</h3>

            <input type="text" name="name" value="<?php echo $row['name'] ?>" class="box">
            <input type="number" name="price" value="<?php echo $row['price'] ?>" class="box">
            <input type="number" name="quantity" value="<?php echo $row['quantity'] ?>" class="box">
            <input type="file" name="image" class="box">
            <input type="submit" name="submit" value="Update Now" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>