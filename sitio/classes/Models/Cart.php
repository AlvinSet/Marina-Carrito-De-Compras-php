<?php

namespace App\Models;

use App\Models\Product;

class Cart
{
    protected $cartContents = [];

    public function getCartContents()
    {
        return $_SESSION['cartContents'] ?? [];
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
        // // Filtrar los productos que no coinciden con el ID que se va a eliminar
        // $this->cartContents = array_filter($this->cartContents, function ($product) use ($product_id) {
        //     return $product->getIdProduct() !== $product_id;
        // });

        // // Actualizar la sesión con los productos actualizados
        // $_SESSION['cartContents'] = $this->cartContents;
    }
    
}
