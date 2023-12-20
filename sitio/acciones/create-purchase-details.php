<?php

use App\Authentication\Authentication;
use App\Models\PurchaseDetails;

require_once __DIR__ . '/../../bootstrap/init.php';

$authentication = new Authentication();

if(!$authentication -> isAuthenticated()) {
    $_SESSION['failMessage'] = "Para realizar esta acción se requiere iniciar sesión.";
    header('Location: ../index.php?section=login-view');
    exit;
}


$purchases_fk           = $_POST['purchases_fk '];
$products_fk            = $_POST['products_fk'];
$price                  = $_POST['price'];
$quantity               = $_POST['quantity '];


try {
    (new PurchaseDetails())->createPurchaseDetail([
        'purchases_fk'      => $purchases_fk,
        'products_fk'       => $products_fk,
        // 'user_fk'           =>  $authentication->getId(),
        'price'             =>  $price,
        'quantity'          =>  $quantity,
        

    ]);

    $_SESSION['successMessage'] = "El se creo el purchase detail exitosamente.";

    header("Location: ../index.php?section=store");
exit;
} catch (Exception $e) {
    $_SESSION['failMessage'] = "Ocurrió un error inesperado al intentar crear purchase detail, intenta más tarde";
    $_SESSION['oldData']= $_POST;
    header("Location: ../index.php?section=new-product");
    exit;
    // $errorMessage = $e->getMessage(); // Obtiene el mensaje de error
    // echo "<p>Error: $errorMessage</p>";

} 
