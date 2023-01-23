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
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($admin->images).'" alt="profile" class="profilepic" />';
                ?>
                <h6>
                    <?php 
                    echo $admin->name;
                    ?>
                </h6>
                <a href="logout.php"><i class="fa fa-sign-out text-white" ></i></a>
            </p>
        </div>
    </nav>
    <menu>
        <a href="staffmain.php" class="btn">Home</a>
        <a href="#" class="btn teachermenu">Teacher</a>
        <a href="#" class="btn studentmenu">Student</a>
    </menu>
        <div class="submenu">
            <ul class ="teachersubmenu">
                <li><a href="searchteacher.php">Search Teacher</a></li>
                <li><a href="registerteacher.php">Add Teacher</a></li>
            </ul>
            <ul class ="studentsubmenu">
                <li><a href="searchstudent.php">Search Student</a></li>
                <li><a href="registerstudent.php">Add Student</a></li>
            </ul>
        </div>
</body>
</html>