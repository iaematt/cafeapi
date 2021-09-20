<?php

/** Namespace */
namespace MatheusBastos\CafeApi;

/**
 * Wallets Api class
 * @package MatheusBastos\CafeApi
 */
class Wallets extends CafeApi
{
    /**
     * Wallets constructor
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
     * @param array|null $headers
     * @return Wallets
     */
    public function index(?array $headers): Wallets
    {
        $this->request('GET', '/wallets', null, $headers);

        return $this;
    }

    /**
     * Create
     * @param array $fields
     * @return Wallets
     */
    public function create(array $fields): Wallets
    {
        $this->request('POST', '/wallets', $fields);

        return $this;
    }

    /**
     * Read
     * @param int $wallet_id
     * @return Wallets
     */
    public function read(int $wallet_id): Wallets
    {
        $this->request('GET', "/wallets/{$wallet_id}");

        return $this;
    }

    /**
     * Update
     * @param int $wallet_id
     * @param array $fields
     * @return Wallets
     */
    public function update(int $wallet_id, array $fields): Wallets
    {
        $this->request('PUT', "/wallets/{$wallet_id}", $fields);

        return $this;
    }

    /**
     * Delete
     * @param int $wallet_id
     * @return Wallets
     */
    public function delete(int $wallet_id): Wallets
    {
        $this->request('DELETE', "/wallets/{$wallet_id}");

        return $this;
    }
}
