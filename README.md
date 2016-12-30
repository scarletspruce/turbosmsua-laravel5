# Package for [TurboSMS] (http://turbosms.ua/) for Laravel 5
This package still in beta.
The main problem - SOAP API from TurboSMS (be realists - it's awful).
I've contact with TurboSMS's support - lets see what they will do with my request...


## Installation
Require this package in your composer.json:

~~~json
"scarletspruce/turbosmsua-laravel5": "dev-master"
~~~

And add the ServiceProvider to the providers array in config/app.php

~~~php
'Scarletspruce\Turbosms\ServiceProvider',
~~~

Publish config using artisan CLI (if you want to overwrite default config).

~~~bash
php artisan vendor:publish --tag="config"
~~~

You can register the facade in the `aliases` key of your `config/app.php` file.

~~~php
'aliases' => array(
    'TurboSms'  => 'Scarletspruce\TurboSms\Facade',
)
~~~


## Package config

~~~php
	return array(

        /*
        |--------------------------------------------------------------------------
        | URL
        |--------------------------------------------------------------------------
        |
        | URL for the SOAP API
        |
        */

            'url'      => 'http://turbosms.in.ua/api/wsdl.html',
        /*
        |--------------------------------------------------------------------------
        | Credentials for auth
        |--------------------------------------------------------------------------
        */

            'auth' => [

                    'login'    => env('TURBO_SMS_LOGIN'),
                    'password' => env('TURBO_SMS_PASSWORD'),
            ],

        /*
        |--------------------------------------------------------------------------
        | Sender name
        |--------------------------------------------------------------------------
        */

            'sender'   => env('TURBO_SMS_SENDER'),


    );
~~~



##Usage


~~~php
try {
	$balance =Scarletspruce\Turbosms\Facade::getBalance();
	print_r($balance);

	$message_id =Scarletspruce\Turbosms\Facade::send('Test message', '+38099999999');
    print_r($message_id);

    $status =Scarletspruce\Turbosms\Facade::getStatus($message_id);
    print_r($status);
} catch (Scarletspruce\TurboSms\Exceptions\TurboSmsException $e) {}

~~~

