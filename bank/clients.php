<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>kbank</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chbank";

$cnx = new mysqli($servername, $username, $password, $dbname);
if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
}

$sql = "SELECT id, nom, prenom, dateNais, nationalite, genre FROM client";
$result = $cnx->query($sql);

?>

<header>
<a href="index.php" class="logo"><img src="img/jpg.jpg" alt="" style="margin-left:10px ;margin-top:14px; width:80px; height: 65px"></a>
    <nav class="navigation">
        <a href="index.php">Home</a>
        <a href="clients.php">Clients</a>
        <a href="comptes.php">Comptes</a>
        <a href="transactions.php">Transactions</a>
    </nav>
</header>

<section class="tabclient">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Nationalité</th>
                <th>Genre</th>
                <th>Comptes</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nom']}</td>
                        <td>{$row['prenom']}</td>
                        <td>{$row['dateNais']}</td>
                        <td>{$row['nationalite']}</td>
                        <td>{$row['genre']}</td>
                        <td><a href='comptes.php?comp={$row['id']}'>Afficher les comptes</a></td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Aucun client trouvé.</td></tr>";
            }
            $cnx->close();
            ?>
        </tbody>
    </table>
</section>

<footer>
      <p>&#169; copyright-k-bank</p>
    </footer>
</body>
</html>
