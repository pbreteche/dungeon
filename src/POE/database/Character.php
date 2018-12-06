<?php

namespace POE\database;

class Character
{
    private $id;

    private $name;

    private $life_max;

    private $life_current;

    private $energy_max;

    private $energy_current;

    private $attack;

    private $defense;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getMaxLife()
    {
        return $this->life_max;
    }

    /**
     * @return mixed
     */
    public function getCurrentLife()
    {
        return $this->life_current;
    }

    /**
     * @return mixed
     */
    public function getMaxEnergy()
    {
        return $this->energy_max;
    }

    /**
     * @return mixed
     */
    public function getCurrentEnergy()
    {
        return $this->energy_current;
    }

    /**
     * @return mixed
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * @return mixed
     */
    public function getDefense()
    {
        return $this->defense;
    }



}
