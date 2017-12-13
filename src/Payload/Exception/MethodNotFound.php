<?php
declare(strict_types=1);

namespace ExtendsFramework\Message\Payload\Exception;

use ExtendsFramework\Message\MessageInterface;
use ExtendsFramework\Message\Payload\PayloadException;
use RuntimeException;

class MethodNotFound extends RuntimeException implements PayloadException
{
    /**
     * MethodNotFound constructor.
     *
     * @param MessageInterface $message
     */
    public function __construct(MessageInterface $message)
    {
        parent::__construct(sprintf(
            'Method not found for payload name "%s".',
            $message
                ->getPayloadType()
                ->getName()
        ));
    }
}
