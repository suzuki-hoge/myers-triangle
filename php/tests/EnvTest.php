<?php

declare(strict_types=1);

namespace Myers;

use PHPUnit\Framework\TestCase;

class EnvTest extends TestCase
{
    /**
     * @test
     */
    public function php()
    {
        $this->assertTrue(str_starts_with(Env::php(), '8.0'));
    }
}
