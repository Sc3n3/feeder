<?php

require 'vendor/autoload.php';

use Gokays\Feeder\Feeder;
use Gokays\Feeder\Products;
use Gokays\Feeder\Channels\Cimri;
use Gokays\Feeder\Channels\Google;
use Gokays\Feeder\Channels\Facebook;

$json = json_decode(
    file_get_contents('products.json'), true
);

$products = new Products($json);

$channels = [
    'cimri' => new Cimri(),
    'google' => new Google(),
    'facebook' => new Facebook()
];

foreach ($channels as $name => $channel) {
    $feeder = new Feeder($products, $channel);
    $fileName = implode('.', ['output/'. $name, $feeder->getFormat()]);

    file_put_contents($fileName, $feeder->generate());
}

