<?php

namespace App\Service\Http;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class BaseApiService
{

  CONST URL_BASE = 'https://e-delux.plentymarkets-cloud01.com/rest';

  private HttpClientInterface $client;
  private ContainerInterface $container;
  private string $token;

  /**
   * BaseApiService constructor.
   *
   * @param HttpClientInterface $client
   * @param ContainerInterface $container
   */
  public function __construct(HttpClientInterface $client, ContainerInterface $container)
  {
    $this->client = $client;
    $this->container = $container;

    if (empty($this->token)) {
      $this->token = $this->getToken();
    }
  }

  public function getToken(): string
  {

    $response = $this->client->request('POST', self::URL_BASE . '/login', [
      'headers' => [
        'Content-Type' => 'application/json',
      ],
      'body' => json_encode([
        'username' => $this->container->getParameter('plentyUser'),
        'password' => $this->container->getParameter('plentyPass')
      ]),
    ]);

    $statusCode = $response->getStatusCode();
    if ($statusCode === 200) {
      $content = $response->toArray();
      return $content['access_token'];
    } else {
      throw new \Exception('Error: ' . $statusCode . ' Content:' . $response->getContent());
    }
  }

  public function requestApi($url, $method, $data = false)
  {

    $response = $this->client->request($method, self::URL_BASE . $url, [
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . $this->token,
        'auth_bearer' => $this->token
      ],
    ]);

    $statusCode = $response->getStatusCode();

    if ($statusCode === 200) {
      return $response->toArray();
    } else {
      return [
        "error" => ["message" => "Resource not found.",
        "status_сode" => $statusCode
        ]
      ];
    }
  }

}
