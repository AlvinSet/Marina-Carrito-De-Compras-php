<?php
namespace App\DataTransfer;

use App\Models\Category;
use App\Models\Product;

class DataRowProduct
{
//Product
    protected int $product_id;
    protected int $user_fk ;
    protected int $category_fk;
    protected string $name_product;
    protected int $price;
    protected string $weight;
    protected string $detail_product;
    protected ?string $img;
    protected ?string $img_description;
    protected ?string $stock;

//Category
    protected ?string $category_id = null;
    protected ?string $category = null;


    public function getProduct(): Product
    {
        $product = new Product();
        $product->loadArrayData(
            [
            'product_id'            => $this->product_id,
            'category_fk'           => $this->category_fk,
            'user_fk'               => $this->user_fk,
            'name_product'          => $this->name_product,
            'price'                 => $this->price,
            'weight'                => $this->weight,
            'detail_product'        => $this->detail_product,
            'img'                   => $this->img,
            'img_description'       => $this->img_description,
            'stock'                 => $this->stock,]);


        $ctgry = new Category();
        $ctgry->loadArrayData([
            'category_id'                 => $this->category_id,
            'category'                 => $this->category,
        ]);

        $product->setCategory($ctgry);

        return $product;
        
    }


}