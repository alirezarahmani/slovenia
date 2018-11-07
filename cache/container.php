<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class MyCachedContainer extends Container
{
    private $parameters;
    private $targetDirs = array();

    public function __construct()
    {
        $this->services = $this->privates = array();
        $this->methodMap = array(
            'COG\\Recruiting\\Repositories\\HotelJsonFileRepository' => 'getHotelJsonFileRepositoryService',
            'COG\\Recruiting\\Service\\OrderedPartnerService' => 'getOrderedPartnerServiceService',
            'COG\\Recruiting\\Service\\PartnerNameOrderedHotelService' => 'getPartnerNameOrderedHotelServiceService',
            'COG\\Recruiting\\Service\\UnorderedHotelService' => 'getUnorderedHotelServiceService',
            'COG\\Recruiting\\Service\\UnorderedPartnerService' => 'getUnorderedPartnerServiceService',
        );

        $this->aliases = array();
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function getRemovedIds()
    {
        return array(
            'COG\\Recruiting\\Storage\\JsonDataStore' => true,
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
        );
    }

    /**
     * Gets the public 'COG\Recruiting\Repositories\HotelJsonFileRepository' shared service.
     *
     * @return \COG\Recruiting\Repositories\HotelJsonFileRepository
     */
    protected function getHotelJsonFileRepositoryService()
    {
        return $this->services['COG\Recruiting\Repositories\HotelJsonFileRepository'] = new \COG\Recruiting\Repositories\HotelJsonFileRepository(new \COG\Recruiting\Storage\JsonDataStore());
    }

    /**
     * Gets the public 'COG\Recruiting\Service\OrderedPartnerService' shared service.
     *
     * @return \COG\Recruiting\Service\OrderedPartnerService
     */
    protected function getOrderedPartnerServiceService()
    {
        return $this->services['COG\Recruiting\Service\OrderedPartnerService'] = new \COG\Recruiting\Service\OrderedPartnerService(($this->services['COG\Recruiting\Repositories\HotelJsonFileRepository'] ?? $this->getHotelJsonFileRepositoryService()));
    }

    /**
     * Gets the public 'COG\Recruiting\Service\PartnerNameOrderedHotelService' shared service.
     *
     * @return \COG\Recruiting\Service\PartnerNameOrderedHotelService
     */
    protected function getPartnerNameOrderedHotelServiceService()
    {
        return $this->services['COG\Recruiting\Service\PartnerNameOrderedHotelService'] = new \COG\Recruiting\Service\PartnerNameOrderedHotelService(($this->services['COG\Recruiting\Service\OrderedPartnerService'] ?? $this->getOrderedPartnerServiceService()));
    }

    /**
     * Gets the public 'COG\Recruiting\Service\UnorderedHotelService' shared service.
     *
     * @return \COG\Recruiting\Service\UnorderedHotelService
     */
    protected function getUnorderedHotelServiceService()
    {
        return $this->services['COG\Recruiting\Service\UnorderedHotelService'] = new \COG\Recruiting\Service\UnorderedHotelService(($this->services['COG\Recruiting\Service\UnorderedPartnerService'] ?? $this->getUnorderedPartnerServiceService()));
    }

    /**
     * Gets the public 'COG\Recruiting\Service\UnorderedPartnerService' shared service.
     *
     * @return \COG\Recruiting\Service\UnorderedPartnerService
     */
    protected function getUnorderedPartnerServiceService()
    {
        return $this->services['COG\Recruiting\Service\UnorderedPartnerService'] = new \COG\Recruiting\Service\UnorderedPartnerService(($this->services['COG\Recruiting\Repositories\HotelJsonFileRepository'] ?? $this->getHotelJsonFileRepositoryService()));
    }
}
