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
    $id=$_REQUEST['teacherid'];
    $sql="SELECT * FROM teacher WHERE teacher_id='".$id."'";

    $resultupdate = $conn->query($sql);
    if ($resultupdate->num_rows > 0) {
        //output data of each row

        while($row = $resultupdate->fetch_assoc()) {
            ?>
<html><body>
<section>
    <h1 style="text-align:center">UPDATE INFORMATION TEACHER</h1>
    <form method="POST" action="TeacherUpdateFinal.php">
            <table>
                <tr>
                    <td>
                        <div class="input">
                            <label for="id">ID</label> <br>
                            <input type="text" name="id" id="id" value="<?php echo $row['TEACHER_ID'];?>"readonly>
                        </div>
                    </td>
                    <td>
                        <div class="input">
                            <label for="name">Name</label> <br>
                            <input type="text" name="name" id="name" value="<?php echo $row['NAME'];?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input">
                            <label for="subject">Password</label> <br>
                            <input type="password" name="password" id="password"value="<?php echo $row['PASSWORD'];?>">
                        </div>
                    </td>
                    <td>
                        <div class="input">
                            <label for="email">Email</label> <br>
                            <input type="email" name="email" id="email" value="<?php echo $row['EMAIL'];?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input">
                            <label for="phone">No Phone</label> <br>
                            <input type="text" name="phone" id="phone" value="<?php echo $row['NOPHONE'];?>">
                        </div>
                    </td>
                    <td>
                        <div class="input">
                            <label for="age">Age</label> <br>
                            <input type="number" name="age" id="age" value="<?php echo $row['AGE'];?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input">
                            <label for="subject">Subject</label> <br>
                            <input type="text" name="subject" id="subject"value="<?php echo $row['SUBJECT'];?>">
                        </div>
                    </td>
                    <td>
                        <div>
                        <input type="submit" name="submit" id="submit" value="UPDATE" />
                        <input type="reset" name="reset" id="reset" value="CLEAR FORM" />
                        </div>
                    </td>
                </tr>
            </table>
    
    </form>
</section>
<?php
}
} else {
    echo "0 result";
}
?>
</body>
</html>
