<?php

namespace POE\database;


class CharacterManager extends CharacterConnection
{

    public function save(Character $character)
    {
        $statement = $this->connection->prepare(
            'INSERT INTO characters 
                (name, life_max, life_current, energy_max, energy_current, defense, attack)
                VALUES (:name, :lmax, :lcur, :emax, :ecur, :def, :att)
        ');

        $statement->bindValue('name', $character->getName());
        $statement->bindValue('lmax', $character->getMaxLife());
        $statement->bindValue('lcur', $character->getCurrentLife());
        $statement->bindValue('emax', $character->getMaxEnergy());
        $statement->bindValue('ecur', $character->getCurrentEnergy());
        $statement->bindValue('def', $character->getDefense());
        $statement->bindValue('att', $character->getAttack());

        try {
            $statement->execute();
        }
        catch(\PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}