<?php

namespace ContainerTUJrjcQ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_UP3_FI9Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.uP3.fI9' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.uP3.fI9'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\AssociationController::delete' => ['privates', '.service_locator.6Rd1IoK', 'get_ServiceLocator_6Rd1IoKService', true],
            'App\\Controller\\AssociationController::edit' => ['privates', '.service_locator.6Rd1IoK', 'get_ServiceLocator_6Rd1IoKService', true],
            'App\\Controller\\AssociationController::index' => ['privates', '.service_locator.aKM6MDa', 'get_ServiceLocator_AKM6MDaService', true],
            'App\\Controller\\AssociationController::new' => ['privates', '.service_locator.aKM6MDa', 'get_ServiceLocator_AKM6MDaService', true],
            'App\\Controller\\AssociationController::show' => ['privates', '.service_locator.5NKX.Kp', 'get_ServiceLocator_5NKX_KpService', true],
            'App\\Controller\\DonController::delete' => ['privates', '.service_locator.tP_jnyC', 'get_ServiceLocator_TPJnyCService', true],
            'App\\Controller\\DonController::edit' => ['privates', '.service_locator.tP_jnyC', 'get_ServiceLocator_TPJnyCService', true],
            'App\\Controller\\DonController::index' => ['privates', '.service_locator.aKM6MDa', 'get_ServiceLocator_AKM6MDaService', true],
            'App\\Controller\\DonController::new' => ['privates', '.service_locator.aKM6MDa', 'get_ServiceLocator_AKM6MDaService', true],
            'App\\Controller\\DonController::sendEmail' => ['privates', '.service_locator.6E9xidT', 'get_ServiceLocator_6E9xidTService', true],
            'App\\Controller\\DonController::show' => ['privates', '.service_locator.hcYskd1', 'get_ServiceLocator_HcYskd1Service', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'App\\Controller\\AssociationController:delete' => ['privates', '.service_locator.6Rd1IoK', 'get_ServiceLocator_6Rd1IoKService', true],
            'App\\Controller\\AssociationController:edit' => ['privates', '.service_locator.6Rd1IoK', 'get_ServiceLocator_6Rd1IoKService', true],
            'App\\Controller\\AssociationController:index' => ['privates', '.service_locator.aKM6MDa', 'get_ServiceLocator_AKM6MDaService', true],
            'App\\Controller\\AssociationController:new' => ['privates', '.service_locator.aKM6MDa', 'get_ServiceLocator_AKM6MDaService', true],
            'App\\Controller\\AssociationController:show' => ['privates', '.service_locator.5NKX.Kp', 'get_ServiceLocator_5NKX_KpService', true],
            'App\\Controller\\DonController:delete' => ['privates', '.service_locator.tP_jnyC', 'get_ServiceLocator_TPJnyCService', true],
            'App\\Controller\\DonController:edit' => ['privates', '.service_locator.tP_jnyC', 'get_ServiceLocator_TPJnyCService', true],
            'App\\Controller\\DonController:index' => ['privates', '.service_locator.aKM6MDa', 'get_ServiceLocator_AKM6MDaService', true],
            'App\\Controller\\DonController:new' => ['privates', '.service_locator.aKM6MDa', 'get_ServiceLocator_AKM6MDaService', true],
            'App\\Controller\\DonController:sendEmail' => ['privates', '.service_locator.6E9xidT', 'get_ServiceLocator_6E9xidTService', true],
            'App\\Controller\\DonController:show' => ['privates', '.service_locator.hcYskd1', 'get_ServiceLocator_HcYskd1Service', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
        ], [
            'App\\Controller\\AssociationController::delete' => '?',
            'App\\Controller\\AssociationController::edit' => '?',
            'App\\Controller\\AssociationController::index' => '?',
            'App\\Controller\\AssociationController::new' => '?',
            'App\\Controller\\AssociationController::show' => '?',
            'App\\Controller\\DonController::delete' => '?',
            'App\\Controller\\DonController::edit' => '?',
            'App\\Controller\\DonController::index' => '?',
            'App\\Controller\\DonController::new' => '?',
            'App\\Controller\\DonController::sendEmail' => '?',
            'App\\Controller\\DonController::show' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\AssociationController:delete' => '?',
            'App\\Controller\\AssociationController:edit' => '?',
            'App\\Controller\\AssociationController:index' => '?',
            'App\\Controller\\AssociationController:new' => '?',
            'App\\Controller\\AssociationController:show' => '?',
            'App\\Controller\\DonController:delete' => '?',
            'App\\Controller\\DonController:edit' => '?',
            'App\\Controller\\DonController:index' => '?',
            'App\\Controller\\DonController:new' => '?',
            'App\\Controller\\DonController:sendEmail' => '?',
            'App\\Controller\\DonController:show' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
