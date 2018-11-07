<?php
declare(strict_types=1);

namespace COG\Recruiting\Dto;

use COG\Recruiting\Entity\Price;

class PriceDto
{
    private $prices = [];

    public function add(Price $price): void
    {
        $this->prices [] = compact(
            $price->id(),
            $price->description(),
            $price->amount(),
            $price->fromDate(),
            $price->toDate()
        );
    }

    public function getAsArray(): array
    {
        return $this->prices;
    }
}