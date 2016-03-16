<?php

namespace App\Services;

use GuzzleHttp\Client;

class RealtorService
{
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getListings($config = 'default')
    {
        $url = env('REALTOR_URL');
        $data = [
            'body' => env('REALTOR_BODY'),
        ];

        $request = $this->client->request('POST', $url, $data);

        return (string) $request->getBody();
    }
}
