<?php 
$DB_HOST= "localhost";
$DB_USER = "root";
$DB_PASS ="";
$DB_NAME = "sundarban";

$connection = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);


if(!$connection){
    die("connection Failed". mysqli_connect_error());
}





mysqli_close($connection)





?>