<?php
require_once __DIR__ . '/../bootstrap/init.php';

use App\Models\Cart;

$cart = new Cart();
$cartContents = $cart->getCartContents();
?>

<main class="main-content">
    <section class="container">
        <h1 class="mb-1">Mi Carrito</h1>

        <?php if (empty($cartContents)) : ?>
            <p>¡Tu carrito está vacío!</p>
        <?php else : ?>
            <ul>
                <?php foreach ($cartContents as $product) : ?>

                    <li>
                        <div>
                            <h2> <?= $product->getName_product() ?></h2>
                            <p>
                            <?= $product->getPrice() ?>
                            </p>

                            <a href="acciones/delete-from-cart.php?id=<?= $product->getId_product() ?>" class="btn color-btn size-btn mt-1">Borrar Producto</a>
                        </div>

                    </li>

                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    </section>
</main>