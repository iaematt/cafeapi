<?php

/** Namespace */
namespace MatheusBastos\CafeApi;

/**
 * Me Api class
 * @package MatheusBastos\CafeApi
 */
class Me extends CafeApi
{
    /**
     * Me constructor
     * @param string $api_url
     * @param string $email
     * @param string $password
     */
    public function __construct(string $api_url, string $email, string $password)
    {
        parent::__construct($api_url, $email, $password);
    }

    /**
     * Me
     * @return Me
     */
    public function me(): Me
    {
        $this->request('GET', '/me');

        return $this;
    }

    /**
     * Update
     * @param array $fields
     * @return Me
     */
    public function update(array $fields): Me
    {
        $this->request('PUT', '/me', $fields);

        return $this;
    }

    /**
     * Photo
     * @param array $files
     * @return Me
     */
    public function photo(array $files): Me
    {
        $this->request('POST', '/me/photo', [
            'files' => true,
            'photo' => curl_file_create($files['tmp_name'], $files['type']),
        ]);

        return $this;
    }
}
