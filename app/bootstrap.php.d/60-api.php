<?php

use Gist\Api\Client;

$app['api_client'] = $app->share(function ($app) {
    return new Client(['base_uri' => 'https://gist.deblan.org/']);
});
