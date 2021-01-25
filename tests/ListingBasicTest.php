<?php
require __DIR__ .'/../classes/ListingBasic.php';

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
}
