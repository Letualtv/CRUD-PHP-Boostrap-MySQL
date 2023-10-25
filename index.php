<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$sentencia = $bd->query("select * from persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>




<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <!--inicio alerta -->

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {

            ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>¡Error!</strong> Rellene todos los campos
                </div>

            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {

            ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Registrado</strong> Los datos fueron agregados correctamente
                </div>

            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {

            ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>¡Error!</strong> No existe, vuelve a intentarlo.
                </div>

            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {

            ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Editado correctamente</strong> Los datos fueron actualizados.
                </div>

            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {

            ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Eliminado correctamente</strong> Los datos fueron borrados.
                </div>

            <?php
            }
            ?>
            <!-- fin alerta -->

            <div class="card">
                <div class="card-header">
                    Lista de alumnos
                </div>
                <div class="p-4">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Signo</th>
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($persona as $dato) {


                                ?>

                                    <tr class="">
                                        <td scope="row"><?php echo $dato->codigo; ?></td>
                                        <td>
                                        <td scope="row"><?php echo $dato->nombre; ?></td>
                                        <td>
                                        <td scope="row"><?php echo $dato->edad; ?></td>
                                        <td>
                                        <td scope="row"><?php echo $dato->signo; ?></td>
                                        <td><a class="text-primary" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
                                    </tr>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>


                <form class="p-4" method="POST" action="registrar.php">


                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad:</label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo:</label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registar">
                    </div>


                </form>




            </div>
        </div>
    </div>
</div>



















<?php include 'template/footer.php' ?>