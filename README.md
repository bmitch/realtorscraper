# Realtor Scraper
Scrapes a well known Canadian Realty website for search results and emails them to specified recipients.

# Installation
* git clone git@github.com:bmitch/realtorscraper.git
* composer install
* Follow the setup steps below.
* Run the command `php artisan realtor:scrape`

## Steps to setup the scraper

### Obtain the CURL request
* Use Chrome Browser and open dev tools to the network tab.
* Conduct your search on the Realtor site.
* Filter requests called `PropertySearch_Post`.
* Right click this request and choose `Copy as CURL`.

### Parse the CURL request
* Open Postman (https://www.getpostman.com).
* Import -> Paste RAW Text.
* Paste the text in the text area and click 'Import'.
* Copy the URL used in the request and save it in the .env file with the key `REALTOR_URL`.
* Copy the raw body in the request and save it in the .env file with the key `REALTOR_SEARCH_<name for search>`.
* Set the domain of the Realtor site to the .env value `REALTOR_DOMAIN`.

### Setup email
* In the .env file:
 * `REALTOR_EMAIL_FROM` is who the email will be sent from.
 * `REALTOR_EMAIL_TO` is who the email will be sent to. This can be a single address or multiple addresses separated by a comma. Example: 'one@email.com,two@email.com'.

### Setup Google Maps API Key
* Obtain a Google Maps API key (https://developers.google.com/maps/documentation/static-maps/).
* Store the API key in the .env variable `GOOGLE_MAPS_API_KEY`

## Run the command
We'll use the example that you saved your search with a env variable name of `REALTOR_SEARCH_HOUSES`, to run this search:
`php artisan realtor:scrape houses`

If you want to run multiple saved searches, separate them with a comma:
`php artisan realtor:scrape houses,condos`