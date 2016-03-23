<?php


function getGoogleMapUrl($address)
{
	$key = env('GOOGLE_MAPS_API_KEY');
	$address = str_replace('|', ' ', $address);
	return  "https://maps.googleapis.com/maps/api/staticmap?center={$address}&key={$key}&size=200x200&zoom=14";
}