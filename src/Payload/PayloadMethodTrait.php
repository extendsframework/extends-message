<?php
declare(strict_types=1);

namespace ExtendsFramework\Message\Payload;

use Closure;
use ExtendsFramework\Message\MessageInterface;
use ExtendsFramework\Message\Payload\Exception\MethodNotFound;
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
        $name = lcfirst($prefix . $message->getPayloadType()->getName());
        if (method_exists($this, $name) === false) {
            throw new MethodNotFound($message);
        }

        return (new ReflectionMethod($this, $name))->getClosure($this);
    }
}
