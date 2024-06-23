<?php

namespace Kareem\Http\Tests;

use GuzzleHttp\Client;
use Kareem\Http\Exceptions\InvalidHeadersException;
use Kareem\Http\RemoteAccessService;
use PHPUnit\Framework\TestCase;

final class HttpRequestTest extends TestCase {

    public function test_remote_access_service_constructor() {
        $http = $this->createMock(RemoteAccessService::class);
        $this->assertInstanceOf(RemoteAccessService::class, $http);
    }

    public function test_getting_headers_without_setting() {
        $this->expectException(InvalidHeadersException::class);
        $http = new RemoteAccessService(new Client());
        echo "\e[32m";
        echo "\n[Logger] Exception expected!\n";
        echo "\e[39m";
        $http->getHeaders();
    }

}
