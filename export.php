<?php

include("connection.php");
$sql= "select * from contactform";


$res= mysqli_query($conn, $sql); 
$html='<table border=1><tr><td>id</td><td>username</td><td>email</td><td>subject</td><td>message</td></tr>';
$sr=0;
while($row=mysqli_fetch_assoc($res)){
    $sr++;
$html .='<tr><td>'.$sr.'</td><td>'.$row['username'].'</td><td>'.$row['email'].'</td><td>'.$row['subject'].'</td><td>'.$row['message'].'</td></tr>';
}
$html .= '</table>';
echo $html;

header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename="contact.xls"');
?>