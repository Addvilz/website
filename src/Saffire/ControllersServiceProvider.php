<?php

namespace Saffire;

use Saffire\Controller\IndexController;
use Silex\Application;
use Silex\ServiceProviderInterface;

class ControllersServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Application $app)
    {
        $app['index.controller'] = $app->share(function () {
            return new IndexController();
        });
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {
    }
}
