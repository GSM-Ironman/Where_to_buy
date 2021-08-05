<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * @param mixed $product_name
     */
    public function setProductName($product_name): void
    {
        $this->product_name = $product_name;
    }

    /**
     * @return mixed
     */
    public function getProductDescription()
    {
        return $this->product_description;
    }

    /**
     * @param mixed $product_description
     */
    public function setProductDescription($product_description): void
    {
        $this->product_description = $product_description;
    }

    /**
     * @return mixed
     */
    public function getMagasins()
    {
        return $this->magasins;
    }

    /**
     * @param mixed $magasins
     */
    public function setMagasins($magasins): void
    {
        $this->magasins = $magasins;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $product_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $product_description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $magasins;

}
