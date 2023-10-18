<?php

namespace Gokays\Feeder\Channels;

use Gokays\Feeder\Products;
use Gokays\Feeder\Models\Product;
use Gokays\Feeder\Contracts\IChannel;

class Google implements IChannel
{
    /**
     * @param Products $products
     * @return string
     */
    public function generate(Products $products): string
    {
        $response = [];

        /**
         * @var $product Product
         */
        foreach ($products->getProducts() as $product) {
            $response[] = [
                'name' => $product->getName(),
                'price' => (float) $product->getPrice(),
                'category' => $product->getCategory()
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