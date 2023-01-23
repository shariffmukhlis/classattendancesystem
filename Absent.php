<html>
    <head>
        <title>Writing to a File</title>
    </head>
    <body>
        
    <?php

    include("dbconn.php");
    $id = $_REQUEST['id'];
    
         $sql5 = "INSERT INTO ATTENDANCE (STUDENT_ID, STATUS) values (" .$id . ", FALSE )";

         $sql6 = "DELETE FROM STUDENTA where STUDENT_ID='".$id."'"
         or die ("Error inserting data into table");

         if ($conn-> query ($sql5) === TRUE) {
             $result = $conn->query($sql6);
            echo "<meta http-equiv=\"refresh\" content=\"0.1;URL=signattendance.php\">";
         } else {
            echo "<p>";
            echo "<p style= 'text-allign:center'>Error: " . $sql . "<br>" .$conn->error;
            echo "<p>";
         } 
   ?>
</body>
</html>
        