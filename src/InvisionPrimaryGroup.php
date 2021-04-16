<?php

namespace Romitou\OAuth2\Client;

use League\OAuth2\Client\Tool\ArrayAccessorTrait;

class InvisionPrimaryGroup
{

    use ArrayAccessorTrait;

    private array $response;

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    /**
     * Returns the identifier of the primary group.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getValueByKey($this->response, 'id');
    }

    /**
     * Returns the name of the primary group.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getValueByKey($this->response, 'name');
    }

    /**
     * Returns the formatted name of the primary group.
     *
     * @return string|null
     */
    public function getFormattedName(): ?string
    {
        return $this->getValueByKey($this->response, 'formattedName');
    }

    /**
     * Return all of the primary group details available as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->response;
    }
}