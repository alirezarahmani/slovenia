<?php
declare(strict_types=1);

namespace COG\Recruiting\Service;

use COG\Recruiting\Dto\HotelDto;
use COG\Recruiting\Repositories\HotelJsonFileRepository;
use COG\Recruiting\Repositories\HotelRepositoryInterface;

/**
 * Class UnorderedPartnerService
 *
 * @package COG\Recruiting\Service
 */
class UnorderedPartnerService implements PartnerServiceInterface
{
    /**
     * @var HotelJsonFileRepository
     */
    private $repository;

    public function __construct(HotelRepositoryInterface $hotelRepository)
    {
        $this->repository = $hotelRepository;
    }

    /**
     * @param int $cityId
     * return Dto and upper layer will call getArrayCopy
     * @return HotelDto
     */
    public function getResultForCityId($cityId): HotelDto
    {
        $hotelDto = new HotelDto;
        $data = $this->repository->findByCityId($cityId);
        if(isset($data['hotels']) && is_array($data['hotels'])) {
            foreach ($data['hotels'] as $hotel) {
                $hotelDto->add($hotel);
            }
        }
        return $hotelDto;
    }
}