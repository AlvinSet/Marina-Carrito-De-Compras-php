<?php

use App\Authentication\Authentication;

require_once __DIR__ . '/../bootstrap/init.php';

$ruta = $_GET['section'] ?? 'home';

$whiteList = [
    'home' => [
        'title' => 'Tablero Principal',
        'requiresAuthentication' => 'true'
    ],
    'new-product' => [
        'title' => 'Crear producto',
        'requiresAuthentication' => 'true'
    ],
    'store' => [
        'title' => 'Administración de Productos',
        'requiresAuthentication' => 'true'
    ],
    'delete-product-view' => [
        'title' => 'Eliminar Producto',
        'requiresAuthentication' => 'true'
    ],
    'edit-product-view' => [
        'title' => 'Editar Producto',
        'requiresAuthentication' => 'true'
    ],
    'login-view' => ['title' => 'Ingresar al Panel de Administración'],
    '404' => [
        'title' => 'Página no encontrada',
        'requiresAuthentication' => 'true'
    ],
];

if (!isset($whiteList[$ruta])) {
    $ruta = '404';
}

$rutaConfig = $whiteList[$ruta];

$authentication = new Authentication();

$requiresAuthentication = $rutaConfig['requiresAuthentication'] ?? false;
if ($requiresAuthentication && !$authentication -> isAuthenticated()) {
    $_SESSION['failMessage'] = "Para acceder a esta sección se requiere iniciar sesión.";
    header("Location: index.php?section=login-view");
    exit;
}

$paginaActual = $rutaConfig['title'];
function activeNavBar($nombre, $paginaActual)
{
    return ($paginaActual == $nombre) ? 'active' : '';
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $rutaConfig['title']; ?> |Panel de Administración Marina </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400&family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary container">
            <div class="container-fluid align-items-end">
                <a class="navbar-brand <?php echo activeNavBar('Página Principal', $paginaActual) ?>" href="index.php?section=home">
                    <img src="../images/logo.png" alt="Logotipo de la tienda Marina" class="d-inline-block align-text-top logo mx-3">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                    <?php
                    if ($authentication -> isAuthenticated()) :
                    ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link <?php echo activeNavBar('Página Principal', $paginaActual) ?>" aria-current="page" href="index.php?section=home">Tablero</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?php echo activeNavBar('Tienda',  $paginaActual) ?>" href="index.php?section=store">Administrar Productos</a>
                            </li>
                            <li>
                                <form action="acciones/log-out.php" method="post">
                                    <button type="submit" class="nav-link">(
                                    <?= $authentication->getUser()->getEmail();?>   ) Cerrar Sesión</button>
                                </form>
                            </li>
                        </ul>
                    <?php
                    endif;
                    ?>

                </div>
            </div>
        </nav>
    </header>
    <div>
        <?php
        if (isset($_SESSION['successMessage'])) : ?>
            <div class="msg-success"><?= $_SESSION['successMessage']; ?></div>
        <?php
            unset($_SESSION['successMessage']);
        endif;
        ?>

        <?php
        if (isset($_SESSION['failMessage'])) : ?>
            <div class="msg-fail"><?= $_SESSION['failMessage']; ?></div>
        <?php
            unset($_SESSION['failMessage']);
        endif;
        ?>
    </div>
    <?php
    require __DIR__ . '/vistas/' . $ruta . '.php';
    ?>

    <footer class="d-flex flex-column align-items-center">
        <div>
            <img src="../images/logo.png" alt="logo Marina" class="logo">
        </div>
        <div class="p-footer">
            <p class="text-center">© Marina 2023. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>

</html>