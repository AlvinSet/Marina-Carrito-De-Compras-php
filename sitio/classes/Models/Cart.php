<?php

namespace App\Models;

use App\Models\Product;

class Cart
{
    protected $cartContents = [];

    public function getCartContents()
    {
        $this->cartContents = $_SESSION['cartContents'] ?? [];
        return $this->cartContents;
    }

    public function setCartContents($contents)
    {
        $this->cartContents = $contents;
    }

    public function addToCart($product_id)
    {

        $product = (new Product())->byId($product_id);

        $this->cartContents[] = $product;
        $_SESSION['cartContents'] = $this->cartContents;

    }

    public function removeFromCart($product_id)
    {

        foreach ($this->cartContents as $key => $product) {
            if ($product->getId_product() === $product_id) {
                unset($this->cartContents[$key]);
                break;
            }
        }
    
        // Actualizar la sesión con los productos actualizados
        $_SESSION['cartContents'] = $this->cartContents;

    }

    
}
