<?php
declare(strict_types=1);

namespace COG\Recruiting\Entity;

/**
 * Represents a single price from a search result
 * related to a single partner.
 * 
 * @author vovke
 */
class Price
{
    /**
     * Description text for the rate/price
     * 
     * @var string
     */
    private $description;

    /**
     * Price in euro
     * 
     * @var float
     */
    private $amount;

    /**
     * Arrival date, represented by a DateTime obj
     * which needs to be converted from a string on 
     * write of the property.
     *
     * @var \DateTime
     */
    private $fromDate;

    /**
     * Departure date, represented by a DateTime obj
     * which needs to be converted from a string on 
     * write of the property
     *
     * @var \DateTime
     */
    private $toDate;

    /**
     * @var int|null
     */
    private $id;

    /**
     * Price constructor.
     *
     * @param int|null  $id
     * @param string    $description
     * @param float     $amount
     * @param \DateTime $fromDate
     * @param \DateTime $toDate
     */
    public function __construct(?int $id, string $description, float $amount, \DateTime $fromDate, \DateTime $toDate)
    {
        $this->id = $id;
        $this->description = $description;
        $this->amount = $amount;
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }

    /**
     * @return int|null
     */
    public function id(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function amount()
    {
        return $this->amount;
    }

    /**
     * @return \DateTime
     */
    public function fromDate()
    {
        return $this->fromDate;
    }

    /**
     * @return \DateTime
     */
    public function toDate()
    {
        return $this->toDate;
    }

    /**
     * @param Price $price
     *
     * @return bool
     */
    public function sameAs(Price $price)
    {
        return ($this->id === $price->id() && is_a($price, $this));
    }
}
