<?php
require __DIR__ .'/../classes/ListingBasic.php';
require __DIR__ .'/../classes/ListingPremium.php';

use PHPUnit\Framework\TestCase;

class ListingPremiumTest extends TestCase
{
    /** @test */
    public function defaultStatusIsPremium()
    {
        $data = [
            'id' => 1,
            'title' => 'Title',
        ];

        $this->assertEquals('premium', (new ListingPremium($data))->getStatus());
    }

    /** @test */
    public function descriptionCanBeSetAndRetrieved()
    {
        $data = [
            'id' => 1,
            'title' => 'Title',
            'description' => 'Description',
        ];

        $this->assertEquals($data['description'], (new ListingPremium($data))->getDescription());
    }
}
