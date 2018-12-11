<?php

namespace POE\brawl;


class DiceThrower
{

    public function throwDice(int $sides = 6): int
    {
        return random_int(1, $sides);
    }
}