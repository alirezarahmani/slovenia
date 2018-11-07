<?php
declare(strict_types=1);

namespace COG;

interface DataStorageInterface
{
    public function load(int $id): array;
}