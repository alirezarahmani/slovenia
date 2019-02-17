<?php
declare(strict_types=1);

namespace COG\Recruiting\Entity;

use COG\Recruiting\ValueObjects\Homepage;

/**
 * Represents a single partner from a search result.
 * 
 * @author vovke
 */
class Partner
{
    /**
     * Name of the partner
     * @var string
     */
    private $name;

    /**
     * Url of the partner's homepage (root link)
     * 
     * @var Homepage
     */
    private $homepage;

    /**
     * Unsorted list of prices received from the 
     * actual search query.
     * 
     * @var Price[]
     */
    private $prices = [];
    /**
     * @var int|null
     */
    private $id;

    /**
     * Partner constructor.
     *
     * @param int|null $id
     * @param string   $name
     * @param Homepage $homepage
     * @param array    $prices
     */
    public function __construct(?int $id, string $name, Homepage $homepage, array $prices)
    {
        $this->id = $id;
        $this->name = $name;
        $this->homepage = $homepage;
        $this->prices = $prices;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function id(): ?int
    {
        return $this->id;
    }

    /**
     * @return Homepage
     */
    public function homepage()
    {
        return $this->homepage;
    }

    /**
     * @return array|Price[]
     */
    public function prices()
    {
        return $this->prices;
    }

    /**
     * @param Partner $partner
     *
     * @return bool
     */
    public function sameAs(Partner $partner)
    {
        return ($this->id === $partner->id() && is_a($partner, $this));
    }

}