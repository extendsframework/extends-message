<?php
declare(strict_types=1);

namespace ExtendsFramework\Message\Payload\Type;

use ExtendsFramework\Message\Payload\PayloadInterface;
use PHPUnit\Framework\TestCase;

class PayloadTypeTest extends TestCase
{
    /**
     * Get name.
     *
     * Test that method will correct class name.
     *
     * @covers \ExtendsFramework\Message\Payload\Type\PayloadType::__construct()
     * @covers \ExtendsFramework\Message\Payload\Type\PayloadType::getName()
     * @covers \ExtendsFramework\Message\Payload\Type\PayloadType::getPayload()
     */
    public function testGetName(): void
    {
        $payload = $this
            ->getMockBuilder(PayloadInterface::class)
            ->setMockClassName('FooBarPayload')
            ->getMock();

        /**
         * @var PayloadInterface $payload
         */
        $type = new PayloadType($payload);

        $this->assertSame('FooBarPayload', $type->getName());
    }
}
