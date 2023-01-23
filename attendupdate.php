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
    include("teacher.php");
	session_start();


    if (!isset($_SESSION['TEACHER'])) {
        // Redirect to the login page if the user is not logged in
        header('Location: login.html');
        exit;
    }
    $teacher = $_SESSION['TEACHER'];
    include("teacherhead.php");
    include("dbconn.php");

    $id=$_REQUEST['id'];
    $sql="SELECT * FROM attendance a natural join student WHERE a_id ='".$id."'";

    $resultupdate = $conn->query($sql);
    if ($resultupdate->num_rows > 0) {
        //output data of each row
        while($row = $resultupdate->fetch_assoc()) {
            ?>
<html><body>
<section>
    <h1 style="text-align:center">UPDATE ATTENDANCE</h1>
    <form method="POST" action="attendupdatefinal.php">
        <table>
            <tr>
                <td>
                    <div class="input">
                            <label for="id">Attendance ID</label> <br>
                        <input type="text" name="id" id="id" value="<?php echo $id;?>"readonly>
                    </div>
                </td>
                <td>
                    <div class="input">
                            <label for="id">Name</label> <br>
                        <input type="text" name="name" id="name" value="<?php echo $row['STUDENT_NAME'];?>"readonly>
                    </div>
                </td>
                <td>
                    <div class="input">
                        <label for="name">Reason</label> <br>
                        <input type="text" name="reason" id="reason" value="<?php echo $row['REASON'];?>">
                    </div>
                </td>
            </tr>
            
            <tr>
                <td colspan="3">
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
