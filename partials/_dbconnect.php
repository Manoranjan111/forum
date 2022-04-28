<?php
$servername="localhost";
$username="root";
$password="";
$database="idiscus";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Sorry We are failed to connecting the database".mysqli_connect_error());
}else{
//    echo "database connecting Sucessfully";
}

?>