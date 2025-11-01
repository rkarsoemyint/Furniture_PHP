<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>

    <?php include('css.php'); ?>

</head>

<body>

    <?php include('connection.php'); ?>

    <?php include('header.php'); ?>


    <?php include('navbar.php'); ?>



    <!-- heading section start -->

    <section class="heading">
        <h3>our shop</h3>
        <p><a href="index.php">home</a> / <span>team</span></p>
    </section>

    <!-- heading section end -->

    <!-- team section start -->

    <section class="team">

        <h1 class="title"> <span>our team</span> <button onclick="window.location.href='team_create.php'" class="btn title-btn">Add new team member</button></h1>

        <div class="box-container">

            <?php

            $query = "SELECT * FROM teams ORDER BY id DESC";
            $result = $connection->query($query);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                        <div class="box">
                            <div class="share">
                                <a href="team_update.php?id=' . $row['id'] . '" ><i class="fas fa-edit"></i></a>
                                <a href="team_delete.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure to delete this?\')"><i class="fas fa-trash"></i></a>
                            </div>
                            <div class="image">
                                <img src="image/' . htmlspecialchars($row['image']) . '" alt=""> 
                            </div>
                            <div class="user">
                                <h3>' . htmlspecialchars($row['name']) . '</h3>
                                <span>' . htmlspecialchars($row['position']) . '</span>
                            </div>
                        </div>
                            ';
                }
            }

            ?>  
        </div>
    </section>

    <!-- team section end -->

    <?php include('footer.php'); ?>

    <?php include('js.php'); ?>

</body>

</html>