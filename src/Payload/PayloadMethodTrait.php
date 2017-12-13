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
     * @return Closure
     * @throws PayloadException
     */
    protected function getMethod(MessageInterface $message): Closure
    {
        $name = $this->getPrefix() . $message->getPayloadType()->getName();
        if (method_exists($this, $name) === false) {
            throw new MethodNotFound($message);
        }

        return (new ReflectionMethod($this, $name))->getClosure($this);
    }

    /**
     * Get method name prefix.
     *
     * @return string
     */
    protected function getPrefix(): string
    {
        return $this->prefix;
    }
}
