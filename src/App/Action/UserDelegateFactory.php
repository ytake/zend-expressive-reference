<?php
declare(strict_types=1);

namespace App\Action;

use App\Repository\UserRepository;
use Psr\Container\ContainerInterface;

/**
 * Class UserDelegateFactory
 */
class UserDelegateFactory
{
    /**
     * @param ContainerInterface $container
     * @return UserDelegateAction
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): UserDelegateAction
    {
        return new UserDelegateAction($container->get(UserRepository::class));
    }
}
