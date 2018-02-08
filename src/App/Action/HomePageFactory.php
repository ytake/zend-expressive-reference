<?php
declare(strict_types=1);

namespace App\Action;

use Psr\Container\ContainerInterface;

/**
 * Class HomePageFactory
 */
class HomePageFactory
{
    public function __invoke(ContainerInterface $container): HomePageAction
    {
        return new HomePageAction();
    }
}
