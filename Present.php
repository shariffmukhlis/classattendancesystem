<html>
    <head>
        <title>Writing to a File</title>
    </head>
    <body>
        
    <?php

    include("dbconn.php");
    $id = $_REQUEST['id'];
    
         //Enter data into attendance table
         $sql4 = "INSERT INTO ATTENDANCE (STUDENT_ID, STATUS) values (" .$id . ", TRUE )"
         or die ("Error inserting data into table");

         //studentA table is different with student table
         //studentA table is to show the available student in list after signed
         //student table is to save student data into database
          //Delete the selected student data with its ID in studentA table
         $sql5 = "DELETE FROM STUDENTA where STUDENT_ID='".$id."'"
         or die ("Error inserting data into table");

         if ($conn-> query ($sql4) === TRUE) {
            $result = $conn->query($sql5);

            echo "<meta http-equiv=\"refresh\" content=\"0.1;URL=signattendance.php\">";
         } 
         else {
            echo "<p>";
            echo "<p style= 'text-allign:center'>Error: " . $sql4 . "<br>" .$conn->error;
            echo "<p>";
         } 
   ?>
</body>
</html>
        