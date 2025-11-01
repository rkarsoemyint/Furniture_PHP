<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>

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
        $creator = $_POST['creator'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        $image = $_FILES['image'] ['name'];
        $tmp_name = $_FILES['image'] ['tmp_name'];
        

        move_uploaded_file($_FILES['image'] ['tmp_name'], 'image/' .$image);
        $data = "INSERT INTO blogs(title,creator,date,description,image) VALUES('$title','$creator','$date','$description','$image')";
        if ($connection->query($data)) {
            header('location: blog.php');
            exit;
        } else {
            echo "Database Error:" .$connection->error;
        }
    }

    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Create blog</h3>
            
            <input type="text" name="title" placeholder="Enter blog title" class="box" required>
            <input type="text" name="creator" placeholder="Enter creator" class="box" required>
            <input type="date" id="birth_date" name="birth_date" class="box" required>
            <textarea name="description" placeholder="Enter your description" class="box" required></textarea>
            <input type="file" name="image" class="box" required>
            <input type="submit" name="submit" value="Create Now" class="btn" required>
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>