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

    public function addToCart($product_id, $quantity =1)
    {

        $product = (new Product())->byId($product_id);

          // Verificar si el producto ya está en el carrito
        if (isset($this->cartContents[$product_id])) {
            $this->cartContents[$product_id]['quantity']++;
        } else {
            $this->cartContents[$product_id] = [
                'product' => $product,
                'quantity' => 1,
            ];
        }

        $this->setCartContents($this->cartContents);

        // $this->cartContents[] = $product;

        // $this->setCartContents($this->cartContents);

    }

    public function removeFromCart($product_id)
    {
        $product_id = intval($product_id);

        
        $this->cartContents = $_SESSION['cartContents'];

        foreach ($this->cartContents as $key => $product) {
            if ($product['product']->getId_product() === $product_id) {
                // Si la cantidad es mayor a 1, simplemente reducir la cantidad
                if ($product['quantity'] > 1) {
                    $this->cartContents[$key]['quantity'] -= 1;
                } else {
                    // Si la cantidad es 1 o menos, eliminar el producto del carrito
                    unset($this->cartContents[$key]);
                }
                break;
            }
        }


        // foreach ($this->cartContents as $key => $product) {
        //     echo "ID del producto en el carrito: " . $product->getId_product() . "<br>";

        //     if ($product->getId_product() === $product_id) {
        //         unset($this->cartContents[$key]);
        //         break;
        //     }
        // }

        $_SESSION['cartContents'] = $this->cartContents;

    }

    public function getTotalPrice()
    {
        $totalPrice = 0;

        foreach ($this->cartContents as $product) {
            $totalPrice += $product['product']->getPrice()* $product['quantity'];
        }

        return $totalPrice;
    }
    
}
