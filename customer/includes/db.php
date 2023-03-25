<?php
   $db = new mysqli("localhost","root","","e_shopping");
   if($db->connect_error){
   die("connection Failed!".$db->connect_error);   
  }
?>
