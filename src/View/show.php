<?php
require 'header.php';

?>

<main class="container">
    <h1><?= htmlentities($person['name']) ?></h1>
    <p><?= htmlentities($person['age']) ?></p>

    <a class="btn btn-primary" href="index.php">Back to home</a>
</main>

<?php
require 'footer.php';

?>