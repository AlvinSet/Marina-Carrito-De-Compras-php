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
        $_SESSION['cartContents'] = $this->cartContents;
    }

    public function addToCart($product_id)
    {

        $product = (new Product())->byId($product_id);

        $this->cartContents[] = $product;
        // $_SESSION['cartContents'] = $this->cartContents;
        $this->setCartContents($this->cartContents);

    }

    public function removeFromCart($product_id)
    {
        $product_id = intval($product_id);
        echo "ID a eliminar: " . $product_id . "<br>";
        
        $this->cartContents = $_SESSION['cartContents'];
        echo "Antes de eliminar: ";
        
        //var_dump($this->cartContents);

        foreach ($this->cartContents as $key => $product) {
            echo "ID del producto en el carrito: " . $product->getId_product() . "<br>";

            if ($product->getId_product() === $product_id) {
                unset($this->cartContents[$key]);
                break;
            }
        }
        
        echo "Después de eliminar: ";
        //var_dump($this->cartContents);
    
        // Actualizar la sesión con los productos actualizados
        $_SESSION['cartContents'] = $this->cartContents;

    }

    
}
