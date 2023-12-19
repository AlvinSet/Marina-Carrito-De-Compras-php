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
        $index = $this->findProductIndex($product_id);

        // Si se encuentra el producto, eliminarlo del carrito
        if ($index !== false) {

            echo "Antes de eliminar (antes de array_splice): ";
        var_dump($_SESSION['cartContents']);

            array_splice($this->cartContents, $index, 1);
            $_SESSION['cartContents'] = $this->cartContents;

            echo "Después de eliminar (después de array_splice): ";
            var_dump($_SESSION['cartContents']);
        }
        
    }

    protected function findProductIndex($product_id)
{
    // Buscar el índice del producto en el carrito
    foreach ($this->cartContents as $index => $product) {
        if ($product->getId_product() === $product_id) {
            return $index;
        }
    }

    // Si no se encuentra el producto, devolver falso
    return false;
}
    
}
