<?php
  include("crearPub.html");
session_start();
  
  if(isset($_POST["crear"])){

    $usuario=$_SESSION["idU"];
    $nombreP=$_POST["nombreP"];
    $origen=$_POST["origen"];
    $cuerpo=$_POST["cuerpo"];

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

  $sql = 'INSERT INTO publicaciones (nombreP,cuerpo,origen,idU,estado) VALUES ("'.$nombreP.'","'.$origen.'","'.$cuerpo.'","'.$usuario.'","creada")';
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header('Location: index.html');

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
 
  }

?>