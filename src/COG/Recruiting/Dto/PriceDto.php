<?php
declare(strict_types=1);

namespace COG\Recruiting\Dto;

use COG\Recruiting\Entity\Price;

/**
 * Class PriceDto
 * https://martinfowler.com/eaaCatalog/dataTransferObject.html
 * @package COG\Recruiting\Dto
 */
class PriceDto
{
    /**
     * @var array
     */
    private $prices = [];

    /**
     * @param Price $price
     */
    public function add(Price $price): void
    {
        $this->prices [] = [
            'id' => $price->id(),
            'description' => $price->description(),
            'amount' => $price->amount(),
            'from' => $price->fromDate(),
            'to' => $price->toDate()
        ];
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return $this->prices;
    }
}