<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Team Member</title>

    <?php include('css.php'); ?>
</head>

<body>
    <?php include('connection.php'); ?>
    <?php include('header.php'); ?>
    <?php include('navbar.php'); ?>

    <?php
    error_reporting(1);
    
    if(isset($_POST['submit'])) {
        $image = $_FILES['image'] ['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        

        move_uploaded_file($_FILES['image']['tmp_name'], 'image/' .$image);
        $data = "INSERT INTO teams(image,name,position) VALUES('$image','$name','$position')";
        if ($connection->query($data)) {
            header('location: team.php');
            exit;
        } else {
            echo "Database Error:" .$connection->error;
        }
    }
    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Create Team Member</h3>

            <input type="file" name="image" class="box" required>
            <input type="text" name="name"  placeholder="Enter your  name" class="box" required>
            <input type="text" name="position" placeholder="Enter your position" class="box" required>
            <input type="submit" name="submit" value="Create Now" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>