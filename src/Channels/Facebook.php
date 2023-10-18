<?php

namespace Gokays\Feeder\Channels;

use DOMDocument;
use SimpleXMLElement;
use Gokays\Feeder\Products;
use Gokays\Feeder\Models\Product;
use Gokays\Feeder\Contracts\IChannel;

class Facebook implements IChannel
{
    /**
     * @param Products $products
     * @return string
     */
    public function generate(Products $products): string
    {
        $response = new SimpleXMLElement('<products />');

        /**
         * @var $product Product
         */
        foreach ($products->getProducts() as $product) {
            $item = $response->addChild('product');

            $item->addChild('name', $product->getName());
            $item->addChild('price', (float) $product->getPrice());
            $item->addChild('category', $product->getCategory());
        }

        // For pretty printing of xml
        $xml = new DOMDocument('1.0');
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;
        $xml->loadXML($response->saveXML());

        return $xml->saveXML();
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return IChannel::OUTPUT_XML;
    }
}