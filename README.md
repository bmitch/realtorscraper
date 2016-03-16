# Realtor Scraper

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
* Copy the raw body in the request and save it in the .env file with the key `REALTOR_BODY`.