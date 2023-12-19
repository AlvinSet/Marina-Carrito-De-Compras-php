<?php
use App\Models\Cart;
require_once __DIR__ . '/../bootstrap/init.php';

$product_id = $_GET['id'];
// echo "ID a eliminar: " . $product_id;
try {
    
    $cart = new Cart();


    if ($product_id !== null) {
        $cart->removeFromCart($product_id);
        $_SESSION['cartContents'] = $cart->getCartContents();
    }


    $_SESSION['succesMessage'] = "Se elimino el producto.";
    // header("Location: ../index.php?section=cart");
    exit;
} catch(\Exception $e) {
    $_SESSION['failMessage'] = "Ocurrió un error inesperado al tratar de eliminar el producto.";
    header("Location: ../index.php?section=cart");
    exit;
}
