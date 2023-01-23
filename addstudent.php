<html>
    <head>
        <title>Insert Student</title>
    </head>
<body>
    <?php
        include("dbconn.php");
        session_start();
    
        if (!isset($_SESSION['ADMIN'])) {
            // Redirect to the login page if the user is not logged in
            header('Location: login.html');
            exit;
        }
        $admin = $_SESSION['ADMIN'];
        $name = $_POST['name'];
        $class = $_POST['class'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
    
        $sql2 = "select class_id from class where class_name = '" . $class . "'";
        $resultclass = mysqli_query($conn, $sql2);
    
        if($resultclass->num_rows>0){
            while ($row = mysqli_fetch_assoc($resultclass)) {
                $classid = $row['class_id'];
            }
       }
        $sql = "INSERT INTO student (student_name,class_id,student_age,student_email,student_phone) VALUES('".$name."',".$classid.",".$age.",'".$email."','".$phone."')" or die("Error inserting data into table");
        if($conn->query($sql)===TRUE)
        {
            //alert message success using meta and redirect to teachermain.php
            echo "<script type='text/javascript'>alert('New student information created successfully') </script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.2;URL=staffmain.php\">";
    
        }else{
            echo "<script type='text/javascript'>alert('New student information created failed' </script>)";
            echo "<meta http-equiv=\"refresh\" content=\"0.2;URL=registerstudent.php\">";
        }
    
    //close specified connection
    $conn->close();
    ?>
</body>
</html>