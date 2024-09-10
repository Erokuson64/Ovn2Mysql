<?php
include 'db_connect.php';

$id = $_GET['id'];

$query = "DELETE FROM members WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute([':id' => $id]);

header('Location: index.php');
exit;
?>