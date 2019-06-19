<?php
$HOST = "localhost";
$DB_NAME = "blog";
$USER = "root";
$PASSWORD ="";

$CONNECTION = mysqli_connect($HOST, $USER, $PASSWORD, $DB_NAME);
 if (mysqli_connect_errno()){ //if the connection failed
    echo "connection failed because" .mysqli_connect_error();//report the connection error
    die();//halt the script
}
else{
    //  echo"connection succesful";
 }



?>