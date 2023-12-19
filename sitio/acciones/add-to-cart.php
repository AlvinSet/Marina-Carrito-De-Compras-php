<?php
use App\Models\Cart;

require_once __DIR__ . '/../bootstrap/init.php';

$id = $_GET['id'];
$name_product= $_POST['name_product'];

$cartContents = $_SESSION['cartContents'] ?? [];

try {
    
    $cart = new Cart();

    
    $cart->setCartContents($cartContents);

    $cart->addToCart($id);

    
    $_SESSION['cartContents'] = $cart->getCartContents();

    $_SESSION['successMessage'] = "El producto <b>" . $name_product . "</b> se agregó exitosamente al carrito.";
    header("Location: ../index.php?section=cart");
    exit;
} catch(\Exception $e) {
    $_SESSION['failMessage'] = "Ocurrió un error inesperado al tratar de eliminar el producto.";
    header("Location: ../index.php?section=store");
    exit;
}