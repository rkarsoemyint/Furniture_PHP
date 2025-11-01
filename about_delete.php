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
    
    // if(isset($_POST['submit'])) {
        // $title = $_POST['title'];
        // $image = $_FILES['image'] ['name'];
        // $description = $_POST['description'];

    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $result = $connection->query("SELECT image FROM services WHERE id=$id");
        $row = $result->fetch_assoc();
    

    if(!empty($row['image']) && file_exists('image/' . $row['image'])) {
        unlink('image/' . $row['image']);
    }

    $delete = "DELETE FROM services WHERE id=$id";
    if($connection->query($delete)) {
        header('location:about.php');
        exit;
    }else {
        echo "Error deleting record:" . $connection->error;
    }
} else {
    header('location: about.php');
    exit;
}

    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Delete Service</h3>

            <input type="text" name="title" placeholder="Enter service title" class="box">
            <input type="file" name="image" class="box">
            <textarea name="description" placeholder="Enter your description" class="box"></textarea>
            <input type="submit" name="submit" value="Delete" class="btn">
            <input type="submit" name="submit" value="Back" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>