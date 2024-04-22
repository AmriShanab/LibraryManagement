
<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Other middleware...

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Other middleware...
            \App\Http\Middleware\Authenticate::class,
        ],

        'api' => [
            // Other middleware...
        ],
    ];

    // Other methods...
}
