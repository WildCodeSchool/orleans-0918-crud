<?php
require 'header.php';
require 'connec.php';

$pdo = new PDO(DSN, USER, PASS);

$query = "DELETE FROM person WHERE id=:id";
$prep = $pdo->prepare($query);
$prep->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$prep->execute();

$person = $prep->fetch();

header('Location: index.php');
?>

<?php
require 'footer.php';

?>
