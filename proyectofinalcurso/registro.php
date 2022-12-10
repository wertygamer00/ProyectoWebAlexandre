<?php
session_start();
include("register.html");
$errors="";
if(isset($_POST["registro"])){
    $nombre=$_POST["nombre"];
    if (filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)) {
        $email=$_POST["correo"];
    }else{
     $errors="correo no valido";
    }

    $regex='/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/';
    
    if(preg_match($regex,$_POST["contraseña"])){
    $contraseña=base64_encode($_POST["contraseña"]);
}else{
    $errors="contraseña no valido";
   }


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
    
   echo "Connected successfully";
    
   
   if($errors==""){
   $sql = 'INSERT INTO usuarios (nombreU,tipo,gmail,contrasena) VALUES ("'.$nombre.'","usuario","'.$email.'","'.$contraseña.'")';
   if (mysqli_query($conn, $sql)) {
         echo "New record created successfully";
         $id = mysqli_insert_id($conn); 
         $_SESSION["cuenta"]=$nombre;
         $_SESSION["idU"]=$id;
         header('Location: index.html');

   } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   mysqli_close($conn);
   
   }

}
?>