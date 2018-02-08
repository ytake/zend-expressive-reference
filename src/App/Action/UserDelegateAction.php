<?php
declare(strict_types=1);

namespace App\Action;

use App\Repository\UserRepository;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class UserDelegateAction
 */
class UserDelegateAction implements ServerMiddlewareInterface
{
    /** @var UserRepository */
    protected $repository;

    /**
     * UserDelegateAction constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return ResponseInterface|JsonResponse
     * @throws \Exception
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $this->repository->process();
        return new JsonResponse([]);
    }
}