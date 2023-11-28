<?php

use App\Authentication\Authentication;
use App\Models\Product;

require_once __DIR__ . '/../../bootstrap/init.php';

$authentication = new Authentication();

if(!$authentication -> isAuthenticated()) {
    $_SESSION['failMessage'] = "Para realizar esta acción se requiere iniciar sesión.";
    header('Location: ../index.php?section=login-view');
    exit;
}

$id = $_GET['id'];
$name_product= $_POST['name_product'];
try {
    (new Product())->deleteProduct($id);

    $_SESSION['successMessage'] = "El producto <b>" . $name_product . "</b> se elimino exitosamente.";
    header("Location: ../index.php?section=store");
    exit;
} catch(\Exception $e) {
    $_SESSION['failMessage'] = "Ocurrió un error inesperado al tratar de eliminar el producto.";
    header("Location: ../index.php?section=store");
    exit;
}