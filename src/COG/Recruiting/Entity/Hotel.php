<?php
declare(strict_types=1);

namespace COG\Recruiting\Entity;

/**
 * Represents a single hotel in the result.
 *
 * @author vovke
 */
class Hotel 
{
    /**
     * Name of the hotel.
     *
     * @var string
     */
    private $name;

    /**
     * Street adr. of the hotel.
     * 
     * @var string
     */
    private $adr;

    /**
     * Unsorted list of partners with their corresponding prices.
     * 
     * @var Partner[]
     */
    private $partners = array();

    /**
     * Id of entity
     * @var int|null
     */
    private $id;

    /**
     * Hotel constructor.
     *
     * @param int|null $id
     * @param string   $name
     * @param string   $adr
     * @param array    $partners
     */
    public function __construct(?int $id, string $name, string $adr, array $partners)
    {
        $this->id = $id;
        $this->adr = $adr;
        $this->partners = $partners;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function address(): string
    {
        return $this->adr;
    }

    /**
     * @return array
     */
    public function partners(): array
    {
        return $this->partners;
    }

    /**
     * @return int|null
     */
    public function id(): ?int
    {
        return $this->id;
    }

    /**
     * @param Hotel $hotel
     *
     * @return bool
     */
    public function sameAs(Hotel $hotel): bool
    {
        return ($this->id === $hotel->id() && is_a($hotel, $this));
    }
}