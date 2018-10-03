<?php

namespace App\Controller;

use App\Model\PersonManager;
use Twig_Environment;
use Twig_Loader_Filesystem;

class PersonController
{
    private $twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
        $this->twig = new Twig_Environment($loader, [
                'cache' => false,
            ]
        );
    }

    public function list()
    {
        $personManager = new PersonManager();
        $persons = $personManager->selectPersons();

        echo $this->twig->render('list.html.twig', [
                'persons' => $persons,
            ]
        );
    }

    public function show(int $id)
    {
        $personManager = new PersonManager();
        $person = $personManager->selectOnePerson($id);

        require __DIR__ . '/../View/show.php';

    }
}
