<?php

namespace App\Providers;

use App\Nationality;
use App\Warehouse;
use App\Product;
use App\Title;
use App\Type;
use App\Unit;
use App\Vendor;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
        Route::model('title', Title::class);
        Route::model('types', Type::class);
        Route::model('type', Type::class);
        Route::model('nationalities', Nationality::class);
        Route::model('nationality', Nationality::class);
        Route::model('units', Unit::class);
        Route::model('unit', Unit::class);


        Route::model('vendors', Vendor::class);
        Route::model('vendor', Vendor::class);


        Route::model('warehouse', Warehouse::class);
        Route::model('warehouses', Warehouse::class);


        Route::model('branches', Product::class);
        Route::model('branches', Product::class);

        Route::model('products', Product::class);
        Route::model('product', Product::class);

    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
