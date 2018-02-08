<?php
declare(strict_types=1);

namespace App\Foundation;

use Monolog\Handler\StreamHandler;
use Psr\Container\ContainerInterface;
use Monolog\Logger;

/**
 * Class LoggerFactory
 */
class LoggerFactory
{
    /**
     * @param ContainerInterface $container
     * @return Logger
     * @throws \Exception
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): Logger
    {
        $config = $container->get('config');
        $config['log_dir'];
        $monolog = new Logger("App.Logger");
        if (is_array($config)) {
            $monolog->pushHandler(
                new StreamHandler($config['log_dir'], Logger::WARNING)
            );
        }
        return $monolog;
    }
}
