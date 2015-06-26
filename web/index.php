<?php

$debug = false;
if (php_sapi_name() == 'cli-server') {
    if ('127.0.0.1' !== $_SERVER['REMOTE_ADDR']) {
        die('Access via development server only allowed from localhost (see web/index.php)');
    }

    if ('/' !== $_SERVER['REQUEST_URI'] && file_exists(__DIR__.$_SERVER['REQUEST_URI'])) {
        return false;
    }

    $debug = true;
}

require __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application([
    'debug' => $debug,
]);

$app->register(new Silex\Provider\TwigServiceProvider(),
    [
        'twig.path' => (__DIR__.'/../views/'),
        'twig.options' => [
            'cache' => (__DIR__.'/../tmp/twig/'),
        ],
    ]);
$app->register(new Silex\Provider\HttpCacheServiceProvider(),
    [
        'http_cache.cache_dir' => (__DIR__.'/../tmp/http_cache/'),
    ]);

$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Saffire\AppServiceProvider());
$app->register(new Saffire\ControllersServiceProvider());
$app->register(new Saffire\RoutesServiceProvider());

$app['http_cache']->run();
