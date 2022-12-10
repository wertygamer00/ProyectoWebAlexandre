<?php
  include("login.html");
 session_start();

  if(isset($_POST["entrar"])){

     $nombreU=$_POST["nombre"];
     $contra=$_POST["contra"];

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
    
   $sql = 'SELECT `idU`, `Nombre`, `Apellidos`, `nombreU`, `tipo`, `gmail`, `contrasena` FROM `usuarios` WHERE nombreU ="'.$nombreU.'";';
   $result = $conn->query($sql);
   

   $r=$result->fetch_assoc();


   if(base64_decode($r["contrasena"])==$contra){
         $_SESSION["cuenta"]=$nombreU;
         header('Location: index.html');

   }
  }


?>