<?php
declare(strict_types=1);

namespace CurlTwist\Authentication;


class AccessToken implements AuthenticationInterface
{
    const TOKEN_QUERY = 'access-token';
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function getToken(): string
    {
        return sprintf('%s=%s', self::TOKEN_QUERY, $this->token);
    }
}