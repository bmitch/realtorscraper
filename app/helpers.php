<?php


function getGoogleMapUrl($address)
{
	$key = env('GOOGLE_MAPS_API_KEY');
	$address = str_replace('|', ' ', $address);
	return  "https://maps.googleapis.com/maps/api/staticmap?center={$address}&markers=size:mid%7Ccolor:0xFFFF00%7C{$address}&key={$key}&size=256x200&zoom=14";
}