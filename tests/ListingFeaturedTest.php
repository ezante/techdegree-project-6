<?php

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

    /** @test */
    public function cocCanBeSetAndRetrieved()
    {
        $data = [
            'id' => 1,
            'title' => 'Title',
            'coc' => 'Code of Conduct',
        ];

        $this->assertEquals($data['coc'], (new ListingFeatured($data))->getCoc());
    }
}
