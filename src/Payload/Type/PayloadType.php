<?php
declare(strict_types=1);

namespace ExtendsFramework\Message\Payload\Type;

use ExtendsFramework\Message\Payload\PayloadInterface;
use ReflectionClass;
use ReflectionException;

class PayloadType implements PayloadTypeInterface
{
    /**
     * Payload.
     *
     * @var PayloadInterface
     */
    private $payload;

    /**
     * PayloadType constructor.
     *
     * @param PayloadInterface $payload
     */
    public function __construct(PayloadInterface $payload)
    {
        $this->payload = $payload;
    }

    /**
     * @inheritDoc
     * @throws ReflectionException
     */
    public function getName(): string
    {
        $class = new ReflectionClass($this->payload);

        return $class->getShortName();
    }
}
