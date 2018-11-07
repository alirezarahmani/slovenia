<?php
declare(strict_types=1);

namespace COG\Recruiting\ValueObjects;

use Assert\Assertion;

class Homepage
{
    private $url;

    public function __construct(string $url)
    {
        Assertion::url($url, $url . ': is a wrong url');
        $this->url = $url;
    }

    public function __toString()
    {
        return $this->url;
    }

    public function sameAsValue(Homepage $homepage): bool
    {
        return $this->url === ((string)$homepage);
    }
}