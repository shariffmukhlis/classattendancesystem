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
    include "teacher.php";
    session_start();

    if (!isset($_SESSION['TEACHER'])) {
        // Redirect to the login page if the user is not logged in
        header('Location: login.html');
        exit;
    }
    $teacher = $_SESSION['TEACHER'];


    include("teacherhead.php");
    ?>

    <section id="teachermain">
        <h1>REPORT ATTENDANCE STUDENT</h1>
        <!-- <a href = "viewRecord.php">View Record</a> -->

        <form action="resultrecord.php" method="post">
        <div class="pickdate" style="display: block;">
            <label for="dateselect">Select Date:  </label>
            <input type="date" id="dateselect" name="dateselect" placeholder="MM/DD/YYYY">
        </div>
        <input type="submit" value="Generate Report">
        </form>

    </section>
   
    <script src="javascript/app.js"></script>
</body>
</html>