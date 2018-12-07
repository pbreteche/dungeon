<?php

namespace POE\database;


class CharacterConnection
{

    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection->getConnection();
    }
}