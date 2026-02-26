<?php
require_once('../controladores/ventas.controlador.php');
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
        <h1 class="mb-4 mt-4 text-center">Listado de Ventas</h1>

    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>SubTotal</th>
                <th>Porcentaje IVA</th>
                <th>IVA</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $ventas = obtenerVentas();
                foreach ($ventas as $venta):
            ?>
            <tr>
                <td><?= $venta->getProducto()?></td>
                <td><?= $venta->getCantidad()?></td>
                <td><?= $venta->getsubTotal()?></td>
                <td><?= $venta->getPorcentajeIVA()?></td>
                <td><?= $venta->getIva()?></td>
                <td><?= $venta->getTotal()?></td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
    </main>
</body>

</html>