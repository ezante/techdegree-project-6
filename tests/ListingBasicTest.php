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
    public function setsAndGetsCorrectValues()
    {
        $data = [
            'id' => 1,
            'title' => 'Title',
            'website' => 'https://www.example.org',
            'email' => 'jane.doe@example.org',
            'twitter' => 'JaneDoe',
            'image' => 'https://example.org/image.jpg',
            'status' => 'basic',
        ];

        $listing = new ListingBasic($data);

        $this->assertEquals($data['id'], $listing->getId());
        $this->assertEquals($data['title'], $listing->getTitle());
        $this->assertEquals($data['website'], $listing->getWebsite());
        $this->assertEquals($data['email'], $listing->getEmail());
        $this->assertEquals($data['twitter'], $listing->getTwitter());
        $this->assertEquals($data['image'], $listing->getImage());
        $this->assertEquals($data['status'], $listing->getStatus());
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
            'status' => 'basic',
        ];

        $listing = new ListingBasic($data);

        $array = $listing->toArray();

        $this->assertEquals($data['id'], $array['id']);
        $this->assertEquals($data['title'], $array['title']);
        $this->assertEquals($data['website'], $array['website']);
        $this->assertEquals($data['email'], $array['email']);
        $this->assertEquals($data['twitter'], $array['twitter']);
        $this->assertEquals($data['image'], $array['image']);
        $this->assertEquals($data['status'], $array['status']);
    }

    /** @test */
    public function setsWebsiteCorrectly()
    {
        $data = [
            'id' => 1,
            'title' => 'Title',
        ];

        $listing = new ListingBasic($data);

        $listing->setWebsite('');
        $this->assertNull($listing->getWebsite());

        $listing->setWebsite('example.org');
        $this->assertEquals('http://example.org', $listing->getWebsite());

        $listing->setWebsite('http://example.org');
        $this->assertEquals('http://example.org', $listing->getWebsite());
    }

    /** @test */
    public function setsTwitterCorrectly()
    {
        $data = [
            'id' => 1,
            'title' => 'Title',
        ];

        $listing = new ListingBasic($data);

        $listing->setTwitter('JaneDoe');
        $this->assertEquals('JaneDoe', $listing->getTwitter());

        $listing->setTwitter('@JaneDoe');
        $this->assertEquals('JaneDoe', $listing->getTwitter());
    }

    /** @test */
    public function setsStatusCorrectly()
    {
        $data = [
            'id' => 1,
            'title' => 'Title',
        ];

        $listing = new ListingBasic($data);

        $listing->setStatus(null);
        $this->assertEquals('basic', $listing->getStatus());

        $listing->setStatus('inactive');
        $this->assertEquals('inactive', $listing->getStatus());
    }
}
