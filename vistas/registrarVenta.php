<?php
require_once('../controladores/ventas.controlador.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
include('head.inc.php')
?>

<?php
include('navbar.inc.php')
?>

<body>
    <?php
    $hayPost = isset($_POST['vender']);

    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : "";

    $venta = new Venta(null, $cantidad);
    function validarId($hayPost, $id)
    {
        if (!$hayPost) {
            return;
        }

        if (!$id) {
            return "id no puede ser nulo";
        } elseif (!is_numeric($id)) {
            return "id debe ser numerico";
        } elseif ($id < 0) {
            return "id no puede ser negativo";
        }
    }

    function validarCantidad($hayPost, &$venta, &$cantidad)
    {
        if (!$hayPost) {
            return;
        }

        $validacion = $venta->setCantidad($cantidad);
        if ($validacion) {
            return $validacion;
        }
    }

    if ($hayPost):
        $respuesta = realizarVenta($id, $venta);

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
                            value="<?= $id ?>">
                        <small class="text-danger">
                            <?= validarId($hayPost, $id) ?>
                        </small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <input type="number" min="0" class="form-control" name="cantidad"
                            value="<?= $venta->getCantidad() ?>">
                        <small class="text-danger">
                            <?= validarCantidad($hayPost, $venta, $cantidad) ?>
                        </small>
                    </div>

                    <!-- Botón -->
                    <div class="d-grid">
                        <button type="submit" name="vender" class="btn btn-success m-2">
                            Realizar venta
                        </button>
                        <a href="listadoVentas.php" class="btn btn-secondary m-2">
                            Ver ventas
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>