<?php
require_once('../controladores/producto.controlador.php');
require_once('validaciones/productos.validacion.php');
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

    <?php
    $hayPost = isset($_POST['crear']);

    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $precio = isset($_POST["precio"]) ? $_POST["precio"] : "";
    $stock = isset($_POST["stock"]) ? $_POST["stock"] : "";
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : "";

    $producto = new Producto($id, $nombre, $descripcion, $precio, $stock, $categoria);

    if ($hayPost):
        $respuesta = crearProducto($producto);

    ?>
        <?php if (!empty($respuesta)) : ?>
            <div class="alert alert-info alert-dismissible fade show mt-3 text-center" role="alert">
                <?= $respuesta ?>
            </div>
        <?php endif; ?>
    <?php
    endif
    ?>

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-success text-white text-center">
                <h4 class="mb-0">Crear Producto</h4>
            </div>

            <div class="card-body">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

                    <!-- ID -->
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="text" class="form-control" name="id"
                            value="<?= $producto->getId() ?>">
                        <small class="text-danger">
                            <?= validarId($producto, $hayPost, $id) ?>
                        </small>
                    </div>

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre"
                            value="<?= $producto->getNombre() ?>">
                        <small class="text-danger">
                            <?= validarNombre($producto, $hayPost, $nombre) ?>
                        </small>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" rows="3"><?= $producto->getDescripcion() ?></textarea>
                        <small class="text-danger">
                            <?= validarDescripcion($producto, $hayPost, $descripcion) ?>
                        </small>
                    </div>

                    <!-- Precio y Stock en fila -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" class="form-control" min="0" step="0.1"
                                name="precio" value="<?= $producto->getPrecio() ?>">
                            <small class="text-danger">
                                <?= validarPrecio($producto, $hayPost, $precio) ?>
                            </small>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" class="form-control" min="0"
                                name="stock" value="<?= $producto->getStock() ?>">
                            <small class="text-danger">
                                <?= validarStock($producto, $hayPost, $stock) ?>
                            </small>
                        </div>
                    </div>

                    <!-- Categoría -->
                    <div class="mb-3">
                        <label class="form-label">Categoría</label>
                        <select class="form-select" name="categoria">
                            <option value="frutas" <?= $producto->getCategoria() == "frutas" ? "selected" :  "" ?>>Frutas</option>
                            <option value="limpieza" <?= $producto->getCategoria() == "limpieza" ? "selected" :  "" ?>>Limpieza</option>
                            <option value="lacteos" <?= $producto->getCategoria() == "lacteos" ? "selected" :  "" ?>>Lacteos</option>
                            <option value="panaderia" <?= $producto->getCategoria() == "panaderia" ? "selected" :  "" ?>>Panaderia</option>
                            <option value="bebidas" <?= $producto->getCategoria() == "bebidas" ? "selected" :  "" ?>>Bebidas</option>
                        </select>
                    </div>

                    <!-- Botón -->
                    <div class="d-grid">
                        <button type="submit" name="crear" class="btn btn-success m-2">
                            Guardar Producto
                        </button>
                        <a href="listadoProductos.php" name="crear" class="btn btn-secondary m-2">
                            Ver productos
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>