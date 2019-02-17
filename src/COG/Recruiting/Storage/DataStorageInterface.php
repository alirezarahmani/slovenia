<?php
declare(strict_types=1);

namespace COG\Recruiting\Storage;

interface DataStorageInterface
{
    public function load(int $id): array;
}