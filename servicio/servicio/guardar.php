<?php

include('conexion.php');

if (isset($_POST['guardar'])) {
  $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $contrasena = $_POST['contrasena'];
        $rol = $_POST['rol'];
        $query = "INSERT INTO usuario(user, nombres, apellidos, contrasena, rol) VALUES ('$usuario', '$nombre', '$apellido', '$contrasena', '$rol')";
        $result = mysqli_query($conn, $query);
  if(!$result) {
    die("conexion fallida.");
  }

  $_SESSION['message'] = 'El Usuario ha sido guardado exitosamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
