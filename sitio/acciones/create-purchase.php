<?php

use App\Authentication\Authentication;
use App\Models\Purchases;


require_once __DIR__ . '/../bootstrap/init.php';

$authentication = new Authentication();

if(!$authentication -> isAuthenticated()) {
    $_SESSION['failMessage'] = "Para realizar esta acción se requiere iniciar sesión.";
    header('Location: ../index.php?section=login-view');
    exit;
}

$total_amount               = $_POST['total_amount'];

try {
    // Formatear la fecha
    $purchase_date = new DateTime(); // Crear objeto DateTime con la fecha y hora actual
    $purchase_date_string = $purchase_date->format('Y-m-d H:i:s'); 


    (new Purchases())->createPurchase([
        'user_fk'               =>  $authentication->getId(),
        'purchase_date'         =>  $purchase_date_string,
        'total_amount'          =>  $total_amount,
        
    ]);

    $_SESSION['successMessage'] = "La compra se realizó exitosamente.";

    echo  'se creo la compra';
    header("Location: ../index.php?section=home");
exit;
} catch (Exception $e) {
    $_SESSION['failMessage'] = "Ocurrió un error inesperado al intentar crear purchase detail, intenta más tarde";
    $_SESSION['oldData']= $_POST;
    header("Location: ../index.php?section=new-product");
    exit;
    // $errorMessage = $e->getMessage(); // Obtiene el mensaje de error
    // echo "<p>Error: $errorMessage</p>";

} 
