<?php

use App\Models\Product;

$product = new Product();
$products = $product->allProducts();
?>
<main>
    <div class="container">
        <h1 class="title-section d-flex justify-content-center h">Productos</h1>
        <ul class="d-flex row justify-content-center">
            <?php foreach ($products as $product) : ?>
                <li class="product">
                    <div class="card">
                        <img src="<?= "images/products/" . $product->getImg(); ?>" class="card-img-top" alt="<?= $product->getImg_description(); ?>" srcset="">
                        <div class="card-body">
                            <h2 class="title-card-product text-center h"><?= $product->getName_product(); ?></h2>
                            <ul class="text-center p">
                                <li>Peso: <?= $product->getWeight(); ?></li>
                                <li>$ <?= $product->getPrice(); ?></li>
                                <li><?= $product->getCategory()->getCategory(); ?></li>
                            </ul>
                            <div class="d-flex justify-content-around mt-3 cont-btn">
                                <a href="index.php?section=detail-product&id=<?= $product->getId_product(); ?>" class="btn color-btn size-btn mt-1" >Ver más</a>
                                <a href="#" class="btn color-btn size-btn mt-1">Añadir</a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php
            endforeach;
            ?>
        </ul>
    </div>
</main>