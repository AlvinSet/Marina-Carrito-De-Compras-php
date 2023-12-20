<?php

use App\Authentication\Authentication;
use App\Models\Product;
use App\Models\Purchases;

$user = (new Authentication())->getUser();
$user_id = (new Authentication())->getId();

$purchases = new Purchases();
$allUserPurchases = $purchases->getAllUsersWithPurchases();

?>

<main class="main-content">
    <section class="container">

        <div class="row g-4">
            <div class="col-lg-3">
                <div class="card-body text-center">
                    <h1 class="mb-1 h title-section-profile">Usuarios y Compras</h1>
                </div>
            </div>
            <div class="col-lg-9">
                <h2 class="h">Compras de Usuarios</h2>
                <div>
                    <?php foreach ($allUserPurchases as $userPurchases) : ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h3 class="card-title h">Usuario: <?= $userPurchases['name'] . ' ' . $userPurchases['lastname']; ?></h3>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($userPurchases['purchases'] as $purchase) : ?>
                                        <li class="list-group-item">
                                            <h5>Id de Compra: <?= $purchase['purchase_id']; ?></h5>
                                            <p>Fecha de compra: <?= $purchase['purchase_date'] ?></p>
                                            <ul class="list-group list-group-flush">
                                                <?php foreach ($purchases->getPurchaseDetails($purchase['purchase_id']) as $detail) : ?>
                                                    <li class="list-group-item">
                                                        <?php
                                                        $product = new Product();
                                                        $product = $product->byId($detail['products_fk']);
                                                        ?>
                                                        <span class="badge bg-secondary">
                                                            <?= $product->getName_product(); ?>
                                                        </span>
                                                        <?= $product->getWeight(); ?>g <?= $detail['quantity'] ?> x <?= $detail['price'] ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <p>Saldo Total: <?= $purchase['total_amount'] ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>