<?php
declare(strict_types=1);

namespace ExtendsFramework\Message\Payload\Type;

use ExtendsFramework\Message\Payload\PayloadInterface;
use ReflectionClass;

class PayloadType implements PayloadTypeInterface
{
    /**
     * Payload.
     *
     * @var PayloadInterface
     */
    protected $payload;

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
     */
    public function getName(): string
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $class = new ReflectionClass($this->getPayload());

        return $class->getShortName();
    }

    /**
     * Get payload.
     *
     * @return PayloadInterface
     */
    protected function getPayload(): PayloadInterface
    {
        return $this->payload;
    }
}
