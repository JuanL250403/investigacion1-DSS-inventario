<?php
require_once('../controladores/producto.controlador.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php
include('head.inc.php')
?>

<?php
include('navbar.inc.php')
?>

<body>
    <main>
        <?php
        $idProducto = isset($_GET["idProducto"]) ? $_GET["idProducto"] : 0;
        $producto = obtenerProductoId($idProducto);

        if (isset($_POST["eliminar"])):
            $id = isset($_POST['id']) ? $_POST['id'] : 0;

            $respuesta = eliminarProducto($id);
        ?>
            <?php if (!empty($respuesta)) : ?>
        <div class="alert alert-info alert-dismissible fade show text-center shadow-sm" role="alert">
            <?= $respuesta ?>
        </div>

        <div class="text-center mt-3">
            <a href="listadoProductos.php" class="btn btn-success px-5">
                Regresar
            </a>
        </div>
        <?php endif ?>
        <?php
        else:
        ?>

            <div class="card shadow-lg border-0">
            <div class="card-header bg-danger text-white text-center">
                <h4 class="mb-0">Confirmar Eliminación</h4>
            </div>

            <div class="card-body">

                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

                    <input type="text" name="id" value="<?= $producto->getId() ?>" hidden>

                    <div class="row text-center">

                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Nombre</label>
                            <p class="fs-4"><?= $producto->getNombre() ?></p>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Precio</label>
                            <p class="fs-4">$<?= $producto->getPrecio() ?></p>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Stock</label>
                            <p class="fs-4"><?= $producto->getStock() ?></p>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Categoría</label>
                            <p class="fs-4"><?= $producto->getCategoria() ?></p>
                        </div>

                        <div class="col-12 mb-4">
                            <label class="form-label fw-bold text-muted">Descripción</label>
                            <p class="fs-5"><?= $producto->getDescripcion() ?></p>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center gap-3 mt-3">
                        <input type="submit" class="btn btn-danger px-4" name="eliminar" value="Eliminar">
                        <a href="listadoProductos.php" class="btn btn-secondary px-4">
                            Regresar
                        </a>
                    </div>

                </form>

            </div>
        </div>
        <?php
        endif
        ?>
    </main>
</body>

</html>