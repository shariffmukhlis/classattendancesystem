<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Teacher Menu</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body>
     <?php

    if (!isset($_SESSION['TEACHER'])) {
        // Redirect to the login page if the user is not logged in
        header('Location: login.html');
        exit;
    }
    $teacher = $_SESSION['TEACHER'];
    ?>
    <nav>
        <div class="school">
            <img class="school-logo" src="images/logoMozac.png" alt="">
            <div class="school-name">
                <h3>SMK MUDZAFFAR SHAH</h3>
                <p>Class Attendance System</p>
            </div>
        </div>
        <div id="account">
            <p>
                <?php
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($teacher->images).'" alt="profile" class="profilepic" />';
                ?>
                <h6>
                    <?php 
                    echo $teacher->name;
                    ?>
                </h6>
                <a href="logout.php"><i class="fa fa-sign-out text-white" ></i></a>
            </p>
        </div>
    </nav>
    <menu>
        <a href="teachermain.php" class="btn">Home</a>
        <a href="signattendance.php" class="btn">Sign Attendance</a>
        <a href="reportclass.php" class="btn">Class Report</a>
    </menu>
</body>
</html>