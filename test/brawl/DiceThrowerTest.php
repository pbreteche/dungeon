<?php

namespace POE\test\brawl;


use PHPUnit\Framework\TestCase;
use POE\brawl\DiceThrower;

/**
 * Class DiceThrowerTest
 *
 * @package POE\test\brawl
 *
 * Ce test est finalement pas terrible terrible car sur les tests automatisés
 * on aime bien être capable de les reproduire à l'identique.
 */
class DiceThrowerTest extends TestCase
{

    /**
     * @var DiceThrower
     */
    private $thrower;

    public function setUp()
    {
        $this->thrower = new DiceThrower();
    }

    public function testThrowDice()
    {
        $result = $this->thrower->throwDice(10);

        $this->assertLessThanOrEqual(10, $result);
        $this->assertGreaterThanOrEqual(1, $result);

        $this->markTestIncomplete("Faudrait le tester un peu plus");
    }

}