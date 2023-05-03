<?php

namespace ContainerTUJrjcQ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecrets_VaultService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'secrets.vault' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Secrets'.\DIRECTORY_SEPARATOR.'AbstractVault.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'dependency-injection'.\DIRECTORY_SEPARATOR.'EnvVarLoaderInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Secrets'.\DIRECTORY_SEPARATOR.'SodiumVault.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'string'.\DIRECTORY_SEPARATOR.'LazyString.php';

        return $container->privates['secrets.vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault((\dirname(__DIR__, 4).'/config/secrets/'.$container->getEnv('string:default:kernel.environment:APP_RUNTIME_ENV')), \Symfony\Component\String\LazyString::fromCallable(($container->privates['container.getenv'] ?? $container->load('getContainer_GetenvService')), 'base64:default::SYMFONY_DECRYPTION_SECRET'));
    }
}
