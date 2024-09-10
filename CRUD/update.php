<?php
include 'db_connect.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "UPDATE members SET firstname = :firstname, lastname = :lastname, birthday = :birthday, phone = :phone, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':birthday' => $birthday,
        ':phone' => $phone,
        ':email' => $email,
        ':id' => $id
    ]);

    header('Location: index.php');
    exit;
}

$query = "SELECT * FROM members WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute([':id' => $id]);
$member = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Uppdatera Medlem</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>

<h2>Uppdatera medlem</h2>
<form action="" method="POST">
    <label>Förnamn:</label>
    <input type="text" name="firstname" value="<?php echo htmlspecialchars($member['firstname']); ?>" required><br>
    
    <label>Efternamn:</label>
    <input type="text" name="lastname" value="<?php echo htmlspecialchars($member['lastname']); ?>" required><br>
    
    <label>Födelsedatum:</label>
    <input type="date" name="birthday" value="<?php echo htmlspecialchars($member['birthday']); ?>" required><br>
    
    <label>Telefon:</label>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($member['phone']); ?>" required><br>
    
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($member['email']); ?>" required><br>
    
    <input type="submit" value="Uppdatera">
</form>

</body>
</html>