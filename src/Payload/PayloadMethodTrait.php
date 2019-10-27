<?php
declare(strict_types=1);

namespace ExtendsFramework\Message\Payload;

use Closure;
use ExtendsFramework\Message\MessageInterface;
use ExtendsFramework\Message\Payload\Exception\MethodNotFound;
use ReflectionException;
use ReflectionMethod;

trait PayloadMethodTrait
{
    /**
     * Get method for message.
     *
     * An exception will be thrown when method can not be found.
     *
     * @param MessageInterface $message
     * @param string|null      $prefix
     * @return Closure
     * @throws MethodNotFound
     */
    protected function getMethod(MessageInterface $message, string $prefix = null): Closure
    {
        $name = lcfirst(
            $prefix .
            $message
                ->getPayloadType()
                ->getName()
        );

        try {
            return (new ReflectionMethod($this, $name))->getClosure($this);
        } catch (ReflectionException $exception) {
            throw new MethodNotFound($message);
        }
    }
}
