<?php
declare(strict_types=1);

namespace ExtendsFramework\Message\Payload\Type;

interface PayloadTypeInterface
{
    /**
     * Get name for payload.
     *
     * @return string
     */
    public function getName(): string;
}
