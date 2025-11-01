<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Blog</title>

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
        $result = $connection->query("SELECT * FROM blogs WHERE id=$id");
        $row = $result->fetch_assoc();
    } else {
        header('location: blog.php');
        exit;
    }

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $creator = $_POST['creator'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        $image = $_FILES['image'] ['name'];
        $tmp_name = $_FILES['image'] ['tmp_name'];

    if(!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $image);
    

    if(!empty($row['image']) && file_exists('image/' . $row['image'])) {
        unlink('image/' . $row['image']);
    }
    $query = "UPDATE blogs SET title='$title', creator='$creator', date='$date', description='$description', image='$image' WHERE id=$id";
    } else {
        $query = "UPDATE blogs SET title='$title', creator='$creator', date='$date', description='$description' image='$image' WHERE id=$id";
    }

    if($connection->query($query)) {
        header('location: blog.php');
        exit;
    } else {
        echo "Error updating record:" . $connection->error;
    }
}
    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Update blog</h3>
            
            <input type="text" name="title" value="<?php echo $row['title'] ?>" class="box">
            <input type="text" name="creator" value="<?php echo $row['creator'] ?>" class="box">
            <input type="date" id="birth_date" name="birth_date" class="box">
            <textarea name="description" value="<?php echo $row['description'] ?>" class="box"></textarea>
            <input type="file" name="image" class="box">
            <input type="submit" name="submit" value="Update Now" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>