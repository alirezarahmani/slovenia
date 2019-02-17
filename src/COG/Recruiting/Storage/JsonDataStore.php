<?php
declare(strict_types=1);

namespace COG\Recruiting\Storage;

use Assert\Assertion;
use COG\Config\Configuration;
use RuntimeException;

/**
 * Class JsonDataStore
 *
 * @package COG
 */
final class JsonDataStore implements DataStorageInterface
{
    /**
     * @param int $id
     *
     * @return array
     */
    public function load(int $id): array
    {
        $rootDir = Configuration::setting()['root'];
        try {
            Assertion::file($file = $rootDir . 'data/' . $id . '.json', $id . ' : is not exist');
            $jsonData = file_get_contents($file);
            $data = json_decode($jsonData, true);
            Assertion::true(json_last_error() == JSON_ERROR_NONE, 'make sure the source file has valid data');
            return $data;
        } catch (\InvalidArgumentException $argumentException) {
            throw new RuntimeException($argumentException->getMessage());
        }
    }
}

