<?php

namespace Gokays\Feeder;

use Gokays\Feeder\Contracts\IChannel;

class Feeder
{
    /**
     * @var IChannel
     */
    protected $channel;

    /**
     * @var Products
     */
    protected $products;

    /**
     * @param Products $products
     * @param IChannel $channel
     */
    public function __construct(Products $products, IChannel $channel)
    {
        $this->channel = $channel;
        $this->products = $products;
    }

    /**
     * @return string
     */
    public function generate()
    {
        return $this->channel->generate($this->products);
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->channel->getFormat();
    }
}