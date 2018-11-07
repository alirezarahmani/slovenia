<?php

namespace COG\Tests\Service\Repository;

use COG\Recruiting\Dto\HotelDto;
use COG\Recruiting\Entity\Hotel;
use PHPUnit\Framework\TestCase as TestCase;

class HotelDtoTest extends TestCase
{
    /** @test */
    public function should_return_correct_array()
    {
        $hotelDto = new HotelDto;
        $hotel = new Hotel(1, 'grand', 'here', []);
        $hotelDto->add($hotel);
        $this->assertEquals($hotelDto->getArrayCopy()[0]['id'], 1);
        $this->assertEquals($hotelDto->getArrayCopy()[0]['name'], 'grand');
        $this->assertEquals($hotelDto->getArrayCopy()[0]['address'], 'here');
    }
}