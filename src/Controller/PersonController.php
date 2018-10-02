<?php

namespace App\Controller;

use App\Model\PersonManager;

class PersonController
{
    public function list()
    {
        $personManager = new PersonManager();
        $persons = $personManager->selectPersons();

        require __DIR__ . '/../View/list.php';
    }

    public function show(int $id)
    {
        $personManager = new PersonManager();
        $person = $personManager->selectOnePerson($id);

        require __DIR__ . '/../View/show.php';

    }
}
