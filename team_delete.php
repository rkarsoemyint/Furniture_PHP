<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Category</title>

    <?php include('css.php'); ?>
</head>

<body>
    <?php include('connection.php'); ?>
    <?php include('header.php'); ?>
    <?php include('navbar.php'); ?>

    <?php
    error_reporting(1);
    
    // if(isset($_POST['submit'])) {
        // $title = $_POST['title'];
        // $image = $_FILES['image'] ['name'];
        // $description = $_POST['description'];

    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $result = $connection->query("SELECT image FROM teams WHERE id=$id");
        $row = $result->fetch_assoc();
    

    if(!empty($row['image']) && file_exists('image/' . $row['image'])) {
        unlink('image/' . $row['image']);
    }

    $delete = "DELETE FROM teams WHERE id=$id";
    if($connection->query($delete)) {
        header('location:team.php');
        exit;
    }else {
        echo "Error deleting record:" . $connection->error;
    }
} else {
    header('location: team.php');
    exit;
}

    ?>

    <!-- register form start  -->

        <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Member delete Form</h3>

            <input type="file" name="image" class="box">
            <input type="text" name="name"  value="<?php echo $row['name'] ?>" class="box">
            <input type="text" name="position" value="<?php echo $row['position'] ?>" class="box">
            <input type="submit" name="submit" value="Delete" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>