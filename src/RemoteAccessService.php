<?php

namespace Kareem\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Kareem\Http\Enums\RemoteAccessHttpTypes;
use Kareem\Http\Exceptions\InvalidBaseUrlException;
use Kareem\Http\Exceptions\InvalidHeadersException;
use Psr\Http\Message\ResponseInterface;

class RemoteAccessService implements IRemoteAccessService {

    private ?array $headers = null;

    private ?string $baseUrl = null;

    /**
     * @param Client $client
     */
    public function __construct(
        private Client $client
    ) { }

    /**
     * ******************************************** *
     * ************** CONFIGURATIONS ************** *
     * ******************************************** *
     */

    /**
     * Sets the headers for the remote request service.
     *
     * @param array $headers
     * @return IRemoteAccessService
     */
    public function setHeaders(array $headers): IRemoteAccessService
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @param string $baseUrl
     * @return IRemoteAccessService
     */
    public function setBaseUrl(string $baseUrl): IRemoteAccessService {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Make a get request to External API.
     *
     * @param string $endpoint
     * @param array $data
     * @return ResponseInterface
     * @throws GuzzleException
     * @throws InvalidBaseUrlException
     */
    public function getRequest(string $endpoint, array $data = []): ResponseInterface
    {
        return $this->client->request(RemoteAccessHttpTypes::GET->value, $this->getUrl($endpoint), [
            'headers' => $this->getHeaders(),
        ]);
    }

    /**
     * Make a post request to External API.
     *
     * @param string $endpoint
     * @param array $data
     * @return ResponseInterface
     * @throws GuzzleException
     * @throws InvalidBaseUrlException
     * @throws InvalidHeadersException
     */
    public function postRequest(string $endpoint, array $data = []): ResponseInterface
    {
        return $this->client->request(RemoteAccessHttpTypes::POST->value, $this->getUrl($endpoint), [
            'headers' => $this->getHeaders(),
            'json' => $data,
        ]);
    }

    /**
     * @param string $endpoint
     * @return string
     * @throws InvalidBaseUrlException
     */
    public function getUrl(string $endpoint): string {
        if ($this->baseUrl) {
            return trim($this->baseUrl, '/') . '/' . trim($endpoint, '/');
        } else {
            throw new InvalidBaseUrlException;
        }
    }

    /**
     * @return array
     * @throws InvalidHeadersException
     */
    public function getHeaders(): array {
        if ($this->headers) {
            return $this->headers;
        } else {
            throw new InvalidHeadersException;
        }
    }

}
