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
            <?php
            include "dbconn.php";
            $date = $_POST['dateselect'];
            $_SESSION['DATE'] = $date;
            $sql= "SELECT a.*, STUDENT_ID, STUDENT_NAME, DATE_FORMAT(DATE(DATE),'%d %M %Y') as DATE, IF(STATUS = 1, 'PRESENT', 'ABSENT') AS STATUS  FROM attendance a natural join student natural join class natural join teacher where date(date) = '".$date."' and  teacher_id = ".$teacher->id. "";
            $result=$conn->query($sql);

            $sql1= "SELECT  DATE_FORMAT(DATE(DATE),'%d %M %Y') as DATE, DATE_FORMAT(DATE(DATE),'%a') as DAY FROM attendance a natural join student natural join class natural join teacher where date(date) = '".$date."' and  teacher_id = ".$teacher->id. "";
            $result1 =$conn->query($sql1);

            if ($result1->num_rows > 0) {
                $rows = $result1->fetch_assoc();
                $date = $rows['DATE'];
                $day = $rows['DAY'];
            }
            if ($result->num_rows > 0) {

                echo "<h1> Student Record </h1>";
                echo "<h3> Date:".$day.", ".$date." </h3>";
                echo"<table  id= 'tableprint' align='center' border='1' width = '80%'> ";
                echo"<tr><th>STUDENT NAME</th><th>STATUS</th>
                    <th>REASON</th><th >ACTION</th></tr>";
                    $count = 0;
                    while ($row = $result->fetch_assoc()) {
                    if($row['REASON'] ===""){
                        $reason = "NO REASON";
                    }
                    else{
                        $reason = $row['REASON'];
                    }
                        echo"<tr>";
                    echo"<td>".$row['STUDENT_NAME']."</td>";
                    echo"<td>".$row['STATUS']."</td>";
                    echo"<td>".$reason."</td>";
                    echo"<td> <a href='attendupdate.php?id=".$row['A_ID']."'><span class='material-symbols-outlined'> edit </span></a></td>";
                    if($row['STATUS']=='PRESENT'){
                        $count++;
                    }

                }
                echo "</table>";
                echo "<div class='reportinfo'>
                    <p> ".$count." students attend class </p>
                </div>";
                echo "<p><button onclick='window.print()'>Print this page</button>
                <form action='generatepdf.php'>
                <button type='submit' id='pdf' name='generate_pdf' ></i> Generate List Attendance PDF</button>
                ";
            } 

            else {
                echo "
                <tr>
                    <td colspan = 5> 0 results </td>
                </tr> ";
            }
            //print 
            ?>
        </section>
        <!-- PRINT BUTTON -->
        <script src="javascript/app.js"></script>
</body>
</html>