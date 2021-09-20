<?php

/** Namespace */
namespace MatheusBastos\CafeApi;

/**
 * Api abstract class
 * @package MatheusBastos\CafeApi
 */
abstract class CafeApi
{
    /** @var string */
    private $api_url;

    /** @var array */
    private $headers;

    /** @var array */
    private $fields;

    /** @var string */
    private $endpoint;

    /** @var string */
    private $method;

    /** @var object */
    protected $response;

    /**
     * Api constructor
     * @param string $apiUrl
     * @param string $email
     * @param string $password
     */
    public function __construct(string $api_url, string $email, string $password)
    {
        $this->api_url = $api_url;
        $this->headers([
            'email' => $email,
            'password' => $password,
        ]);
    }

    /**
     * Api request
     * @param string $method
     * @param string $endpoint
     * @param array|null $fields
     * @param array|null $headers
     * @return void
     */
    protected function request(string $method, string $endpoint, array $fields = null, array $headers = null): void
    {
        $this->method = $method;
        $this->endpoint = $endpoint;
        $this->fields = $fields;
        $this->headers($headers);

        $this->dispatch();
    }

    /**
     * Api response
     * @return object|null
     */
    public function response()
    {
        return $this->response;
    }

    /**
     * Api error
     * @return object|null
     */
    public function error()
    {
        if (!empty($this->response->errors)) {
            return $this->response->errors;
        }

        return null;
    }

    /**
     * Api headers
     * @param array|null $headers
     * @return void
     */
    private function headers(?array $headers): void
    {
        if (!$headers) {
            return;
        }

        foreach ($headers as $key => $header) {
            $this->headers[] = "{$key}: {$header}";
        }
    }

    /**
     * Api dispatch
     * @return void
     */
    private function dispatch(): void
    {
        $curl = curl_init();

        if (empty($this->fields['files'])) {
            $this->fields = !empty($this->fields) ? http_build_query($this->fields) : null;
        }

        curl_setopt_array($curl, [
            CURLOPT_URL => "{$this->api_url}/{$this->endpoint}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->method,
            CURLOPT_POSTFIELDS => $this->fields,
            CURLOPT_HTTPHEADER => $this->headers,
        ]);

        $this->response = json_decode(curl_exec($curl));
        curl_close($curl);
    }
}
