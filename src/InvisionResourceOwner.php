<?php

namespace Romitou\OAuth2\Client;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

class InvisionResourceOwner implements ResourceOwnerInterface
{

    use ArrayAccessorTrait;

    private array $response;

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    /**
     * Returns the identifier of the authorized resource owner.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getValueByKey($this->response, 'id');
    }

    /**
     * Returns the name of the authorized resource owner.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getValueByKey($this->response, 'name');
    }

    /**
     * Returns the title of the authorized resource owner.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->getValueByKey($this->response, 'title');
    }

    /**
     * Returns the formatted name of the authorized resource owner.
     *
     * @return string|null
     */
    public function getFormattedName(): ?string
    {
        return $this->getValueByKey($this->response, 'formattedName');
    }

    /**
     * Returns the primary group of the authorized resource owner.
     *
     * @return InvisionPrimaryGroup|null
     */
    public function getPrimaryGroup(): ?InvisionPrimaryGroup
    {
        return new InvisionPrimaryGroup($this->getValueByKey($this->response, 'primaryGroup'));
    }

    /**
     * Returns the joined date string of the authorized resource owner.
     *
     * @return string|null
     */
    public function getJoined(): ?string
    {
        return $this->getValueByKey($this->response, 'joined');
    }

    /**
     * Returns the reputation points of the authorized resource owner.
     *
     * @return int|null
     */
    public function getReputationPoints(): ?int
    {
        return $this->getValueByKey($this->response, 'reputationPoints');
    }

    /**
     * Returns the photo URL of the authorized resource owner.
     *
     * @return string|null
     */
    public function getPhotoUrl(): ?string
    {
        return $this->getValueByKey($this->response, 'photoUrl');
    }

    /**
     * Returns whatever the photo URL of the authorized resource owner is default.
     *
     * @return bool|null
     */
    public function isPhotoUrlDefault(): ?bool
    {
        return $this->getValueByKey($this->response, 'photoUrlIsDefault');
    }

    /**
     * Returns the cover photo URL of the authorized resource owner.
     *
     * @return string|null
     */
    public function getCoverPhotoUrl(): ?string
    {
        return $this->getValueByKey($this->response, 'coverPhotoUrl');
    }

    /**
     * Returns the profile URL of the authorized resource owner.
     *
     * @return string|null
     */
    public function getProfileUrl(): ?string
    {
        return $this->getValueByKey($this->response, 'profileUrl');
    }

    /**
     * Returns the posts of the authorized resource owner.
     *
     * @return int|null
     */
    public function getPosts(): ?int
    {
        return $this->getValueByKey($this->response, 'posts');
    }

    /**
     * Returns the last activity date string of the authorized resource owner.
     *
     * @return string|null
     */
    public function getLastActivity(): ?string
    {
        return $this->getValueByKey($this->response, 'lastActivity');
    }

    /**
     * Returns the profile views of the authorized resource owner.
     *
     * @return int|null
     */
    public function getProfileViews(): ?int
    {
        return $this->getValueByKey($this->response, 'profileViews');
    }

    /**
     * Returns the email of the authorized resource owner.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->getValueByKey($this->response, 'email');
    }

    /**
     * Returns the last visit date string of the authorized resource owner.
     *
     * @return string|null
     */
    public function getLastVisit(): ?string
    {
        return $this->getValueByKey($this->response, 'lastVisit');
    }

    /**
     * Returns the last post date string of the authorized resource owner.
     *
     * @return string|null
     */
    public function getLastPost(): ?string
    {
        return $this->getValueByKey($this->response, 'lastPost');
    }

    /**
     * Return all of the owner details available as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->response;
    }
}