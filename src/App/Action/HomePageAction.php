<?php
declare(strict_types=1);

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class HomePageAction
 */
class HomePageAction implements ServerMiddlewareInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return \Psr\Http\Message\ResponseInterface|JsonResponse
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        return new JsonResponse([
            'welcome' => 'Congratulations! You have installed the zend-expressive skeleton application.',
            'docsUrl' => 'https://docs.zendframework.com/zend-expressive/',
        ]);
    }
}
