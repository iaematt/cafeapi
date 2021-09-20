<?php

/** Namespace */
namespace MatheusBastos\CafeApi;

/**
 * Subscriptions Api class
 * @package MatheusBastos\CafeApi
 */
class Subscriptions extends CafeApi
{
    /**
     * Subscriptions constructor
     * @param string $api_url
     * @param string $email
     * @param string $password
     */
    public function __construct(string $api_url, string $email, string $password)
    {
        parent::__construct($api_url, $email, $password);
    }

    /**
     * Index
     * @return Subscriptions
     */
    public function index(): Subscriptions
    {
        $this->request('GET', '/subscription');

        return $this;
    }

    /**
     * Create
     * @param array $fields
     * @return Subscriptions
     */
    public function create(array $fields): Subscriptions
    {
        $this->request('POST', '/subscription', $fields);

        return $this;
    }

    /**
     * Read
     * @return Subscriptions
     */
    public function read(): Subscriptions
    {
        $this->request('GET', '/subscription/plans');

        return $this;
    }

    /**
     * Update
     * @param array $fields
     * @return Subscriptions
     */
    public function update(array $fields): Subscriptions
    {
        $this->request('PUT', '/subscription', $fields);

        return $this;
    }
}
