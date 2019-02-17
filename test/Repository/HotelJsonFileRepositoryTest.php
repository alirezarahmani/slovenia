<?php

namespace COG\Tests\Service\Repository;

use COG\Recruiting\Repositories\HotelJsonFileRepository;
use COG\Recruiting\Container\ServiceLocatorContainer;
use RuntimeException;
use PHPUnit\Framework\TestCase as TestCase;

class HotelJsonFileRepositoryTest extends TestCase
{
    /** @test */
    public function should_return_valid_city_data()
    {
        /** @var HotelJsonFileRepository $repo */
        $repo = ServiceLocatorContainer::get(HotelJsonFileRepository::class);
        $data = $repo->findByCityId(15475);
        $this->assertArrayHasKey('city', $data);
        $this->assertArrayHasKey('hotels', $data);
        $this->assertEquals($data['city'], 'Düsseldorf');
        $this->assertNotEmpty($data['hotels']);

    }

    /** @test */
    public function should_throw_exception_invalid_city_data()
    {
        $this->expectException(RuntimeException::class);
        /** @var HotelJsonFileRepository $repo */
        $repo = ServiceLocatorContainer::get(HotelJsonFileRepository::class);
        $repo->findByCityId(150475);
    }
}