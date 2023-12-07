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

    $name_product    = $_POST['name_product'];
    $price           = $_POST['price'];
    $weight          = $_POST['weight'];
    $detail_product  = $_POST['detail_product'];
    $img             = $_FILES['img'];
    $img_description = $_POST['img_description'];
    $stock           = $_POST['stock'];
    $category_fk     = $_POST['category_fk'];



    //Validación
$mistakes = [];

if(empty($name_product)) {
    $mistakes['product'] = "El nombre del producto no debe estar vacío.";
} else if(strlen($name_product) < 3) {
    $mistakes['product'] = "El nombre del producto debe tener al menos 3 caracteres.";
}

if(empty($price)) {
    $mistakes['price'] = "El precio no debe estar vacío.";
}

if(empty($weight)) {
    $mistakes['weight'] = "El peso no debe estar vacío.";
}

if(empty($detail_product)) {
    $mistakes['detail_product'] = "El detalle del producto no debe estar vacío.";
}

if(empty($stock)) {
    $mistakes['stock'] = "Tienes que agregar el stock disponible del producto.";
}

if(count($mistakes) > 0) {
    $_SESSION['failMessage'] = "Hay errores en el formulario. Por favor, revisá los campos e intentalo de nuevo.";
    $_SESSION['mistakes'] = $mistakes;
    $_SESSION['oldData']= $_POST;

    header("Location: ../index.php?section=new-product");
    exit;
}


if(!empty($img['tmp_name'])){
    $imgName = date('YmdHis')."_". $img['name'];
    move_uploaded_file($img['tmp_name'], __DIR__.'/../../images/products/'. $imgName);
}



    try {
        (new Product())->createProduct([
            'category_fk'   => $category_fk,
            'user_fk'       =>  $authentication->getId(),
            'name_product'  =>  $name_product,
            'price'         =>  $price,
            'weight'        =>  $weight,
            'detail_product'=>  $detail_product,
            'img'           =>  $imgName ?? null,
            'img_description'=> $img_description,
            'stock'         => $stock,

        ]);

        $_SESSION['successMessage'] = "El producto <b>" . $name_product . "</b> se creó exitosamente.";

        header("Location: ../index.php?section=store");
    exit;
    } catch (Exception $e) {
        $_SESSION['failMessage'] = "Ocurrió un error inesperado al intentar crear un producto nuevo, intenta más tarde";
        $_SESSION['oldData']= $_POST;
        header("Location: ../index.php?section=new-product");
        exit;
        // $errorMessage = $e->getMessage(); // Obtiene el mensaje de error
        // echo "<p>Error: $errorMessage</p>";

    } 