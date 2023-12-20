<?php

namespace App\Models;

use App\DB\DBConexion;
use App\Models\Cart;
use PDO;

class Purchases{

    protected int $purchase_id;
    protected int $user_fk;
    protected  $purchase_date;
    protected int $total_amount;
    

    public function getUserPurchasesWithDetails(int $userID): array
{
    $db = DBConexion::getDB();
    $query = "SELECT * FROM purchases WHERE user_fk = :userID";
    $stmt = $db->prepare($query);
    $stmt->execute(['userID' => $userID]);

    $userPurchases = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($userPurchases as &$purchase) {
        $purchase['details'] = $this->getPurchaseDetails($purchase['purchase_id']);
    }
    return $userPurchases;
}
public function getPurchaseDetails(int $purchaseId): array
{
    $db = DBConexion::getDB();
    $query = "SELECT * FROM purchase_details WHERE purchases_fk = :purchaseId";
    $stmt = $db->prepare($query);
    $stmt->execute(['purchaseId' => $purchaseId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function createPurchase(array $data): void
    {
        try{ 
            $db = DBConexion::getDB();
            $db->beginTransaction();
            $query = "INSERT INTO purchases (user_fk, purchase_date, total_amount)
            VALUES (:user_fk, :purchase_date, :total_amount)";
            $stmt = $db -> prepare($query);
            $stmt -> execute(
                [
                'user_fk'               => $data['user_fk'],
                'purchase_date'         => $data['purchase_date'],
                'total_amount'          => $data['total_amount'],
                ]
            );
    
            // Obtener el ID de la compra recién insertada
            $purchaseId = $db->lastInsertId();

            // Obtener detalles del carrito
            $cart = new Cart();
            $cartContents = $cart->getCartContents();
    
            $this->createPurchaseDetail($purchaseId, $cartContents);

            $db->commit();

            }catch(\Exception $e){
                $db->rollBack();
            throw $e;
            };


    }

    public function createPurchaseDetail(int $purchaseId, array $details): void
    {
        $db = DBConexion::getDB();

        

        foreach ($details as $detail) {
            $query = "INSERT INTO purchase_details (purchases_fk, products_fk, quantity, price)
                            VALUES (:purchases_fk, :products_fk, :quantity, :price)";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'purchases_fk' => $purchaseId,
                'products_fk'  => $detail['product']->getId_product(),
                'quantity'     => $detail['quantity'],
                'price'        => $detail['product']->getPrice(),
            ]);
        }


    }
    

    /**
     * Get the value of purchase_id
     */ 
    public function getPurchase_id()
    {
        return $this->purchase_id;
    }

    /**
     * Set the value of purchase_id
     *
     * @return  self
     */ 
    public function setPurchase_id($purchase_id)
    {
        $this->purchase_id = $purchase_id;

        return $this;
    }

    /**
     * Get the value of user_fk
     */ 
    public function getUser_fk()
    {
        return $this->user_fk;
    }

    /**
     * Set the value of user_fk
     *
     * @return  self
     */ 
    public function setUser_fk($user_fk)
    {
        $this->user_fk = $user_fk;

        return $this;
    }

    /**
     * Get the value of purchase_date
     */ 
    public function getPurchase_date()
    {
        return $this->purchase_date;
    }

    /**
     * Set the value of purchase_date
     *
     * @return  self
     */ 
    public function setPurchase_date($purchase_date)
    {
        $this->purchase_date = $purchase_date;

        return $this;
    }

    /**
     * Get the value of total_amount
     */ 
    public function getTotal_amount()
    {
        return $this->total_amount;
    }

    /**
     * Set the value of total_amount
     *
     * @return  self
     */ 
    public function setTotal_amount($total_amount)
    {
        $this->total_amount = $total_amount;

        return $this;
    }
}