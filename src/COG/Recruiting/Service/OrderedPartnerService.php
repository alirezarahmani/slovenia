<?php
declare(strict_types=1);

namespace COG\Recruiting\Service;

use COG\Recruiting\Dto\HotelDto;
use COG\Recruiting\Repositories\HotelJsonFileRepository;
use COG\Recruiting\Repositories\HotelRepositoryInterface;

class OrderedPartnerService implements PartnerServiceInterface
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
     * return Dto and upper layer will call getAsArray
     * @return HotelDto
     */
    public function getResultForCityId($cityId): HotelDto
    {
        $hotelDto = new HotelDto;
        $data = $this->repository->findByCityId($cityId);
        if(isset($data['hotels']) && is_array($data['hotels'])) {
            usort($data['hotels'], function ($hotel, $otherHotel) {
                return intval(key($hotel['partners'])) <=> intval(key($otherHotel['partners']));
            });

            foreach ($data['hotels'] as $hotel) {
                $hotelDto->add($hotel);
            }
        }
        return $hotelDto;
    }
}