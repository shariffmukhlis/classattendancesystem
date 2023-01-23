<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="styles/mainmenu.css">

    <title>Class Attendance System</title>
</head>
<body>
    
    <?php
    include "student.php";
    include "teacher.php";
    include "dbconn.php";
    session_start();
    if (!isset($_SESSION['TEACHER'])) {
        // Redirect to the login page if the user is not logged in
        header('Location: login.html');
        exit;
    }
    $teacher = $_SESSION['TEACHER'];

    include("teacherhead.php");
    $classid = $teacher->classid;
    //get class name from class table
    $sql = "SELECT class_name FROM class WHERE class_id = '" . $classid . "'";
    $resultclass = $conn->query($sql);

    //get student list by the class that in charged by logined teacher
    $sql2 = "SELECT * FROM student a WHERE CLASS_ID = '" . $classid . "' AND 
     STUDENT_ID NOT IN (SELECT STUDENT_ID from attendance where Date(date) = CURRENT_date)";   

    $sql3 = "SELECT  * FROM student WHERE  class_id = (select class_id FROM teacher WHERE class_id = '" . $classid . "')";   
    $resultStudent = mysqli_query($conn, $sql2);
    ?>

    <section id="tablesection">
        <h1>CLASS SIGN ATTENDANCE </h1>   
        <form action="">
    <?php
     if($resultclass->num_rows>0)
     {
        echo"<table align='center' width='50%'>";
        $row = $resultclass->fetch_assoc();
     }
    date_default_timezone_set("Asia/Kuala_Lumpur");    
     $mydate=getdate(date("U"));
    echo "<h3> $mydate[weekday], $mydate[mday] $mydate[month] $mydate[year] </h3>";
    if (mysqli_num_rows($resultStudent) > 0) 
    {
        echo"<tr><th>Name</th><th>Age</th><th>Email</th>
            <th>No Phone</th><th colspan='2'>Sign Attendance</th></tr>";
        while ($row = mysqli_fetch_assoc($resultStudent)) {
            echo"<tr>";
            echo"<td>".$row['STUDENT_NAME']."</td>";
            echo"<td>".$row['STUDENT_AGE']."</td>";
            echo"<td>".$row['STUDENT_EMAIL']."</td>";
            echo"<td>".$row['STUDENT_PHONE']."</td>";
            ?>
            <td align="center"><a href="Present.php?id=<?php echo $row['STUDENT_ID'];?>"><span class="material-symbols-outlined"> done </span></a></td>
            <td align="center"><a href="Absent.php?id=<?php echo $row['STUDENT_ID'];?>"><span class="material-symbols-outlined"> cancel </span></a></td>
        </tr>

        <?php
        }
        echo "</table></center>";
    } 
    else{
        echo"0 results";
    }
    ?>
            
        </form>
       
    </section>

    <script src="javascript/app.js"></script>
</body>
</html>