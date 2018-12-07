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
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMaxLife()
    {
        return $this->life_max;
    }

    /**
     * @param mixed $life_max
     */
    public function setMaxLife($life_max): void
    {
        $this->life_max = $life_max;
    }

    /**
     * @return mixed
     */
    public function getCurrentLife()
    {
        return $this->life_current;
    }

    /**
     * @param mixed $life_current
     */
    public function setCurrentLife($life_current): void
    {
        $this->life_current = $life_current;
    }

    /**
     * @return mixed
     */
    public function getMaxEnergy()
    {
        return $this->energy_max;
    }

    /**
     * @param mixed $energy_max
     */
    public function setMaxEnergy($energy_max): void
    {
        $this->energy_max = $energy_max;
    }

    /**
     * @return mixed
     */
    public function getCurrentEnergy()
    {
        return $this->energy_current;
    }

    /**
     * @param mixed $energy_current
     */
    public function setCurrentEnergy($energy_current): void
    {
        $this->energy_current = $energy_current;
    }

    /**
     * @return mixed
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * @param mixed $attack
     */
    public function setAttack($attack): void
    {
        $this->attack = $attack;
    }

    /**
     * @return mixed
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param mixed $defense
     */
    public function setDefense($defense): void
    {
        $this->defense = $defense;
    }

    public function wound(int $amount): void
    {
        $this->life_current -= $amount;
        if (0 > $this->life_current) {
            throw new \Exception("Aaaaaargh");
        }
    }


}
