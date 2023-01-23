<?php
    include ("teacher.php");
    include("dbconn.php");
    session_start();
    if (!isset($_SESSION['ADMIN'])) {
        // Redirect to the login page if the user is not logged in
        header('Location: login.html');
        exit;
    }
    $admin = $_SESSION['ADMIN'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $subject = $_POST['subject']; 
    $class = $_POST['class']; 
    $image = $_POST['image']; 
    
    $sql2 = "select class_id from class where class_name = '" . $class . "'";
    $resultclass = mysqli_query($conn, $sql2);

    if($resultclass->num_rows>0){
        while ($row = mysqli_fetch_assoc($resultclass)) {
            $classid = $row['class_id'];
        }
   }
    
    $sql = "INSERT INTO teacher (name,age,email,nophone,subject,password,class_id,teacher_profile) VALUE ('$name','$age','$email','$phone','$subject','$password','$classid','$image')" or die("Error inserting data into table");
    if($conn->query($sql)===TRUE)
    {
        //alert message success using meta and redirect to teachermain.php
        echo $image;
        echo "<script type='text/javascript'>alert('New teacher information created successfully');
        </script>";
        echo "<meta http-equiv=\"refresh\" content=\"0.2;URL=staffmain.php\">"; 

    }else{
        //alert message fail to update and redirect to registerteacher.php
        echo "<script type='text/javascript'>alert('Register teacher failed');
        </script>";
        echo "<meta http-equiv=\"refresh\" content=\"0.2;URL=registerteacher.php\">"; 
    }

//close specified connection
$conn->close();

?>
