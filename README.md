<h2 align="center">oauth2-invision</h2>
<p align="center">This package provides Invision's OAuth 2 and supports League's OAuth 2.0 client.</p>

<br />

## 🚀 Download and installation

This package is available on [Packagist](https://packagist.org/packages/romitou/oauth2-invision). You can install it directly via Composer with the command `composer req romitou/oauth2-invision`.

## 📖 Example

```php
<?php

require __DIR__ . '/vendor/autoload.php';
session_start();

$invisionProvider = new Romitou\OAuth2\Client\InvisionProvider([
    'baseUrl' => '', // The base URL of your Invision Community
    'clientId' => '', // The client ID of your application
    'clientSecret' => '', // The client secret of your application
    'redirectUri' => '' // The callback URI where the user will be redirected
]);

if (isset($_GET['code'])) {
    if ($_SESSION['oauth2_state'] !== $_GET['state'])
        exit('The returned state doesn\'t match with your local state.');
    $invisionToken = $invisionProvider->getAccessToken('authorization_code', ['code' => $_GET['code']]);
    $invisionUser = $invisionProvider->getResourceOwner($invisionToken);
    echo 'Your primary group name is: ' . $invisionUser->getPrimaryGroup()->getName();
    echo 'Your email is: ' . $invisionUser->getEmail();
} else {
    $oauthUrl = $invisionProvider->getAuthorizationUrl();
    $_SESSION['oauth2_state'] = $invisionProvider->getState();
    header('Location: ' . $oauthUrl);
}
```
