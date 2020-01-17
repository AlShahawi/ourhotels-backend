<?php

return [

    /*
    |--------------------------------------------------------------------------
    | The available providers.
    |--------------------------------------------------------------------------
    |
    | Here you may specify the available hotel providers to be used to
    | fetch and aggregate hotels.
    |
    */
    'providers' => [
        \App\Hotels\Providers\BestHotelProvider::class,
        \App\Hotels\Providers\TopHotelsProvider::class,
    ],
];
