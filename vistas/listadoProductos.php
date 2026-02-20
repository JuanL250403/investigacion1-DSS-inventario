<?php
require_once('../controladores/producto.controlador.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
include('navbar.inc.php')
?>

<body>
    <table>
        <thead>
            <th>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Descripcion</td>
                    <td>Cateogira</td>
                    <td>Precio</td>
                    <td>Stock</td>
                </tr>
            </th>
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
            </tr>
            <?php
                endforeach
            ?>
        </tbody>

        </thead>
    </table>
</body>

</html>