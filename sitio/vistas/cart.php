<?php
require_once __DIR__ . '/../bootstrap/init.php';

use App\Models\Cart;

$cart = new Cart();
$cartContents = $cart->getCartContents();
$totalPrice = $cart->getTotalPrice();
?>

<main class="main-content">
    <section class="container">
        <h1 class="mb-1 h title-section">Mi Carrito</h1>

        <?php if (empty($cartContents)) : ?>
            <p>¡Tu carrito está vacío!</p>
        <?php else : ?>
            <ul class="mt-5 ">
                <?php foreach ($cartContents as $product) : ?>

                    <li class="mt-2 row g-4">
                        <div class=" d-flex justify-content-between align-items-baseline">

                            <h2 class="h cart-list"> <?= $product->getName_product() ?></h2>
                            <p class="p ">
                                Precio: $ <?= $product->getPrice() ?>
                            </p>

                            <a href="acciones/delete-from-cart.php?id=<?= $product->getId_product() ?>" class="col-lg-1 btn color-btn size-btn mt-1"><i class="bi bi-trash3-fill"></i> Borrar</a>
                        </div>

                    </li>

                <?php endforeach; ?>
                <li class="mt-4">
                    <div class="d-flex justify-content-end">
                        <p class=" p total-price">Precio Total: $ <?= $totalPrice; ?>
                    </div>
                    </p>
                </li>

            </ul>
            <div class="d-flex justify-content-end">
                <form action="acciones/create-purchase.php" method="post">
                    <input type="hidden" name="total_amount" value="<?= $totalPrice; ?>">

                    <button type="submit" class="btn color-btn size-btn"> <i class="bi bi-bag-fill"></i> Comprar</button>
                </form>
            </div>


        <?php endif; ?>

    </section>
</main>