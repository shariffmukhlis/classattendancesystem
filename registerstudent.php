<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/mainmenu.css">
    <title>Class Attendance System</title>
</head>
<body>
    <?php

include("admin.php");
include("dbconn.php");
session_start();
if (!isset($_SESSION['ADMIN'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.html');
    exit;
}
$admin = $_SESSION['ADMIN'];
$sql = "select class_name from class";
$resultclass = $conn->query($sql);
if($resultclass->num_rows>0){
$options = mysqli_fetch_all($resultclass, MYSQLI_ASSOC);
}
include("staffhead.php");

    ?>
    <section id="teachermain">
         <h1>INSERT INFORMATION STUDENT </h1>
    <form id="formstudent" name="formstudent" method="post" action="addstudent.php">

    <table cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <div class="input">
                    <label for="name">Name</label> <br>
                    <input class = "input" type="text" name="name" id="name" placeholder="Student Name">
                </div>
            </td>
            <td>
                <div class="input">
                    <label for="email">Email</label> <br>
                    <input class="input" type="email" name="email" id="email" placeholder="Email Address">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="input">
                    <label for="phone">No Phone</label> <br>
                    <input  class="input"type="text" name="phone" id="phone" placeholder="Phone Number">
                </div>
            </td>
            <td>
                <div class="input">
                    <label for="age">Age</label> <br>
                    <input class = "input" type="number" name="age" id="age" placeholder="Age">
                </div>
            </td>
        </tr>
        
        <tr>
            <td>
                <div class="input">
                    <label for="class">Class</label> <br>
                    <select name="class" id="class">
                            <option value="">Select Class</option>
                            <?php
                            foreach($options as $option){
                                ?>
                            <option> <?php echo $option['class_name']; ?> </option>
                            <?php
                            }
                            ?>
                    </select>
                </div>
            </td>
            <td>
                <div>
                <input type="submit" name="submit" id="submit" value="INSERT" onclick = "inputvalidation" />
                <input type="reset" name="reset" id="reset" value="CLEAR FORM" />
                 </div>
            </td>
        </tr>
    </section>
   
    <script src="javascript/app.js"></script>
</body>
</html>