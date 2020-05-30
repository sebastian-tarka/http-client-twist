<?php


use CurlTwist\Authentication\AuthenticationInterface;
use CurlTwist\Client;
use Mockery\Adapter\Phpunit\MockeryTestCase as TestCase;
use Slim\Psr7\Response;
use Mockery as m;

class ClientTest extends TestCase
{
    private $client;

    public function setUp(): void
    {
        parent::setUp();

        $this->client = new Client();
    }

    public function testSetAuthReturnSelf()
    {
        $client = $this->client->setAuth(m::mock(AuthenticationInterface::class));

        $this->assertInstanceOf(
            Client::class,
            $client
        );
    }

    public function testGetReturnResponse()
    {
        $this->assertInstanceOf(Response::class, $this->client->get());
    }
}
