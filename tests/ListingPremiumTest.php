<?php

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

    /** @test */
    public function displayAllowedTags()
    {
        $this->assertEquals(
            htmlspecialchars('<p><br><b><strong><em><u><ol><ul><li>'),
            ListingPremium::displayAllowedTags()
        );
    }
}
