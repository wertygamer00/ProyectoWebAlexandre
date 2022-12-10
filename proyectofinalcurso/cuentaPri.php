<?php
session_start();
include("cuentaPri.html");
$errors="";
if(isset($_POST["registro"])){
    $nombre=$_POST["firstName"];
    $apellidos=$_POST["lastName"];
    $nombreU=$_POST["username"];
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email=$_POST["email"];
    }else{
     $errors="correo no valido";
    }

    $regex='/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/';
    
    if(preg_match($regex,$_POST["pass"])){
    $contraseña=base64_encode($_POST["pass"]);
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
   $sql = 'INSERT INTO usuarios (Nombre,Apellidos,nombreU,tipo,gmail,contrasena) VALUES ("'.$nombre.'","'.$apellidos.'","'.$nombreU.'","usuario","'.$email.'","'.$contraseña.'")';
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