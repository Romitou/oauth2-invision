<?php

namespace Romitou\OAuth2\Client;

use InvalidArgumentException;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

class InvisionProvider extends AbstractProvider
{

    use BearerAuthorizationTrait;

    protected string $baseUrl;

    public function __construct(array $options = [], array $collaborators = [])
    {
        $baseUrl = $options['baseUrl'];
        if (empty($baseUrl))
            throw new InvalidArgumentException('Base URL is not defined.');
        $this->baseUrl = $baseUrl;
        parent::__construct($options, $collaborators);
    }

    /**
     * Returns the base URL for authorizing a client.
     * @return string
     */
    public function getBaseAuthorizationUrl(): string
    {
        return $this->baseUrl . '/oauth/authorize';
    }

    /**
     * Returns the base URL for requesting an access token.
     * @param array $params
     * @return string
     */
    public function getBaseAccessTokenUrl(array $params): string
    {
        return $this->baseUrl . '/oauth/token/';
    }

    /**
     * Returns the string that should be used to separate scopes when building
     * the URL for requesting an access token.
     * @return string
     */
    public function getScopeSeparator(): string
    {
        return ' ';
    }

    /**
     * Returns the URL for requesting the resource owner's details.
     * @param AccessToken $token
     * @return string
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token): string
    {
        return $this->baseUrl . '/api/core/me?' . http_build_query(['access_token' => $token->getToken()]);
    }

    /**
     * Returns the default scopes used by this provider.
     *
     * This should only be the scopes that are required to request the details
     * of the resource owner, rather than all the available scopes.
     * @return array
     */
    protected function getDefaultScopes(): array
    {
        return ['profile', 'email'];
    }

    /**
     * Checks a provider response for errors.
     * @param ResponseInterface $response
     * @param array|string $data Parsed response data
     * @return void
     * @throws InvisionProviderException
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {
        if ($response->getStatusCode() >= 400)
            throw new InvisionProviderException($response->getReasonPhrase(), $response->getStatusCode(), $response);
    }

    /**
     * Generates a resource owner object from a successful resource owner
     * details request.
     * @param array $response
     * @param AccessToken $token
     * @return ResourceOwnerInterface
     */
    protected function createResourceOwner(array $response, AccessToken $token)
    {
        return new InvisionResourceOwner($response);
    }
}