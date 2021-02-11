# Elastic Auth Socialite Provider

```bash
composer require elasticauth/socialite-provider
```

## Installation & Basic Usage

Please see the [Base Installation Guide](https://socialiteproviders.com/usage/), then follow the provider specific instructions below.

### Add configuration to `config/services.php`

```php
'elasticauth' => [    
  'client_id' => env('ELASTICAUTH_CLIENT_ID'),  
  'client_secret' => env('ELASTICAUTH_CLIENT_SECRET'),  
  'redirect' => env('ELASTICAUTH_REDIRECT_URI'),
  'host' => env('ELASTICAUTH_HOST'),
],
```

### Add environment configuration to `.env`

```
ELASTICAUTH_CLIENT_ID=YOUR-CLIENT-ID
ELASTICAUTH_CLIENT_SECRET=YOUR-CLIENT-SECRET
ELASTICAUTH_REDIRECT_URI=YOUR-REDIRECT-URI
ELASTICAUTH_HOST=YOUR-ELASTIC-AUTH-HOST
```


### Add provider event listener

Configure the package's listener to listen for `SocialiteWasCalled` events.

Add the event to your `listen[]` array in `app/Providers/EventServiceProvider`. See the [Base Installation Guide](https://socialiteproviders.com/usage/) for detailed instructions.

```php
protected $listen = [
    \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        'ElasticAuth\\SocialiteProvider\\ElasticAuthExtendSocialite@handle',
    ],
];
```

### Usage

You should now be able to use the provider like you would regularly use Socialite (assuming you have the facade installed):

```php
return Socialite::driver('elasticauth')->redirect();
```

### Returned User fields

- ``id``
- ``nickname``
- ``name``
- ``email``
- ``avatar``