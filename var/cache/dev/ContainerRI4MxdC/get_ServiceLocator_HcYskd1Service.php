<?php

namespace ContainerRI4MxdC;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_HcYskd1Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.hcYskd1' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.hcYskd1'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'don' => ['privates', '.errored..service_locator.hcYskd1.App\\Entity\\Don', NULL, 'Cannot autowire service ".service_locator.hcYskd1": it references class "App\\Entity\\Don" but no such service exists.'],
        ], [
            'don' => 'App\\Entity\\Don',
        ]);
    }
}
