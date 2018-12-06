<?php

namespace POE\database;

class Characterloader
{
    public function load()
    {
        $character = new Character();

        return $character;
    }
}