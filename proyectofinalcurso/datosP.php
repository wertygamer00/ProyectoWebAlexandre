<?php

$servername = "localhost";
   $database = "trabajop";
   $username = "root";
   $password = "";
   // Create connection
   $conn = mysqli_connect($servername, $username, $password, $database);
   // Check connection
   if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
   }
    
   $sql = 'SELECT * FROM `publicaciones` WHERE 1';
   $result = $conn->query($sql);
   

   $r=$result->fetch_all();
   echo json_encode($r);

?>