<?php
declare(strict_types=1);

namespace ExtendsFramework\Message\Payload;

use Closure;
use ExtendsFramework\Message\MessageInterface;

class MethodStub
{
    use PayloadMethodTrait;

    /**
     * @param MessageInterface $message
     * @return Closure
     * @throws PayloadException
     */
    public function getReflectionMethod(MessageInterface $message): Closure
    {
        return $this->getMethod($message, 'handle');
    }

    /**
     * @return bool
     */
    protected function handleBarQux(): bool
    {
        return true;
    }
}
