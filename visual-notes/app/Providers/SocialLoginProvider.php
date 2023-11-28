<?php

namespace App\Providers;

use App\Models\GoogleLoginKey;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SocialLoginProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $model = GoogleLoginKey::first();
        if (!empty($model->client_id)) {
            Config::set('services.google.client_id', $model->client_id);
            Config::set('services.google.client_secret', $model->client_secret);
            Config::set('services.google.redirect', $model->redirect);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
