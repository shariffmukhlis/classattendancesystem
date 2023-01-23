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
    include("admin.php");
    session_start();
    if (!isset($_SESSION['ADMIN'])) {
        // Redirect to the login page if the user is not logged in
        header('Location: login.html');
        exit;
    }
    $admin = $_SESSION['ADMIN'];
    include("staffhead.php");
    include("dbconn.php");

    if(isset($_POST['submit'])){
        $search = $_POST['search'];
        $sql = "select a.*, b.CLASS_NAME from student a natural join class b where student_name like '%".$_POST['search']."%'";
        $result = mysqli_query($conn, $sql);
    }

    ?>
    <section>
        <h1>Search Student</h1>
        <form action="searchstudent.php" method="POST">
            <table>
                <tr>
                    <td colspan="7">
                        <input type="text" name = "search" id="search" placeholder="Search name"><input type="submit" value="Search" name="submit">
                    </td>
                </tr>
            <?php
                if(isset($_POST['submit'])){
                    if(mysqli_num_rows($result)> 0){
                        echo "
                            <tr>
                                <th>NAME</th>
                                <th>CLASS</th>
                                <th>AGE</th>
                                <th>EMAIL</th>
                                <th>NO PHONE</th>
                                <th colspan = 2></th>
                            </tr>
                            ";
                            while($rows = mysqli_fetch_assoc($result)){
                                echo " 
                                <tr>
                                    <td>" .$rows['STUDENT_NAME']. "</td>
                                    <td>" .$rows['CLASS_NAME']. "</td>
                                    <td>" .$rows['STUDENT_AGE']. "</td>
                                    <td>" .$rows['STUDENT_EMAIL']. "</td>
                                    <td>" .$rows['STUDENT_PHONE']. "</td>
                                    <td> <a href='studentupdate.php?studentid=".$rows['STUDENT_ID']."'><span class='material-symbols-outlined'> edit </span></a></td>
                                    <td> <a href='deletestudent.php?studentid=".$rows['STUDENT_ID']."'><span class='material-symbols-outlined'> delete </span></a></td>
                                </tr>
                                ";
                            }
                        }
                        else{
                            echo " <tr>
                            <td colspan='7'>0 result found</td>
                            </tr>";
                            echo "</table>";

                }
                }
            ?>
            

        </form>
    </section>
    <script src="javascript/app.js"></script>
    <?php
        $conn->close();
    ?>
</body>
</html>