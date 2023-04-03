<?php

namespace ContainerDQfIKGN;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Gvv_Q3nService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Gvv.q3n' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Gvv.q3n'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', true],
            'validator' => ['privates', '.errored.p2BVB.9', NULL, 'Cannot determine controller argument for "App\\Controller\\UserController::update()": the $validator argument is type-hinted with the non-existent class or interface: "App\\Controller\\ValidatorInterface". Did you forget to add a use statement?'],
        ], [
            'entityManager' => '?',
            'validator' => '?',
        ]);
    }
}