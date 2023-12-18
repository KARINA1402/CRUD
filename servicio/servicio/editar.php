<?php
include("conexion.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM usuario WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $usuario = $row['user'];
      $nombre = $row['nombres'];
      $apellido = $row['apellidos'];
      $contrasena = $row['contrasena'];
      $rol = $row['rol'];
        }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $usuario= $_POST['user'];
   $nombre = $_POST['nombres'];
   $apellido = $_POST['apellidos'];
   $contrasena = $_POST['contrasena'];
   $rol = $_POST['rol'];

  $query = "UPDATE usuario set user = '$usuario', nombres = '$nombre', apellidos = '$apellido', contrasena = '$contrasena', rol = '$rol' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Usuario actualizado satisfactoriamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">

  <div class="row">

    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <strong>Actualizar Usuarios:</strong>
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <label for="inputEmail4" class="form-label">Usuario</label>
          <input name="user" type="text" style="text-transform:uppercase;" class="form-control" value="<?php echo $usuario; ?>" placeholder="Actualizar usuario">
        </div>
        <div class="form-group">
           <label for="inputPassword4" class="form-label">Nombres:</label>
          <input name="nombres" type="text" style="text-transform:uppercase;"  class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar nombre">
        </div>
        <div class="form-group">
          <label for="inputPassword4" class="form-label">Apellidos:</label>
          <input name="apellidos" type="text" style="text-transform:uppercase;" class="form-control" value="<?php echo $apellido; ?>" placeholder="Actualizar Apellidos">
        </div>
        <div class="form-group">
          <label for="inputPassword4" class="form-label">Contraseña:</label>
          <input name="contrasena" type="text" style="text-transform:uppercase;" class="form-control" value="<?php echo $contrasena; ?>" placeholder="Actualizar contraseña">
        </div>
        <div class="form-group">
          <label for="inputPassword4" class="form-label">Rol:</label>
          <input name="rol" type="text" style="text-transform:uppercase;" class="form-control" value="<?php echo $rol; ?>" placeholder="Actualizar contraseña">
        </div>

        
        <button class="btn-primary" name="update">
          Actualizar Usuario
        </button>
        <a class="navbar-brand" href="index.php">Cancelar</a>

      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
