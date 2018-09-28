<?php
require 'header.php';
require 'connec.php';

$pdo = new PDO(DSN, USER, PASS);

$query = "SELECT * FROM person";
$res = $pdo->query($query);
$persons = $res->fetchAll();


?>

    <main class="container">
        <h1>Welcome Kaamelott</h1>
        <div class="row">
            <?php foreach ($persons as $person) : ?>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-title">
                            <a href="show.php?id=<?= $person['id'] ?>"><?= htmlentities($person['name']) ?></a>
                        </div>
                        <div class="card-body">
                            <?= htmlentities($person['age']) ?>
                            <form method="post" action="delete.php">
                                <input type="hidden" name="id" value="<?= $person['id'] ?>"/>
                                <button class="btn btn-danger">Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </main>
<?php
require 'footer.php';

?>