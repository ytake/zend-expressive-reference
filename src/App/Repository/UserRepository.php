<?php
declare(strict_types=1);

namespace App\Repository;

use Zend\Stratigility\Middleware\ErrorHandler;

/**
 * Class UserRepository
 */
class UserRepository
{
    /** @var ErrorHandler */
    protected $handler;

    /**
     * UserRepository constructor.
     * @param ErrorHandler $handler
     */
    public function __construct(ErrorHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @throws \Exception
     */
    public function process()
    {
        throw new \LogicException('error occurred');
    }

    /**
     * @return ErrorHandler
     */
    public function getEventManager(): ErrorHandler
    {
        return $this->handler;
    }
}
