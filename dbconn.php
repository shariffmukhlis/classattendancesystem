<?php

$sname = "localhost:3308";
$uname = "root";
$password = "";
$db_name = "attendancesystem";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if(!$conn){
    echo "Connection failed";
}
