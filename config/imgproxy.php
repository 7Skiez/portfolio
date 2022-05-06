<?php

/**
 * A remote microservice that resizes images.
 * More info https://github.com/DarthSim/imgproxy
 */

return [
    'base_url'       => env('IMGPROXY_URL'),

    //security
    'key'            => env('IMGPROXY_KEY'),
    'salt'           => env('IMGPROXY_SALT'),
    // 'signature_size' => env('IMGPROXY_SIGNATURE_SIZE'),
];