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
session_start();
if (!isset($_SESSION['ADMIN'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.html');
    exit;
}
$admin = $_SESSION['ADMIN'];
include("staffhead.php");

    ?>
    <section id="teachermain">
        <div class="profile">
                <?php
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($admin->images).'" alt="profile" class="profilepic" />';
                ?>
        </div>
        <form action="">
            <div class="input">
                <label for="name">Name</label> <br>
                <input type="text" name="name" id="name" readonly value=" <?php echo $admin->name; ?> " >
            </div>
            <div class="input">
                <label for="email">Email</label> <br>
                <input type="text" name="email" id="email" readonly value=" <?php echo $admin->email; ?> ">
            </div>
            <div class="input">
                <label for="phone">No Phone</label> <br>
                <input type="text" name="phone" id="phone" readonly value=" <?php echo $admin->phone; ?> ">
            </div>
    
        </form>
    </section>
   
    <script src="javascript/app.js"></script>
</body>
</html>