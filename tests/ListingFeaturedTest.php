<?php
require __DIR__ .'/../classes/ListingBasic.php';
require __DIR__ .'/../classes/ListingPremium.php';
require __DIR__ .'/../classes/ListingFeatured.php';

use PHPUnit\Framework\TestCase;

class ListingFeaturedTest extends TestCase
{
    /** @test */
    public function defaultStatusIsFeatured()
    {
        $data = [
            'id' => 1,
            'title' => 'Title',
        ];

        $this->assertEquals('featured', (new ListingFeatured($data))->getStatus());
    }
}
