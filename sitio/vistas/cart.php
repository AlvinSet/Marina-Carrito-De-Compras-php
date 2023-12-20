<?php
require_once __DIR__ . '/../bootstrap/init.php';

use App\Models\Cart;

$cart = new Cart();
$cartContents = $cart->getCartContents();
$totalPrice = $cart->getTotalPrice();
?>

<main class="main-content">
    <section class="container">
        <h1 class="mb-1 h title-section-profile">Mi Carrito</h1>

        <?php if (empty($cartContents)) : ?>
            <p>¡Tu carrito está vacío!</p>
        <?php else : ?>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <thead>
                        <?php foreach ($cartContents as $product) : ?>
                            <tr>
                                <td class="h"><?= $product['product']->getName_product() ?></td>
                                <td class="p"><?= $product['product']->getPrice() ?></td>
                                <td class="p"><?= $product['quantity'] ?></td>
                                <td><a href="acciones/delete-from-cart.php?id=<?= $product['product']->getId_product() ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Borrar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </thead>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <p class=" p total-price">Precio Total: $ <?= $totalPrice; ?>
            </div>

            <div class="d-flex justify-content-end">
                <form action="acciones/create-purchase.php" method="post">
                    <input type="hidden" name="total_amount" value="<?= $totalPrice; ?>">

                    <button type="submit" class="btn color-btn size-btn"> <i class="bi bi-bag-fill"></i> Comprar</button>
                </form>
            </div>

        <?php endif; ?>

    </section>
</main>