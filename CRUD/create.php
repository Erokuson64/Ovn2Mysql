<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "INSERT INTO members (firstname, lastname, birthday, phone, email) VALUES (:firstname, :lastname, :birthday, :phone, :email)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':birthday' => $birthday,
        ':phone' => $phone,
        ':email' => $email
    ]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Lägg till Medlem</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>

<h2>Lägg till ny medlem</h2>
<form action="" method="POST">
    <label>Förnamn:</label>
    <input type="text" name="firstname" required><br>
    
    <label>Efternamn:</label>
    <input type="text" name="lastname" required><br>
    
    <label>Födelsedatum:</label>
    <input type="date" name="birthday" required><br>
    
    <label>Telefon:</label>
    <input type="text" name="phone" required><br>
    
    <label>Email:</label>
    <input type="email" name="email" required><br>
    
    <input type="submit" value="Lägg till">
</form>

</body>
</html>