<?php

namespace COG\Tests\Service\Repository;

use COG\Recruiting\Dto\HotelDto;
use COG\Recruiting\Entity\Hotel;
use PHPUnit\Framework\TestCase as TestCase;

class HotelDtoTest extends TestCase
{
    /** @test */
    public function should_return_right_customer()
    {
        $hotel = new Hotel();
        $storage = new StorageTest();
        $hotel->addCustomer('fake name', 'fake last name');
        $customer = $storage->getCustomerByName('fake name');
        $this->assertEquals($customer->name(), 'fake name');
        $this->assertEquals($customer->lastName(), 'fake last name');
    }
}