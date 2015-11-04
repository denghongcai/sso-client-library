SSO-Client library for Laravel
==============================

Install
-------
Modify your `composer.json`, add
```
  "require": {
    "hongcaideng/sso-client": "dev-master"
  }
```
Run `composer update -vvv`

Modify your `app/config/app.php`, add
```
'providers' => array(
    HongcaiDeng\SSO_Client\SSOClientServiceProvider::class
)

'aliases' => array(
    'SSO_Client' => HongcaiDeng\SSO_Client\Facades\SSOClient::class,
)
```

Run `php artisan vendor publish`

