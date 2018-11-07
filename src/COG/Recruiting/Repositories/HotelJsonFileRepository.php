<?php
declare(strict_types=1);

namespace COG\Recruiting\Repositories;

use Assert\Assertion;
use COG\DataStorageInterface;

class HotelJsonFileRepository implements HotelRepositoryInterface
{
    /**
     * @var array
     */
    private $storage;

    /**
     * HotelJsonRepository constructor.
     *
     * @param DataStorageInterface $dataStorage
     */
    public function __construct(DataStorageInterface $dataStorage)
    {
        $this->storage = $dataStorage;
    }

    /**
     * @param int $cityId
     * @throws \InvalidArgumentException
     * @return array
     */
    public function findByCityId(int $cityId): array
    {
        $data =  $this->storage->load($cityId);
        Assertion::eq($data['id'], $cityId, $cityId . ': is not found');
        return $data;
    }

    /**
     * @param int $cityId
     * @throws \InvalidArgumentException
     * @return array
     */
    public function findCityHotelsIds(int $cityId): array
    {
        $data =  $this->storage->load($cityId);
        Assertion::eq($data['id'], $cityId, $cityId . ': is not found');
        Assertion::true(
            isset($data['hotels']) && is_array($data['hotels']),
            'no valid hotel found'
        );
        return array_keys($data['hotels']);
    }
}