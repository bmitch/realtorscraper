<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\RealtorService;
use App\Services\MailService;
use App\Generators\ListingPageGenerator as Generator;
use Mail;

class RealtorScrape extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'realtor:scrape
                            {search : The saved search to perform}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrapes Realtor Listings';

    /**
     * The RealtorService class instance..
     *
     * @var App\Services\RealtorService
     */
    protected $realtorService;

    /**
     * The ListingsPageGenerator class instance..
     *
     * @var App\Services\ListingsPageGenerator
     */
    protected $generator;

    /**
     * The MailService class instance..
     *
     * @var App\Services\MailService
     */
    protected $mailer;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(RealtorService $realtorService, Generator $generator, MailService $mailer)
    {
        $this->realtorService = $realtorService;
        $this->generator = $generator;
        $this->mailer = $mailer;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @todo  Need to fix this
     */
    public function handle()
    {
        $search = $this->getSearchArgument();
        $this->info('Obtaining Listings...');
        $listingsJson = $this->realtorService->getListings($search);
        $this->info('Listings obtained...');
        $data = $this->generator->formatData($listingsJson);
        $this->info('Sending emails...');
        $this->mailer->mail($data);
        $this->info('Emails sent!');
    }

    private function getSearchArgument()
    {
       return strtoupper($this->argument('search'));
    }
}
