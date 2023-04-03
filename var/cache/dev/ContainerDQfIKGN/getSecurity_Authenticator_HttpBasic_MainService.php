<?php

namespace ContainerDQfIKGN;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authenticator_HttpBasic_MainService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'security.authenticator.http_basic.main' shared service.
     *
     * @return \Symfony\Component\Security\Http\Authenticator\HttpBasicAuthenticator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'security-http'.\DIRECTORY_SEPARATOR.'Authenticator'.\DIRECTORY_SEPARATOR.'AuthenticatorInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'security-http'.\DIRECTORY_SEPARATOR.'EntryPoint'.\DIRECTORY_SEPARATOR.'AuthenticationEntryPointInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'security-http'.\DIRECTORY_SEPARATOR.'Authenticator'.\DIRECTORY_SEPARATOR.'HttpBasicAuthenticator.php';

        return $container->privates['security.authenticator.http_basic.main'] = new \Symfony\Component\Security\Http\Authenticator\HttpBasicAuthenticator('Secured Area', ($container->privates['security.user.provider.concrete.in_memory_users'] ?? $container->load('getSecurity_User_Provider_Concrete_InMemoryUsersService')), ($container->privates['logger'] ?? $container->getLoggerService()));
    }
}