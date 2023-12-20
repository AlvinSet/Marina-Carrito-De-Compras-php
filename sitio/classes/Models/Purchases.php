<?php

namespace App\Models;

use App\DB\DBConexion;
use PDO;

class Purchases{

    protected int $purchase_id;
    protected int $user_fk;
    protected  $purchase_date;
    protected int $total_amount;
    



    public function createPurchase(array $data): void
    {
        $db = DBConexion::getDB();
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