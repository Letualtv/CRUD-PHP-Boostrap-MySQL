<?php include 'template/header.php' ?>



<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}
include_once 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("select * from persona where codigo = ?;");
$sentencia->execute([$codigo]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
?>
















<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>


                <form class="p-4" method="POST" action="editarProceso.php">


                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input value="<?php echo $persona->nombre; ?>" type="text" class="form-control" name="txtNombre" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad:</label>
                        <input value="<?php echo $persona->edad; ?>" type="number" class="form-control" name="txtEdad" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo:</label>
                        <input value="<?php echo $persona->signo; ?>" type="text" class="form-control" name="txtSigno" required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>


















<?php include 'template/footer.php' ?>