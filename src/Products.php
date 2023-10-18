<?php

namespace Gokays\Feeder;

use Gokays\Feeder\Models\Product;

class Products
{
    /**
     * @var array
     */
    protected $products = [];

    /**
     * @param array $products
     */
    public function __construct(array $products)
    {
        $this->products = array_map([$this, 'parse'], $products);
    }

    /**
     * @param array $product
     * @return Product
     */
    private function parse(array $product)
    {
        return (new Product())
            ->setName($product['name'])
            ->setPrice($product['price'])
            ->setCategory($product['category']);
    }

    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }
}