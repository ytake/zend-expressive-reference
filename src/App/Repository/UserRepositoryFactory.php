<?php
declare(strict_types=1);

namespace App\Repository;

use Psr\Container\ContainerInterface;
use Zend\Stratigility\Middleware\ErrorHandler;

/**
 * Class UserRepository
 */
class UserRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     * @return UserRepository
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): UserRepository
    {
        return new UserRepository(
            $container->get(ErrorHandler::class)
        );
    }
}
