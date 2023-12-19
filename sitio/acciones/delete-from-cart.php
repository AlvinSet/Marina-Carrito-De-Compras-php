<?php
use App\Models\Cart;
require_once __DIR__ . '/../bootstrap/init.php';

$id = $_GET['id'];
echo "ID a eliminar: " . $id;
try {
    
    $cart = new Cart();


    // echo "Antes de eliminar: ";
    // var_dump($_SESSION['cartContents']);

    $cart->removeFromCart($id);

    $_SESSION['cartContents'] = $cart->getCartContents();
    
    // echo "Después de eliminar: ";
    // var_dump($_SESSION['cartContents']);


    header("Location: ../index.php?section=cart");
    exit;
} catch(\Exception $e) {
    $_SESSION['failMessage'] = "Ocurrió un error inesperado al tratar de eliminar el producto.";
    header("Location: ../index.php?section=cart");
    exit;
}
