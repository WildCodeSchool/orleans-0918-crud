<?php
require 'header.php';
require 'connec.php';

$pdo = new \PDO(DSN, USER, PASS);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];
    if (!empty($_POST['age']) ) {
        if ($_POST['age'] < 0) {
            $errors[] = 'Attention, l\'age doit être positif';
        }
    }

    if (!empty($errors)) {
        var_dump($errors);
    } else {
        $query = "INSERT INTO person (name, age) VALUES (:name, :age)";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':name', htmlentities($_POST['name']), \PDO::PARAM_STR);
        $statement->bindValue(':age', $_POST['age'], \PDO::PARAM_INT);

        $statement->execute();
        header('Location: index.php');
        exit();
    }
}
?>

<main class="container">
    <h1>Add new person</h1>

    <form method="post" action="add.php">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Arthur">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" placeholder="40">
        </div>

        <button class="btn btn-success">Add</button>
    </form>

</main>

<?php
require 'footer.php';

?>