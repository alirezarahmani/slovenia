<?php
declare(strict_types=1);

namespace COG\Recruiting\Dto;

use COG\Recruiting\Entity\Partner;

class PartnerDto
{
    private $partners = [];

    public function add(Partner $partner): void
    {
        $this->partners[] = compact(
            $partner->id(),
            strval($partner->homepage()),
            $partner->prices(),
            $partner->name()
        );
    }

    public function getAsArray(): array
    {
        return $this->partners;
    }
}