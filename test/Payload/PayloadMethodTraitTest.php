<?php
declare(strict_types=1);

namespace ExtendsFramework\Message\Payload;

use Closure;
use ExtendsFramework\Message\MessageInterface;
use ExtendsFramework\Message\Payload\Type\PayloadTypeInterface;
use PHPUnit\Framework\TestCase;

class PayloadMethodTraitTest extends TestCase
{
    /**
     * Get method.
     *
     * Test that correct method will be called.
     *
     * @covers \ExtendsFramework\Message\Payload\PayloadMethodTrait::getMethod()
     * @covers \ExtendsFramework\Message\Payload\PayloadMethodTrait::getPrefix()
     */
    public function testGetMethod(): void
    {
        $payloadType = $this->createMock(PayloadTypeInterface::class);
        $payloadType
            ->method('getName')
            ->willReturn('BarQux');

        $message = $this->createMock(MessageInterface::class);
        $message
            ->method('getPayloadType')
            ->willReturn($payloadType);

        /**
         * @var MessageInterface $message
         */
        $stub = new MethodStub();
        $closure = $stub->getReflectionMethod($message);

        $this->assertTrue($closure());
    }

    /**
     * Method not found.
     *
     * Test that exception will be thrown when method can not be found for payload name.
     *
     * @covers                   \ExtendsFramework\Message\Payload\PayloadMethodTrait::getMethod()
     * @covers                   \ExtendsFramework\Message\Payload\PayloadMethodTrait::getPrefix()
     * @covers                   \ExtendsFramework\Message\Payload\Exception\MethodNotFound::__construct()
     * @expectedException        \ExtendsFramework\Message\Payload\Exception\MethodNotFound
     * @expectedExceptionMessage Method not found for payload name "QuxBar".
     */
    public function testMethodNotFound(): void
    {
        $payloadType = $this->createMock(PayloadTypeInterface::class);
        $payloadType
            ->method('getName')
            ->willReturn('QuxBar');

        $message = $this->createMock(MessageInterface::class);
        $message
            ->method('getPayloadType')
            ->willReturn($payloadType);

        /**
         * @var MessageInterface $message
         */
        $stub = new MethodStub();
        $stub->getReflectionMethod($message);
    }
}

class MethodStub
{
    use PayloadMethodTrait;

    /**
     * @var string
     */
    protected $prefix = 'foo';

    /**
     * @param MessageInterface $message
     * @return Closure
     * @throws PayloadException
     */
    public function getReflectionMethod(MessageInterface $message): Closure
    {
        return $this->getMethod($message);
    }

    /**
     * @return bool
     */
    protected function fooBarQux(): bool
    {
        return true;
    }
}
