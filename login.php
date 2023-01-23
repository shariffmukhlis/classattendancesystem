<?php
include "dbconn.php";
// call class teacher from teacher.php file 
include "teacher.php";
include "admin.php";

session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select a.*, b.CLASS_NAME from teacher a natural join class b  where email = '$username' and password = '$password';";
    $sql2 = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $resulteacher = mysqli_query($conn, $sql);
    $resultadmin = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($resulteacher) > 0) {
        while ($row = mysqli_fetch_assoc($resulteacher)) {
            $teacher = new Teacher();
            $teacher->name = $row['NAME'];
            $teacher->email = $row['EMAIL'];
            $teacher->phone = $row['NOPHONE'];
            $teacher->password = $row['PASSWORD'];
            $teacher->age = $row['AGE'];
            $teacher->subject = $row['SUBJECT'];
            $teacher->id = $row['TEACHER_ID'];
            $teacher->class = $row['CLASS_NAME'];
            $teacher->images = $row['TEACHER_PROFILE'];
            $teacher->classid = $row['CLASS_ID'];

            $home = "teachermain.php";
            $_SESSION['TEACHER'] = $teacher;
            header("Location: ". $home);
            exit(); 
        }
    } 
    else if (mysqli_num_rows($resultadmin) > 0) {
        while ($row = mysqli_fetch_assoc($resultadmin)) {
            $admin = new Admin();
            $admin->id = $row['ADMIN_ID'];
            $admin->username = $row['USERNAME'];
            $admin->password = $row['PASSWORD'];
            $admin->name = $row['NAME'];
            $admin->email = $row['EMAIL'];
            $admin->phone = $row['NOPHONE'];
            $admin->images = $row['IMAGE'];
            $home = "staffmain.php";
            $_SESSION['ADMIN'] = $admin;
            header("Location: ". $home);
            exit(); 
        }
    } 
    else {
        //alert using script alert
        echo "<script>alert('Invalid username or password')</script>";
        //redirect to login page using meta tag refresh
        echo "<meta http-equiv='refresh' content='0;url=login.html'>";

    }
}



    

?>

