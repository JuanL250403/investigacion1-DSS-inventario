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
        <h1 class="mb-4 mt-4 text-center">Listado de Productos</h1>

    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $productos = obtenerProductos();
                foreach ($productos as $producto):
            ?>
            <tr>
                <td><?= $producto->getId()?></td>
                <td><?= $producto->getNombre()?></td>
                <td><?= $producto->getDescripcion()?></td>
                <td><?= $producto->getCategoria()?></td>
                <td><?= $producto->getPrecio()?></td>
                <td><?= $producto->getStock()?></td>
                <td class="d-flex">
                    <form action="editarProducto.php" method="GET" class="m-2">
                        <input type="submit" class="btn btn-warning" value="Editar">
                        <input name="idProducto" value=<?= $producto->getId() ?> hidden>
                    </form>
                    <form action="eliminarProducto.php" method="GET" class="m-2">
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                        <input name="idProducto" value=<?= $producto->getId() ?> hidden>
                    </form>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
    </main>
</body>

</html>