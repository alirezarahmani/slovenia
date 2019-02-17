<?php
declare(strict_types=1);

namespace COG\Recruiting\Dto;

use COG\Recruiting\Entity\Partner;

/**
 * Class PartnerDto
 * https://martinfowler.com/eaaCatalog/dataTransferObject.html
 * @package COG\Recruiting\Dto
 */
class PartnerDto
{
    /**
     * @var array
     */
    private $partners = [];

    /**
     * @param Partner $partner
     */
    public function add(Partner $partner): void
    {
        $this->partners[] = [
            'id' => $partner->id(),
            'homepage' => strval($partner->homepage()),
            'prices' => $partner->prices(),
            'name' => $partner->name()
        ];
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return $this->partners;
    }
}