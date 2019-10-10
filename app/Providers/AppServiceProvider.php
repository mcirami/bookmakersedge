<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Braintree_Configuration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    Schema::defaultStringLength(191);

	    Braintree_Configuration::environment(env('BRAINTREE_ENV'));
	    Braintree_Configuration::merchantId(env('BRAINTREE_MERCHANT_ID'));
	    Braintree_Configuration::publicKey(env('BRAINTREE_PUBLIC_KEY'));
	    Braintree_Configuration::privateKey(env('BRAINTREE_PRIVATE_KEY'));

        /*VerifyEmail::toMailUsing(function ($notifiable) {
            $verifyUrl = URL::temporarySignedRoute(
                'verification.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
            );

            return (new MailMessage)
                ->subject('Verify Email Address')
                ->markdown('emails.verify', ['url' => $verifyUrl]);
        });*/
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
