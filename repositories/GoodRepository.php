<?php
namespace App\repositories;

use App\entities\Good;
use App\repositories\Repository;

class GoodRepository extends Repository
{
    private $id;
    private $file_name;
    private $views;
    private $likes;
    private $description;
    private $item_name;
    private $price;
    
    public $params = [
        'id',
        'file_name',
        'views',
        'likes',
        'description',
        'item_name',
        'price'
    ];
    
    public function getEntityClass(): string {
        return Good::class;
    }
    
    public function getTableName(): string
    {
        return 'goods';
    }
    
    
    
    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return mixed
     */
    public function getFile_name()
    {
        return $this->file_name;
    }
    
    /**
     * @return mixed
     */
    public function getViews()
    {
        return $this->views;
    }
    
    /**
     * @return mixed
     */
    public function getLikes()
    {
        return $this->likes;
    }
    
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @return mixed
     */
    public function getItem_name()
    {
        return $this->item_name;
    }
    
    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @param mixed $file_name
     */
    public function setFile_name($file_name)
    {
        $this->file_name = $file_name;
    }
    
    /**
     * @param mixed $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }
    
    /**
     * @param mixed $likes
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }
    
    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * @param mixed $item_name
     */
    public function setItem_name($item_name)
    {
        $this->item_name = $item_name;
    }
    
    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

}
