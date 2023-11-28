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
                    <a href="#" class="btn color-btn">Añadir</a>
                </div>
            </div>
        </div>
    </div>
</main>