<?php
session_start();
if(isset($_SESSION['ADMIN']) | isset($_SESSION['TEACHER'])){
    $_SESSION=array();
    session_destroy();
    echo "<meta http-equiv=\"refresh\" content=\"0.5;URL=login.html\">";
}
?>