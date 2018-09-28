<?php
require 'header.php';
require 'connec.php';

$pdo = new PDO(DSN, USER, PASS);

$query = "SELECT * FROM person WHERE id=:id";
$prep = $pdo->prepare($query);
$prep->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$prep->execute();

$person = $prep->fetch();

?>

<main class="container">
    <h1><?= htmlentities($person['name']) ?></h1>
    <p><?= htmlentities($person['age']) ?></p>

    <a class="btn btn-primary" href="index.php">Back to home</a>
</main>

<?php
require 'footer.php';

?>