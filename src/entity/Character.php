<?php

namespace POE\entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Character
 *
 * @ORM\Entity()
 * @ORM\Table(name="characters")
 */
class Character
{

    /*
     * Commentaires non interprétés
     */
    /**
     * l'identifiant en base de données
     *
     * @var int
     *
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="life_max")
     */
    private $maxLife;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="life_current")
     */
    private $currentLife;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="energy_max")
     */
    private $maxEnergy;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="energy_current")
     */
    private $currentEnergy;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $attack;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
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
        return $this->maxLife;
    }

    /**
     * @param mixed $life_max
     */
    public function setMaxLife($life_max): void
    {
        $this->maxLife = $life_max;
    }

    /**
     * @return mixed
     */
    public function getCurrentLife()
    {
        return $this->currentLife;
    }

    /**
     * @param mixed $life_current
     */
    public function setCurrentLife($life_current): void
    {
        $this->currentLife = $life_current;
    }

    /**
     * @return mixed
     */
    public function getMaxEnergy()
    {
        return $this->maxEnergy;
    }

    /**
     * @param mixed $energy_max
     */
    public function setMaxEnergy($energy_max): void
    {
        $this->maxEnergy = $energy_max;
    }

    /**
     * @return mixed
     */
    public function getCurrentEnergy()
    {
        return $this->currentEnergy;
    }

    /**
     * @param mixed $energy_current
     */
    public function setCurrentEnergy($energy_current): void
    {
        $this->currentEnergy = $energy_current;
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
        $this->currentLife -= $amount;
        if (0 > $this->currentLife) {
            throw new \Exception("Aaaaaargh");
        }
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'currentLife' => $this->currentLife,
            'maxLife' => $this->maxLife,
            'currentEnergy' => $this->currentEnergy,
            'maxEnergy' => $this->maxEnergy,
            'attack' => $this->attack,
            'defense' => $this->defense,
        ];
    }
}
