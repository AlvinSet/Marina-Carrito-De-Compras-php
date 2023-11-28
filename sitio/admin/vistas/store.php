<?php

use App\Models\Product;


$product = new Product();
$products = $product->allProducts();
?>
<main>
    <div class="container">

        <div>
            <a class="btn color-btn size-btn mt-1" href="index.php?section=new-product"> <i class="bi bi-plus-circle-fill"></i> Agregar Producto</a>
        </div>
        <ul class="d-flex flex-column justify-content-center">
            <?php foreach ($products as $product) : ?>
                <li class="product-list">
                    <div class="card flex-row">
                        <img src="<?= "../images/products/" . $product->getImg(); ?>" class="img-list" alt="<?= $product->getImg_description(); ?>" srcset="">
                        <div class="card-body">
                            <h2 class="text-center h"><?= $product->getName_product(); ?></h2>
                            <ul class="text-center p">
                                <li><?= $product->getDetail_product(); ?></li>
                                <li>Peso: <?= $product->getWeight(); ?></li>
                                <li>$ <?= $product->getPrice(); ?></li>
                                <li><?= $product->getCategory()->getCategory(); ?></li>

                            </ul>
                            <div class="d-flex justify-content-around mt-3 cont-btn">
                                <a href="index.php?section=delete-product-view&id=<?= $product->getId_product(); ?>" class="btn color-btn size-btn mt-1"> <i class="bi bi-trash3-fill"></i> Eliminar</a>
                                <a href="index.php?section=edit-product-view&id=<?= $product->getId_product(); ?>" class="btn color-btn size-btn mt-1"> <i class="bi bi-pencil-fill"></i> Editar</a>
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