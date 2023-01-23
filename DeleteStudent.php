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
  <?php
   include("admin.php");
   session_start();
   if (!isset($_SESSION['ADMIN'])) {
       // Redirect to the login page if the user is not logged in
       header('Location: login.html');
       exit;
    }
    $admin = $_SESSION['ADMIN'];
    include "dbconn.php";
    include("staffhead.php");
   $id=$_REQUEST['studentid'];
   $sql="DELETE from student where STUDENT_ID ='".$id."'";
   if($conn->query($sql)===TRUE){
    echo "<script>alert('Student Deleted Successfully');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=searchstudent.php\">";

}else{
    echo "<script>alert('Student Deleted unsuccessfully');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=searchstudent.php\">";
}

$conn->close();
?>