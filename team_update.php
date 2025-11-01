<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create member</title>

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
        $result = $connection->query("SELECT * FROM teams WHERE id=$id");
        $row = $result->fetch_assoc();
    } else {
        header('location: team.php');
        exit;
    }

    if(isset($_POST['submit'])) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        


    if(!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $image);
    

    if(!empty($row['image']) && file_exists('image/' . $row['image'])) {
        unlink('image/' . $row['image']);
    }
    $query = "UPDATE teams SET image='$image', name='$name', position='$position' WHERE id=$id";
    } else {
        $query = "UPDATE teams SET name='$name' WHERE id=$id";
    }

    if($connection->query($query)) {
        header('location: team.php');
        exit;
    } else {
        echo "Error updating record:" . $connection->error;
    }
}
    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>update Team Member</h3>

            <input type="file" name="image" class="box">
            <input type="text" name="name"  value="<?php echo $row['name'] ?>" class="box">
            <input type="text" name="position" value="<?php echo $row['position'] ?>" class="box">
            <input type="submit" name="submit" value="Update Now" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>