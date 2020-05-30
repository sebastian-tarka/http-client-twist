<?php

require_once __DIR__ . '/vendor/autoload.php';

header('Content-type: application/json');

$client = new \CurlTwist\Client('https://gorest.co.in/');
$client->setAuth(new \CurlTwist\Authentication\AccessToken('xESc1ZXkdhKf_wIyn8CKOkZvjZ_8YR7JVrsO'));
$response = $client->get('public-api/users');

echo json_encode($response->getBody()->getContents());