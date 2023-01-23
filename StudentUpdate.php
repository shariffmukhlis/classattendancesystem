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
    include("staffhead.php");
    include("dbconn.php");

    $id=$_REQUEST['studentid'];
    $sql="SELECT * FROM student WHERE student_id='".$id."'";

    $resultupdate = $conn->query($sql);
    if ($resultupdate->num_rows > 0) {
        //output data of each row
        while($row = $resultupdate->fetch_assoc()) {
            ?>
<html><body>
<section>
    <h1 style="text-align:center">UPDATE INFORMATION STUDENT</h1>
    <form method="POST" action="StudentUpdateFinal.php">
        <table>
            <tr>
                <td>
                    <div class="input">
                            <label for="id">Student ID</label> <br>
                        <input type="text" name="id" id="id" value="<?php echo $row['STUDENT_ID'];?>"readonly>
                    </div>
                </td>
                <td>
                    <div class="input">
                        <label for="name">Name</label> <br>
                        <input type="text" name="name" id="name" value="<?php echo $row['STUDENT_NAME'];?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input">
                        <label for="email">Email</label> <br>
                        <input type="email" name="email" id="email" value="<?php echo $row['STUDENT_EMAIL'];?>">
                    </div>
                </td>
                <td>
                    <div class="input">
                        <label for="phone">No Phone</label> <br>
                        <input type="text" name="phone" id="phone" value="<?php echo $row['STUDENT_PHONE'];?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input">
                        <label for="age">Age</label> <br>
                        <input type="number" name="age" id="age" value="<?php echo $row['STUDENT_AGE'];?>">
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
} 
else 
{
    echo "0 result";
}
?>
</body>
</html>
