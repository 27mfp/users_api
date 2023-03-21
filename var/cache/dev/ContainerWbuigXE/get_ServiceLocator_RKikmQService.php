<?php

namespace ContainerWbuigXE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_RKikmQService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator._RKikmQ' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator._RKikmQ'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'doctrine' => ['services', 'doctrine', 'getDoctrineService', true],
            'user' => ['privates', '.errored..service_locator._RKikmQ.App\\Entity\\User', NULL, 'Cannot autowire service ".service_locator._RKikmQ": it needs an instance of "App\\Entity\\User" but this type has been excluded in "config/services.yaml".'],
            'userRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
        ], [
            'doctrine' => '?',
            'user' => 'App\\Entity\\User',
            'userRepository' => 'App\\Repository\\UserRepository',
        ]);
    }
}
