<?php
declare(strict_types=1);

namespace ExtendsFramework\Message;

use ExtendsFramework\Message\Payload\PayloadInterface;
use ExtendsFramework\Message\Payload\Type\PayloadTypeInterface;

class Message implements MessageInterface
{
    /**
     * Payload.
     *
     * @var PayloadInterface
     */
    protected $payload;

    /**
     * Payload type.
     *
     * @var PayloadTypeInterface
     */
    protected $payloadType;

    /**
     * Meta data.
     *
     * @var array
     */
    protected $metaData;

    /**
     * Message constructor.
     *
     * @param PayloadInterface     $payload
     * @param PayloadTypeInterface $payloadType
     * @param array                $metaData
     */
    public function __construct(PayloadInterface $payload, PayloadTypeInterface $payloadType, array $metaData)
    {
        $this->payload = $payload;
        $this->payloadType = $payloadType;
        $this->metaData = $metaData;
    }

    /**
     * @inheritDoc
     */
    public function getPayload(): PayloadInterface
    {
        return $this->payload;
    }

    /**
     * @inheritDoc
     */
    public function getPayloadType(): PayloadTypeInterface
    {
        return $this->payloadType;
    }

    /**
     * @inheritDoc
     */
    public function getMetaData(): array
    {
        return $this->metaData;
    }

    /**
     * @inheritDoc
     */
    public function withMetaData(array $metaData): MessageInterface
    {
        $clone = clone $this;
        $clone->metaData = $metaData;

        return $clone;
    }

    /**
     * @inheritDoc
     */
    public function andMetaData(array $metaData): MessageInterface
    {
        $clone = clone $this;
        $clone->metaData = array_replace_recursive($this->metaData, $metaData);

        return $clone;
    }
}