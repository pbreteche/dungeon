<?php

namespace POE\database;

class CharacterLoader
{
    public function load($id)
    {
        $connection =  new \PDO('mysql:dbname=dungeon;host=localhost', 'pierre', 'secret');

        $statement = $connection->prepare('SELECT * FROM characters WHERE id = :id');

        $statement->bindValue(':id', $id, \PDO::PARAM_INT);

        /*
         * Ici, on veut récupérer les données de la table characters directement
         * en tant qu'instance de la classe POE\database\Character
         *
         * l'attribut static «class» contient le nom de la classe pleinement
         *  qualifié en tant que chaîne de caractères
         */
        $statement->setFetchMode(\PDO::FETCH_CLASS, Character::class);

        $statement->execute();

        $character = $statement->fetch();

        return $character;
    }
}