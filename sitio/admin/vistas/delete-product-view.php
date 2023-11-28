<?php

use App\Models\Product;

$product = new Product();
$product = $product->byId($_GET['id']);

?>
<main>
    <div class="container">
        <div class="card d-flex card-detail">
            <img src="<?= "../images/products/" . $product->getImg(); ?> " class="card-img-top" alt="<?= $product->getImg_description(); ?>" srcset="">
            <div class="card-body detail-cont">
                <h2 class="text-center h"><?= $product->getName_product(); ?></h2>
                <p class="p p-detail"><?= $product->getDetail_product(); ?></p>
                <p class="card-text">
                <ul class="p">
                    <li>Peso: <?= $product->getWeight(); ?></li>
                    <li>$ <?= $product->getPrice(); ?></li>
                    <li>Categoria</li>
                    <li><?= $product->getId_product(); ?></li>
                </ul>
                </p>
                <div>
                    <form action="acciones/delete-product.php?id=<?= $product->getId_product(); ?>" method="post">
                    <input type="hidden" name="name_product" value="<?= $product->getName_product();?>">
                        <button type="submit" class="btn color-btn"><i class="bi bi-trash3-fill"></i> Confirmar eliminación</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>