<?php
declare(strict_types=1);

namespace COG\Recruiting\Dto;

use COG\Recruiting\Entity\Partner;
use COG\Recruiting\Entity\Price;
use COG\Recruiting\ValueObjects\Homepage;

class HotelDto
{
    private $hotels = [];
    private $partnerDto;
    private $priceDto;

    public function __construct()
    {
        $this->partnerDto = new PartnerDto;
        $this->priceDto = new PriceDto;
    }

    public function add(array $hotels): void
    {
        foreach ($hotels as $hotelId => list($name, $adr, $hotelPartners)) {
            foreach ($hotelPartners as $partnerId => list($partnerName, $url, $prices)) {
                foreach ($prices as $priceId => list($description, $amount, $from, $to)) {
                    $this->priceDto->add(
                        new Price(
                            intval($priceId),
                            $description,
                            floatval($amount),
                            new \DateTime($from),
                            new \DateTime($to)
                        )
                    );
                }
                $this->partnerDto->add(
                    new Partner(
                        intval($partnerId),
                        $partnerName,
                        new Homepage($url),
                        $this->priceDto->getAsArray()
                    )
                );
            }
            $this->hotels[] = compact(
                intval($hotelId),
                $name,
                $adr,
                $this->partnerDto->getAsArray()
            );
        }
    }

    public function getAsArray(): array
    {
        return $this->hotels;
    }
}