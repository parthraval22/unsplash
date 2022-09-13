<?php

namespace App\Client;

use Guzzle\Http\Exception\ClientException;
use GuzzleHttp\Client;

class UnsplashAPIClient
{
    private $client = null;
    private $accessToken = null;
    const apiURL = "https://api.unsplash.com/";
    
    public function __construct()
    {
        $this->accessToken = env("ACCESS_KEY",null);
        $this->client = new Client();
    }

    public function search($query, $page, $perPage)
    {
        try {
            $url = self::apiURL."search/photos";
            $data = [
                'client_id' => $this->accessToken,
                'query' => $query,
                'page' => $page,
                'perPage' => $perPage,
            ];
            
            $response = $this->client->get($url, ['query' => $data]);
            $result = json_decode($response->getBody()->getContents());

            return $result->results;
        } catch(ClientException $e) {

            return $response = json_decode($e->getResponse()->getBody(true)->getContents());
        }
    }

}