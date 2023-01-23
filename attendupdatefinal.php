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

include ("teacher.php");
include("dbconn.php");

$id=$_POST['id'];
$reason=$_POST['reason'];


$sql = "UPDATE attendance SET REASON = '" . $reason . "' WHERE A_ID = '" . $id . "'";
$result=$conn->query($sql);

if($conn->query($sql)===TRUE){
    echo "<script>alert('Attendance updated Successfully');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=reportclass.php\">";
}else{
    echo "<script>alert('Attendance updated unsuccessfully');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=reportclass.php\">";
}

$conn->close();

?>
</body>