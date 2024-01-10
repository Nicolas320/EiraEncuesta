<?php

namespace App\Providers;

use App\Http\Controllers\PdfController;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('pdfgenerator', function ($app) {
            return new PdfController(); 
        });
    }

    // ... other methods ...
}