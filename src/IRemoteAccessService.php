<?php

namespace Kareem\Http;

use Psr\Http\Message\ResponseInterface;

interface IRemoteAccessService {

    /**
     * @param array $headers
     * @return IRemoteAccessService
     */
    public function setHeaders(array $headers): IRemoteAccessService;

    /**
     * @param string $baseUrl
     * @return IRemoteAccessService
     */
    public function setBaseUrl(string $baseUrl): IRemoteAccessService;

    /**
     * @param string $endpoint
     * @return string
     */
    public function getUrl(string $endpoint): string;

    /**
     * @return array
     */
    public function getHeaders(): array;

    public function getRequest(string $endpoint, array $data = []): ResponseInterface;

    /**
     * @param string $endpoint
     * @param array $data
     * @return ResponseInterface
     */
    public function postRequest(string $endpoint, array $data = []): ResponseInterface;

}
