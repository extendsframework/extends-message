<?php
declare(strict_types=1);

namespace ExtendsFramework\Message;

use ExtendsFramework\Message\Payload\PayloadInterface;
use ExtendsFramework\Message\Payload\Type\PayloadTypeInterface;

interface MessageInterface
{
    /**
     * Get payload.
     *
     * @return PayloadInterface
     */
    public function getPayload(): PayloadInterface;

    /**
     * Get payload type.
     *
     * @return PayloadTypeInterface
     */
    public function getPayloadType(): PayloadTypeInterface;

    /**
     * Get meta data.
     *
     * @return array
     */
    public function getMetaData(): array;

    /**
     * Return new instance with meta data.
     *
     * Existing meta data will be replaced.
     *
     * @param array $metaData
     * @return MessageInterface
     */
    public function withMetaData(array $metaData): MessageInterface;

    /**
     * Return new instance with meta data added.
     *
     * Meta data will be merged into existing meta data.
     *
     * @param array $metaData
     * @return MessageInterface
     */
    public function andMetaData(array $metaData): MessageInterface;
}
