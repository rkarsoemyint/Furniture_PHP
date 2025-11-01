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
    
    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $image = $_FILES['image'] ['name'];
        $description = $_POST['description'];

        move_uploaded_file($_FILES['image'] ['tmp_name'], 'image/' .$image);
        $data = "INSERT INTO services(title,image,description) VALUES('$title','$image','$description')";
        if ($connection->query($data)) {
            header('location: about.php');
            exit;
        } else {
            echo "Database Error:" .$connection->error;
        }
    }

    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Create services</h3>

            <input type="text" name="title" placeholder="Enter service title" class="box" required>
            <input type="file" name="image" class="box" required>
            <textarea name="description" placeholder="Enter your description" class="box" required></textarea>
            <input type="submit" name="submit" value="Create Now" class="btn" required>
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>