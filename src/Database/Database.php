<?php

namespace NostrDev\Database;

class Database
{
    private $pdo;
    public function connect()
    {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:../../nostr_php.db");
        }
        return $this->pdo;
    }
}
