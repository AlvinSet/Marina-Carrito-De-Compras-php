<?php

use App\Authentication\Authentication;
use App\Models\Product;
use App\Models\Purchases;

$user = (new Authentication())->getUser();
$user_id = (new Authentication())->getId();

$purchases = new Purchases();
$userPurchases = $purchases->getUserPurchasesWithDetails($user_id);




?>

<main class="main-content">
    <section class="container">

        <div class="row g-4">
            <div class="col-lg-3">
                <div class="card-body text-center">
                    <h1 class="mb-1 h title-section-profile">Mi Perfil</h1>
                    <ul class="list-group">
                        <li class="list-group-item"><?= $user->getName(); ?> </li>
                        <li class="list-group-item"><?= $user->getLastname(); ?> </li>
                        <li class="list-group-item"><?= $user->getEmail(); ?> </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <h2 class="h">Compras</h2>
                <div>
                    <?php foreach ($userPurchases as $purchase) : ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h3 class="card-title h">Id de Compra: <?= $purchase['purchase_id']; ?> </h3>
                                <p class="card-text">Fecha de compra: <?= $purchase['purchase_date'] ?></p>

                                <ul class="list-group list-group-flush">
                                    <?php foreach ($purchase['details'] as $detail) : ?>
                                        <li class="list-group-item">
                                            <?php
                                            $product = new Product();
                                            $product = $product->byId($detail['products_fk']);
                                            ?>
                                            <span class="badge bg-secondary" >
                                            <?= $product->getName_product(); ?>
                                            </span>
                                            <?= $product->getWeight(); ?>g <?= $detail['quantity'] ?> x <?= $detail['price'] ?>
                                        </li>
                                    <?php endforeach; ?>

                                    <li class="list-group-item">Saldo Total:<?= $purchase['total_amount'] ?></li>
                                
                                </ul>
                            </div>

                        </div>
                        <?php endforeach; ?>


                </div>
            </div>
        </div>


    </section>
</main>