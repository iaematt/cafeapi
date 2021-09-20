<?php

/** Namespace */
namespace MatheusBastos\CafeApi;

/**
 * Invoices Api class
 * @package MatheusBastos\CafeApi
 */
class Invoices extends CafeApi
{
    /**
     * Invoices constructor
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
     * @return Invoices
     */
    public function index(?array $headers): Invoices
    {
        $this->request('GET', '/invoices', null, $headers);

        return $this;
    }

    /**
     * Create
     * @param array $fields
     * @return Invoices
     */
    public function create(array $fields): Invoices
    {
        $this->request('POST', '/invoices', $fields);

        return $this;
    }

    /**
     * Read
     * @param int $invoice_id
     * @return Invoices
     */
    public function read(int $invoice_id): Invoices
    {
        $this->request('GET', "/invoices/{$invoice_id}");

        return $this;
    }

    /**
     * Update
     * @param int $invoice_id
     * @param array $fields
     * @return Invoices
     */
    public function update(int $invoice_id, array $fields): Invoices
    {
        $this->request('PUT', "/invoices/{$invoice_id}", $fields);

        return $this;
    }

    /**
     * Delete
     * @param int $invoice_id
     * @return Invoices
     */
    public function delete(int $invoice_id): Invoices
    {
        $this->request('DELETE', "/invoices/{$invoice_id}");

        return $this;
    }
}
