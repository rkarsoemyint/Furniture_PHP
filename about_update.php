<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Services</title>

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
        $result = $connection->query("SELECT * FROM services WHERE id=$id");
        $row = $result->fetch_assoc();
    } else {
        header('location: about.php');
        exit;
    }

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];

    if(!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $image);
    

    if(!empty($row['image']) && file_exists('image/' . $row['image'])) {
        unlink('image/' . $row['image']);
    }
    $query = "UPDATE services SET title='$title', description='$description', image='$image' WHERE id=$id";
    } else {
        $query = "UPDATE services SET title='$title', description='$description' WHERE id=$id";
    }

    if($connection->query($query)) {
        header('location: about.php');
        exit;
    } else {
        echo "Error updating record:" . $connection->error;
    }
}
    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Update services</h3>

            <input type="text" name="title" value="<?php echo $row['title'] ?>" class="box">
            <input type="file" name="image" class="box">
            <textarea name="description" class="box"><?php echo $row['description'] ?></textarea>
            <input type="submit" name="submit" value="Update Now" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>