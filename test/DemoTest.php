<?php

namespace POE\test;

use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase
{
    public function testPremier()
    {
        $this->assertEquals(true, true);
    }

    public function testDeuxieme()
    {
        $this->assertEquals(true, false);
    }
}