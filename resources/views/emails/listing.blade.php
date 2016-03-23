<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
	<h2>Listings</h2>

	<div>

		@foreach ($listings as $listing)
			<div>
				<h4>{{ $listing['price'] }} <br/> {{ $listing['address'] }}</h4>
				<img src ='{{ $listing['image'] }}'></img>
				<img src ='{{ getGoogleMapUrl($listing['address']) }}'></img>
				
				<p>{{ $listing['description'] }}</p>
				<p>{{ $listing['url'] }}</p>
				<p>Last updated: {{ $listing['lastUpdated'] }}</p>
		    </div>
		    <hr/>
		@endforeach

	</div>

</body>
</html>