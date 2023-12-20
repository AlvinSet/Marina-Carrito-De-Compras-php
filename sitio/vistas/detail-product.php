<?php

use App\Models\Product;

$product = new Product();
$product = $product->byId($_GET['id']);

?>
<main>
    <div class="container d-flex justify-content-center">
        
        <div class="card d-flex card-detail">
            <img src="<?= "images/products/" . $product->getImg(); ?> " class="card-img-top" alt="<?= $product->getImg_description(); ?>" srcset="">
            <div class="card-body detail-cont">
                <h1 class="text-center h"><?= $product->getName_product(); ?></h1>
                <p class="p p-detail"><?= $product->getDetail_product(); ?></p>
                <p class="card-text">
                <ul class="p">
                    <li>Peso: <?= $product->getWeight(); ?></li>
                    <li>$ <?= $product->getPrice(); ?></li>
                    <li>Categoria</li>
                </ul>
                </p>
                <div>
                <form action="acciones/add-to-cart.php?id=<?= $product->getId_product(); ?>" method="post">
                                    <input type="hidden" name="name_product" value="<?= $product->getName_product(); ?>">
                                    <button type="submit" class="btn color-btn size-btn mt-1"> Añadir </button>
                                </form>
                </div>
            </div>
        </div>
    </div>
</main>