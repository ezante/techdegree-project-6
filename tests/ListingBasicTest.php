<?php

use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase
{
    /** @test */
    public function throwsExceptionWhenDataUnavailable()
    {
        $this->expectException(Exception::class);

        new ListingBasic;
    }

    /** @test */
    public function throwsExceptionWhenIdIsNotSet()
    {
        $this->expectException(Exception::class);

        new ListingBasic(['title' => 'Title']);
    }

    /** @test */
    public function throwsExceptionWhenTitleIsNotSet()
    {
        $this->expectException(Exception::class);

        new ListingBasic(['id' => 1]);
    }

    /** @test */
    public function canCreateObjectWithIdAndTitleOnly()
    {
        $data = [
            'id' => 1,
            'title' => 'Title',
        ];

        $this->assertIsObject(new ListingBasic($data));
    }

    /** @test */
    public function defaultStatusIsBasic()
    {
        $data = [
            'id' => 1,
            'title' => 'Title',
        ];

        $this->assertEquals('basic', (new ListingBasic($data))->getStatus());
    }

    /** @test */
    public function getMethodsReturnCorrectValues()
    {
        $data = [
            'id' => 1,
            'title' => 'Title',
            'website' => 'https://www.example.org',
            'email' => 'jane.doe@example.org',
            'twitter' => 'JaneDoe',
            'image' => 'https://example.org/image.jpg',
        ];

        $listing = new ListingBasic($data);

        $this->assertEquals($data['id'], $listing->getId());
        $this->assertEquals($data['title'], $listing->getTitle());
        $this->assertEquals($data['website'], $listing->getWebsite());
        $this->assertEquals($data['email'], $listing->getEmail());
        $this->assertEquals($data['twitter'], $listing->getTwitter());
        $this->assertEquals($data['image'], $listing->getImage());
    }

    /** @test */
    public function toArrayMethodReturnsCorrectValues()
    {
        $data = [
            'id' => 1,
            'title' => 'Title',
            'website' => 'https://www.example.org',
            'email' => 'jane.doe@example.org',
            'twitter' => 'JaneDoe',
            'image' => 'https://example.org/image.jpg',
        ];

        $listing = new ListingBasic($data);

        $array = $listing->toArray();

        $this->assertEquals($data['id'], $array['id']);
        $this->assertEquals($data['title'], $array['title']);
        $this->assertEquals($data['website'], $array['website']);
        $this->assertEquals($data['email'], $array['email']);
        $this->assertEquals($data['twitter'], $array['twitter']);
        $this->assertEquals($data['image'], $array['image']);
    }
}
