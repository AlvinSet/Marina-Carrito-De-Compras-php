<?php
namespace App\Models;

use App\DB\DBConexion;
use PDO;

class Category{
    protected int $category_id;
    protected string $category;


    public function loadArrayData(array $data):void
    {
        $this->setCategory_id($data['category_id']);
        $this->setCategory($data['category']);
    }

    /**
     * @return array|self[]
     */
    public function allCategories(): array
    {
        $db = DBConexion::getDB();
        $query = "SELECT * FROM categories";
        $stmt = $db->prepare($query);
        $stmt -> execute();
        $stmt -> setFetchMode(PDO::FETCH_CLASS, self::class);

        return $stmt->fetchAll();
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

    /**
     * Get the value of category_id
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }
}
