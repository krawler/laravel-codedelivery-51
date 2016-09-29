<?php

namespace CodeDelivery\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
<<<<<<< HEAD
     * This namespace is applied to the controller routes in your routes file.
=======
     * This namespace is applied to your controller routes.
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'CodeDelivery\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
<<<<<<< HEAD
        $router->group(['namespace' => $this->namespace], function ($router) {
=======
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
            require app_path('Http/routes.php');
        });
    }
}
