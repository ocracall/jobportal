<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobportal";

 $conn = mysqli_connect($servername, $username, $password, $dbname);
 $conn->set_charset("utf8");
//$conn= new PDO("mysql:host=$host; dbname=$dbname", "$username", "$password"); 
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($conn){
    //  echo "Connection successful ";
}else{
    echo "Connection failed ".mysqli_connect_error($conn);
}

?>