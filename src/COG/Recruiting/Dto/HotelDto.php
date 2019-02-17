<?php
declare(strict_types=1);

namespace COG\Recruiting\Dto;

use COG\Recruiting\Entity\Hotel;
use COG\Recruiting\Entity\Partner;
use COG\Recruiting\Entity\Price;
use COG\Recruiting\ValueObjects\Homepage;

/**
 * Class HotelDto
 * https://martinfowler.com/eaaCatalog/dataTransferObject.html
 * @package COG\Recruiting\Dto
 */
class HotelDto
{
    private $hotels = [];
    private $partnerDto;
    private $priceDto;

    /**
     * HotelDto constructor.
     */
    public function __construct()
    {
        $this->partnerDto = new PartnerDto;
        $this->priceDto = new PriceDto;
    }

    /**
     * @param Hotel $hotel
     */
    public function add(Hotel $hotel): void
    {
            foreach ($hotel->partners() as $partnerId => list($partnerName, $url, $prices)) {
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
                        $this->priceDto->getArrayCopy()
                    )
                );
            }

            $this->hotels[] = [
                'id' => intval($hotel->id()),
                'name' => $hotel->name(),
                'address' => $hotel->address(),
                'partner' => $this->partnerDto->getArrayCopy()
            ];

    }

    public function getArrayCopy(): array
    {
        return $this->hotels;
    }
}