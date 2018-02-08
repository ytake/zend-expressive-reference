<?php
declare(strict_types=1);

namespace App\Listener;

use App\Repository\UserRepository;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Psr\Log\LoggerInterface;
use Zend\Stratigility\Middleware\ErrorHandler;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

/**
 * Class UserRepositoryListenerDelegatorFactory
 */
class UserRepositoryListenerDelegatorFactory
{
    /**
     * @param ContainerInterface $container
     * @param $name
     * @param callable $callback
     * @return mixed
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $name, callable $callback)
    {
        $listener = new LoggingErrorListener($container->get(LoggerInterface::class));
        /** @var UserRepository $repository */
        $repository = $callback();
        $repository->getEventManager()->attachListener($listener);
        return $repository;
    }
}
