<?php
declare(strict_types=1);

namespace COG;

use COG\Config\Configuration;
use COG\Recruiting\Repositories\HotelJsonFileRepository;
use COG\Recruiting\Service\OrderedPartnerService;
use COG\Recruiting\Service\PartnerNameOrderedHotelService;
use COG\Recruiting\Service\UnorderedHotelService;
use COG\Recruiting\Service\UnorderedPartnerService;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ServiceLocatorContainer
 *
 * @package COG
 */
final class ServiceLocatorContainer
{
    /** @var ?Container  */
    private static $container = null;

    /**
     * @return Container
     */
    private static function create(): Container
    {
        $compiledClassName = 'MyCachedContainer';
        $cacheDir = Configuration::setting()['root'] . '/cache/';
        $cachedContainerFile = "{$cacheDir}container" . '.php';
        //create container if not exist
        if (!is_file($cachedContainerFile)) {
            $container = new ContainerBuilder(new ParameterBag());
            $container->register(JsonDataStore::class);
            $container->register(HotelJsonFileRepository::class)
                ->addArgument(new Reference(JsonDataStore::class))
                ->setPublic(true);
            $container->register(OrderedPartnerService::class)
                ->addArgument(new Reference(HotelJsonFileRepository::class))
                ->setPublic(true);
            $container->register(PartnerNameOrderedHotelService::class)
                ->addArgument(new Reference(OrderedPartnerService::class))
                ->setPublic(true);
            $container->register(UnorderedPartnerService::class)
                ->addArgument(new Reference(HotelJsonFileRepository::class))
                ->setPublic(true);
            $container->register(UnorderedHotelService::class)
                ->addArgument(new Reference(UnorderedPartnerService::class))
                ->setPublic(true);
            $container->compile();
            file_put_contents(
                $cachedContainerFile,
                (new PhpDumper($container))->dump(['class' => $compiledClassName])
            );
        }
        /** @noinspection PhpIncludeInspection */
        include_once $cachedContainerFile;
        /**
         * @var Container $container
         */
        return (new $compiledClassName());
    }

    /**
     * @param string $id
     *
     * @return object
     * @throws \Exception
     */
    public static function get(string $id)
    {
        if (empty(self::$container)) {
            self::$container = self::create();
        }
        return self::$container->get($id);
    }
}