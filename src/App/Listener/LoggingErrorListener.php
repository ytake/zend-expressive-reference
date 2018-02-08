<?php
declare(strict_types=1);

namespace App\Listener;

use Exception;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Throwable;

/**
 * Class LoggingErrorListener
 */
final class LoggingErrorListener
{
    /**
     * Log format for messages:
     *
     * STATUS [METHOD] path: message
     */
    const LOG_FORMAT = '%d [%s] %s: %s';

    /** @var LoggerInterface  */
    private $logger;

    /**
     * LoggingErrorListener constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param $error
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     */
    public function __invoke($error, ServerRequestInterface $request, ResponseInterface $response): void
    {
        $this->logger->error(sprintf(
            self::LOG_FORMAT,
            $response->getStatusCode(),
            $request->getMethod(),
            (string) $request->getUri(),
            $error->getMessage()
        ));
    }
}
