<?php
declare(strict_types=1);

namespace ExtendsFramework\Message;

use ExtendsFramework\Message\Payload\PayloadInterface;
use ExtendsFramework\Message\Payload\Type\PayloadTypeInterface;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    /**
     * Get methods.
     *
     * Test that get methods will return correct values.
     *
     * @covers \ExtendsFramework\Message\Message::__construct()
     * @covers \ExtendsFramework\Message\Message::getPayload()
     * @covers \ExtendsFramework\Message\Message::getPayloadType()
     * @covers \ExtendsFramework\Message\Message::getMetaData()
     */
    public function testGetMethods(): void
    {
        $payload = $this->createMock(PayloadInterface::class);
        $payloadType = $this->createMock(PayloadTypeInterface::class);

        /**
         * @var PayloadInterface     $payload
         * @var PayloadTypeInterface $payloadType
         */
        $message = new Message($payload, $payloadType, [
            'foo' => 'bar',
        ]);

        $this->assertSame($payload, $message->getPayload());
        $this->assertSame($payloadType, $message->getPayloadType());
        $this->assertSame(['foo' => 'bar'], $message->getMetaData());
    }

    /**
     * With meta data.
     *
     * Test that method will replace existing meta data.
     *
     * @covers \ExtendsFramework\Message\Message::__construct()
     * @covers \ExtendsFramework\Message\Message::withMetaData()
     * @covers \ExtendsFramework\Message\Message::getMetaData()
     */
    public function testWithMetaData(): void
    {
        $payload = $this->createMock(PayloadInterface::class);
        $payloadType = $this->createMock(PayloadTypeInterface::class);

        /**
         * @var PayloadInterface     $payload
         * @var PayloadTypeInterface $payloadType
         */
        $message = new Message($payload, $payloadType, [
            'foo' => 'bar',
        ]);
        $message = $message->withMetaData([
            'qux' => 'quux',
        ]);

        $this->assertSame(['qux' => 'quux'], $message->getMetaData());
    }

    /**
     * With meta data.
     *
     * Test that method will merge existing meta data with extra meta data.
     *
     * @covers \ExtendsFramework\Message\Message::__construct()
     * @covers \ExtendsFramework\Message\Message::andMetaData()
     * @covers \ExtendsFramework\Message\Message::getMetaData()
     */
    public function testAndMetaData(): void
    {
        $payload = $this->createMock(PayloadInterface::class);
        $payloadType = $this->createMock(PayloadTypeInterface::class);

        /**
         * @var PayloadInterface     $payload
         * @var PayloadTypeInterface $payloadType
         */
        $message = new Message($payload, $payloadType, [
            'foo' => 'bar',
        ]);
        $message = $message->andMetaData([
            'qux' => 'quux',
        ]);

        $this->assertSame(['foo' => 'bar', 'qux' => 'quux'], $message->getMetaData());
    }
}
