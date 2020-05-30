<?php
declare(strict_types=1);

namespace CurlTwist;


use CurlTwist\Authentication\AuthenticationInterface;
use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Response;

class Client
{
    private $auth;
    private $host;
    private $curl;

    public function __construct(string $host)
    {
        $this->host = $host;
    }

    public function get(string $url): Response
    {
        $curl = curl_init($this->host . $url);

        if ($this->auth) {
            $currentUrl = curl_getinfo($curl, CURLINFO_EFFECTIVE_URL);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, $currentUrl . '?' . $this->auth->getToken());
        }

        $res = curl_exec($curl);
        $factory = new StreamFactory();
        $stream = $factory->createStream($res);

        return new Response(200, null, $stream);
    }

    public function setAuth(AuthenticationInterface $imp): self
    {
        $this->auth = $imp;
        return $this;
    }
}