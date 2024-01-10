<?php
$db_host = "localhost:3304";
$db_user = "user";
$db_pass = "password";
$db_name = "c203_moviereviewdb";
$link = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or 
        die(mysqli_connect_error());
?>
