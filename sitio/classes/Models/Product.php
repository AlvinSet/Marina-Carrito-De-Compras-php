<?php
namespace App\Models;

use App\DataTransfer\DataRowProduct;
use App\DB\DBConexion;
use PDO;

class Product{
    protected int $product_id = 0;
    protected int $user_fk = 0;
    protected int $category_fk = 0;
    protected string $name_product = "";
    protected int $price = 0;
    protected string $weight = "";
    protected string $detail_product = "";
    protected ?string $img = "";
    protected ?string $img_description = "";
    // protected ?string $category = "";
    protected ?string $stock = "";

    protected Category $category;


    public function loadArrayData(array $data):void
    {
        $this->setId_product($data['product_id']);
        $this->setUser_fk($data['user_fk']);
        $this->setCategory_fk($data['category_fk']);
        $this->setName_product($data['name_product']);
        $this->setPrice($data['price']);
        $this->setWeight($data['weight']);
        $this->setDetail_product($data['detail_product']);
        $this->setImg($data['img']);
        $this->setImg_description($data['img_description']);
    }


    public function allProducts(): array 
    {
        $db = DBConexion::getDB();
        $query = "SELECT * FROM products p
                INNER JOIN categories c
                ON c.category_id = p.category_fk
                ORDER BY p.product_id";
        $stmt = $db -> prepare($query);
        $stmt -> execute();

        $stmt -> setFetchMode(PDO::FETCH_CLASS, DataRowProduct::class);

        return array_map(function(DataRowProduct $registro){
            return $registro->getProduct();
        }, $stmt->fetchAll());
    }

        /**
     * @param int $id
     * @return self|null
     */
    public function byId(int $id): ?self
    {
        $db = DBConexion::getDB();
        $query = "SELECT * FROM products
                WHERE product_id = :id";
        $stmt = $db->prepare($query);
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        $product = $stmt->fetch();

        if(!$product) return null;

        return $product;
    }

    //Create Product
    public function createProduct(array $data): void
    {
        $db = DBConexion::getDB();
        $query = "INSERT INTO products (category_fk, user_fk, name_product, price, weight, detail_product, img, img_description, stock)
        VALUES (:category_fk, :user_fk, :name_product, :price, :weight, :detail_product, :img, :img_description, :stock)";
        $stmt = $db -> prepare($query);
        $stmt -> execute(
            [
            'category_fk'           => $data['category_fk'],
            'user_fk'               => $data['user_fk'],
            'name_product'          => $data['name_product'],
            'price'                 => $data['price'],
            'weight'                => $data['weight'],
            'detail_product'        => $data['detail_product'],
            'img'                   => $data['img'],
            'img_description'       => $data['img_description'],
            'stock'                 => $data['stock'],
            ]
        );
    }

    //Delete Product
    public function deleteProduct(int $id){
        $db = DBConexion::getDB();
        $query = "DELETE FROM products
                WHERE product_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
    }

    //Edit Product
    public function editProduct(int $product_id, array $data):void
    {
        $db = DBConexion::getDB();
        $query = "UPDATE products
                SET name_product  = :name_product,
            price                 = :price,
            weight                = :weight,
            detail_product        = :detail_product,
            img                   = :img,
            img_description       = :img_description,
            stock                 = :stock,
            category_fk           = :category_fk
            WHERE product_id = :product_id";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'name_product'          => $data['name_product'],
            'price'                 => $data['price'],
            'weight'                => $data['weight'],
            'detail_product'        => $data['detail_product'],
            'img'                   => $data['img'],
            'img_description'       => $data['img_description'],
            'stock'                 => $data['stock'],
            'category_fk'           => $data['category_fk'],
            'product_id'            =>$product_id
        ]);
    }





    /**
     * Get the value of id_product
     */ 
    public function getId_product()
    {
        return $this->product_id;
    }

    /**
     * Set the value of id_product
     *
     * @return  self
     */ 
    public function setId_product($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }
    

    /**
     * Get the value of name_product
     */ 
    public function getName_product()
    {
        return $this->name_product;
    }

    /**
     * Set the value of name_product
     *
     * @return  self
     */ 
    public function setName_product($name_product)
    {
        $this->name_product = $name_product;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of weight
     */ 
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */ 
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the value of detail_product
     */ 
    public function getDetail_product()
    {
        return $this->detail_product;
    }

    /**
     * Set the value of detail_product
     *
     * @return  self
     */ 
    public function setDetail_product($detail_product)
    {
        $this->detail_product = $detail_product;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of img_description
     */ 
    public function getImg_description()
    {
        return $this->img_description;
    }

    /**
     * Set the value of img_description
     *
     * @return  self
     */ 
    public function setImg_description($img_description)
    {
        $this->img_description = $img_description;

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
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of category_fk
     */ 
    public function getCategory_fk()
    {
        return $this->category_fk;
    }

    /**
     * Set the value of category_fk
     *
     * @return  self
     */ 
    public function setCategory_fk($category_fk)
    {
        $this->category_fk = $category_fk;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }
}