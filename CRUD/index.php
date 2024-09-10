<?php
include 'db_connect.php';

$query = "SELECT * FROM members ORDER BY firstname";
$stmt = $pdo->prepare($query);
$stmt->execute();
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Members List</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>

<h2>Medlemslista</h2>
<a href="create.php">Lägg till ny medlem</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Förnamn</th>
            <th>Efternamn</th>
            <th>Födelsedatum</th>
            <th>Telefon</th>
            <th>Email</th>
            <th>Åtgärder</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($members as $member): ?>
            <tr>
                <td><?php echo htmlspecialchars($member['id']); ?></td>
                <td><?php echo htmlspecialchars($member['firstname']); ?></td>
                <td><?php echo htmlspecialchars($member['lastname']); ?></td>
                <td><?php echo htmlspecialchars($member['birthday']); ?></td>
                <td><?php echo htmlspecialchars($member['phone']); ?></td>
                <td><?php echo htmlspecialchars($member['email']); ?></td>
                <td>
                    <a href="update.php?id=<?php echo $member['id']; ?>">Uppdatera</a> |
                    <a href="delete.php?id=<?php echo $member['id']; ?>" onclick="return confirm('Är du säker på att du vill radera?');">Radera</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>