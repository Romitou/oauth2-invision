<?php

namespace Romitou\OAuth2\Client;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

class InvisionProviderException extends IdentityProviderException
{
    public function __construct($message, $code, $response)
    {
        parent::__construct($message, $code, $response);
    }
}