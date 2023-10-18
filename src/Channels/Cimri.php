<?php

namespace Gokays\Feeder\Channels;

use Gokays\Feeder\Products;
use Gokays\Feeder\Models\Product;
use Gokays\Feeder\Contracts\IChannel;

class Cimri implements IChannel
{
    /**
     * @param Products $products
     * @return string
     */
    public function generate(Products $products): string
    {
        $response = [
            'products' => []
        ];

        /**
         * @var $product Product
         */
        foreach ($products->getProducts() as $product) {
            $response['products'][] = [
                'product_name' => $product->getName(),
                'product_price' => (float) $product->getPrice(),
                'product_category' => $product->getCategory()
            ];
        }

        return json_encode($response, JSON_PRETTY_PRINT | JSON_PRESERVE_ZERO_FRACTION);
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return IChannel::OUTPUT_JSON;
    }
}