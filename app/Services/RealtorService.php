<?php

namespace App\Services;

use GuzzleHttp\Client;

class RealtorService
{
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getListings($search)
    {
        $data = $this->getSearchPostData($search);
        return (string) $this->client->request('POST', env('REALTOR_URL'), $data)->getBody();
    }

    private function getSearchPostData($search)
    {
        $data = [
            'body' => env("REALTOR_SEARCH_{$search}"),
        ];

        if ($data['body'] == null) {
            throw new \exception("Saved search not found.");
        }

        return $data;
    }
}
