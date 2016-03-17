<?php

namespace App\Generators;


class ListingPageGenerator 
{

    protected $resultData = [];


    public function formatData($listingsJson)
    {
        $listingArray = json_decode($listingsJson, true);

        foreach ($listingArray['Results'] as $listing) {

            $newListing = [];
            $newListing['price']       = $listing['Property']['Price'];
            $newListing['description'] = $listing['PublicRemarks'];
            $newListing['address']     = $listing['Property']['Address']['AddressText'];
            $newListing['url']         = env('REALTOR_DOMAIN') . $listing['RelativeDetailsURL'];
            $newListing['image']       = $listing['Property']['Photo'][0]['MedResPath'];
            $newListing['lastUpdated'] = $listing['Property']['Photo'][0]['LastUpdated'];
            $this->resultData[] = $newListing;
        }
        return ['listings' => $this->resultData];
    }
}
