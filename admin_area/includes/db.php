<?php 

$db = mysqli_connect("localhost","root","","e_shopping");
if(mysqli_errno($db))
{
 echo mysqli_error(); 
}
?>
