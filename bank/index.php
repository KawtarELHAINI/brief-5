<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700&family=Kdam+Thmor+Pro&display=swap" rel="stylesheet">
    <title>CHbank</title>
</head>
<body>

   <header>

        <a href="index.php" class="logo"><img src="img/jpg.jpg" alt="" style="margin-left:10px ;margin-top:14px; width:80px; height: 65px"></a>
        <nav class="navigation">
            <a href="index.php">Home</a>
            <a href="clients.php">Clients</a>
            <a href="comptes.php">Comptes</a>
            <a href="transactions.php">Transactions</a>
        </nav>
    </header>
    <section>
        <div class="home">
          <span class="main">Welcome to K-bank</span>
        </div>
    </section>
    <footer>
      <p>&#169; copyright-k-bank</p>
    </footer>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chbank";

$cnx = new mysqli($servername, $username, $password, $dbname);


if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
}


$sqlClient = "INSERT INTO client (nom, prenom, dateNais, nationalite, genre)
VALUES ('Elhaini', 'Kawtar', '2006-01-08', 'Marocaine', 'Femme')";

if ($cnx->query($sqlClient) === TRUE) {
    $clientID = $cnx->insert_id;

    
    $sqlCompte = "INSERT INTO compte (balance, devise, rib, clientid)
    VALUES ('1000', '$', '123456789', $clientID)";

    if ($cnx->query($sqlCompte) === TRUE) {
        
        $sqlTransaction = "INSERT INTO transactions (montant, types, clientid)
        VALUES ('500', 'Credit', $clientID)";

        if ($cnx->query($sqlTransaction) === TRUE) {
            echo "Données insérées avec succès";
        } else {
            echo "Erreur d'insertion dans la table transactions: " . $cnx->error;
        }
    } else {
        echo "Erreur d'insertion dans la table compte: " . $cnx->error;
    }
} else {
    echo "Erreur d'insertion dans la table client: " . $cnx->error;
}


$cnx->close();
?>
