<?php

namespace App\Model;

class PersonManager
{
    public function selectPersons()
    {
        $pdo = new \PDO(DSN, USER, PASS);

        $query = "SELECT * FROM person";
        $res = $pdo->query($query);
        return $res->fetchAll();
    }

    public function selectOnePerson(int $id)
    {
        $pdo = new \PDO(DSN, USER, PASS);

        $query = "SELECT * FROM person WHERE id=:id";
        $prep = $pdo->prepare($query);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->execute();

        return $prep->fetch();

    }
}

