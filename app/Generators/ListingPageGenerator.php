<?php

namespace App\Generators;


class ListingPageGenerator 
{

    protected $resultData = [];


    public function generateHtml($listingsJson)
    {
        $listingArray = json_decode($listingsJson, true);

        foreach ($listingArray['Results'] as $listing) {
            $newListing = [];
            $newListing['price'] = $listing['Property']['Price'];
            $newListing['description']     = $listing['PublicRemarks'];
            $newListing['address'] = $listing['Property']['Address']['AddressText'];
            $newListing['url'] = env('REALTOR_DOMAIN') . $listing['RelativeDetailsURL'];

            $this->resultData[] = $newListing;
        }

        return $this->resultData;
    }
}
