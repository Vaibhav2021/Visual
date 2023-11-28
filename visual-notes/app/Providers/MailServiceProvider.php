<?php

namespace App\Providers;

use App\Models\SmtpSettings;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        
        if (Schema::hasTable('smtp_settings')) {
            $smtp = Cache::get('smtp_details');
            if (empty($smtp)) {

                Cache::forget('smtp_details');
                $model = SmtpSettings::first();
                Cache::rememberForever('smtp_details', function () use ($model) {
                    return $model;
                });

                if (!is_null($model)) {
                    if ($model->driver == 'ses') {
                        Config::set('mail.default', $model->driver);
                        Config::set('services.ses.key', $model->awsAccessKey);
                        Config::set('services.default', $model->driver);
                        Config::set('services.ses.secret', $model->awsSecretKey);
                        Config::set('services.ses.region', $model->awsDefaultRegion ?? 'us-east-1');
                        Config::set('mail.from.address', $model->smtp_from_email);
                        Config::set('mail.from.name', $model->smtp_from_name);
                    } else {
                        Config::set('mail.default', $model->driver);
                        Config::set('mail.mailers.smtp.host', $model->smtp_host);
                        Config::set('mail.mailers.smtp.port', $model->smtp_port);
                        Config::set('mail.mailers.smtp.username', $model->smtp_from_email);
                        Config::set('mail.mailers.smtp.password', $model->smtp_pass);
                        Config::set('mail.mailers.smtp.encryption', $model->encryption);
                        Config::set('mail.from.address', $model->smtp_from_email);
                        Config::set('mail.from.name', $model->smtp_from_name);
                    }
                }
            } else {
                $model = Cache::get('smtp_details');

                if (!is_null($model)) {
                    if ($model->driver == 'ses') {
                        Config::set('mail.default', $model->driver);
                        Config::set('services.ses.key', $model->awsAccessKey);
                        Config::set('services.default', $model->driver);
                        Config::set('services.ses.secret', $model->awsSecretKey);
                        Config::set('services.ses.region', $model->awsDefaultRegion ?? 'us-east-1');
                        Config::set('mail.from.address', $model->smtp_from_email);
                        Config::set('mail.from.name', $model->smtp_from_name);
                    } else {
                        Config::set('mail.default', $model->driver);
                        Config::set('mail.mailers.smtp.host', $model->smtp_host);
                        Config::set('mail.mailers.smtp.port', $model->smtp_port);
                        Config::set('mail.mailers.smtp.username', $model->smtp_from_email);
                        Config::set('mail.mailers.smtp.password', $model->smtp_pass);
                        Config::set('mail.mailers.smtp.encryption', $model->encryption);
                        Config::set('mail.from.address', $model->smtp_from_email);
                        Config::set('mail.from.name', $model->smtp_from_name);
                    }
                }
            }
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
