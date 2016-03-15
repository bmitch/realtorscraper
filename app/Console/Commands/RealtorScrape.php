<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RealtorScrape extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'realtor:scrape';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrapes Realtor Listings';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Call the RealtorService and specify
        // a name of a curl call to make
        // ("could have multiple for different sorts etc..")
        // store these in an .env file or config?
        // $listings = RealtorService->getListings();

        // Take listings and turn into HTML
        // $listingsHtml = ListingsPageGenerator->generateHtml($listings)

        // Send emails to list of users in config
        // EmailClass->sendEmail(['email@addresses.com'], $listingsHtml);
    }
}
