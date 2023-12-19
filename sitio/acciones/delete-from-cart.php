<?php
use App\Models\Cart;
require_once __DIR__ . '/../bootstrap/init.php';

$id = $_GET['id'];
echo "ID a eliminar: " . $id;
try {
    
    $cart = new Cart();

    $cart->removeFromCart($id);

    // header("Location: ../index.php?section=cart");
    exit;
} catch(\Exception $e) {
    $_SESSION['failMessage'] = "Ocurrió un error inesperado al tratar de eliminar el producto.";
    header("Location: ../index.php?section=cart");
    exit;
}
