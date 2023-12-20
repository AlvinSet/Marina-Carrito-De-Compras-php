<?php
namespace App\Models;

use App\DB\DBConexion;
use PDO;

class PurchaseDetails{

    protected int $detail_id = 0;
    protected int $purchases_fk = 0;
    protected int $products_fk = 0;
    protected int $price = 0;
    protected string $quantity = "";



    public function createPurchaseDetail(array $data): void
    {
        $db = DBConexion::getDB();
        $query = "INSERT INTO purchase_details (purchases_fk, products_fk, quantity, price)
        VALUES (:purchases_fk, :products_fk, :quantity, :price)";
        $stmt = $db -> prepare($query);
        $stmt -> execute(
            [
            'purchases_fk'           => $data['category_fk'],
            'products_fk'               => $data['products_fk'],
            'quantity'          => $data['quantity'],
            'price'                 => $data['price'],
            ]
        );
    }
}