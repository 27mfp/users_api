<?php

namespace Container9x4Z6io;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCache_SecurityIsGrantedAttributeExpressionLanguageService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'cache.security_is_granted_attribute_expression_language' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['cache.security_is_granted_attribute_expression_language'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('EWkZbBkBkZ', 0, $container->getParameter('container.build_id'), ($container->targetDir.''.'/pools/system'), ($container->privates['logger'] ?? $container->getLoggerService()));
    }
}