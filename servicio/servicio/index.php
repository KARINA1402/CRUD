<?php include("conexion.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- mensaje -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>
      <!--/ fin mensaje -->

      <!-- Registro de Usuarios -->
      <div class="card card-body">
                  <strong>Registro de Usuarios:</strong>
                <form action="guardar.php" method="POST" class="row g-3">
                   
                        <div class="form-group col-md-12">
                            <label for="inputEmail4" class="form-label">Usuario</label>
                            <input type="text" placeholder="Ingrese Nombre de Usuario" class="form-control" name="usuario" style="text-transform:uppercase;" autofocus>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="form-label">Nombres:</label>
                            <input type="text" name="nombre" class="form-control"  style="text-transform:uppercase;">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="form-label">Apellidos:</label>
                            <input type="text" class="form-control" name="apellido" style="text-transform:uppercase;">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" name="contrasena" placeholder="********">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="form-label">Rol:</label>
                            <input type="text" class="form-control" name="rol"  style="text-transform:uppercase;">
                        </div>
                        
                       <input type="submit" class="btn btn-outline-primary btn-block" name="guardar" value="Guardar Usuario">
                        
                </form>
      </div>
    </div>
    <!-- /fin Usuarios -->

    <!-- Listado de Usuarios -->
    <div class="col-md-8">
      <strong>Listado de Usuarios:</strong>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr class="table-info">
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Rol</th>
            <th>Creado:</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM usuario";
          $result_usuario = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_usuario)) { ?>
          <tr>
            <td><?php echo $row['user'] ?></td>
            <td><?php echo $row['nombres'] ?></td>
            <td><?php echo $row['apellidos'] ?></td>
            <td><?php echo $row['rol'] ?></td>
            <td><?php echo $row['fecha_creacion'] ?></td>
            <td>
                <a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary"><i class="fa fa-marker"></i></a>
                <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /fin de Usuarios -->
  </div>
</main>

<?php include('includes/footer.php'); ?>
