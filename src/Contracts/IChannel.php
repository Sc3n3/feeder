<?php

namespace Gokays\Feeder\Contracts;

use Gokays\Feeder\Products;

interface IChannel
{
    const OUTPUT_XML = 'xml';
    const OUTPUT_JSON = 'json';

    /**
     * @param Products $products
     * @return string
     */
    public function generate(Products $products): string;

    /**
     * @return string
     */
    public function getFormat(): string;
}