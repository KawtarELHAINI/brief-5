<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <title>kbank</title>
</head>

<body>

<!-- <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chbank";


$creerdb = "create database if not exists kbank" ;


$cnx = new mysqli($servername, $username, $password,$dbname);
?> -->
<header>
<a href="index.php" class="logo"><img src="img/jpg.jpg" alt="" style="margin-left:10px ;margin-top:14px; width:80px; height: 65px"></a>
        <nav class="navigation">
        <a href="index.php">Home</a>
            <a href="clients.php">Clients</a>
            <a href="comptes.php">Comptes</a>
            <a href="transactions.php">Transactions</a>
        </nav>
    </header>
    
<section class ="tabclient">
   <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Balance</th>
                <th>Devise</th>
                <th>RIB</th>
                <th>Client ID</th>
                <th>Afficher les transitions</th>
            </tr>
<?php
$sql = "SELECT id, balance, devise, rib, clientid FROM compte";
$result = $cnx->query($sql);

if (isset($_GET['comp']))
{
    $id = $_GET['comp'];
    $sql = "SELECT * FROM compte WHERE clientid = $id";
    $result = $cnx->query($sql);
}

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>" . $row["id"]. " </td>
    <td> " . $row["balance"]. "</td>
    <td> " . $row["devise"]. " </td>
    <td>" . $row["rib"]. "</td>
    <td> " . $row["clientid"]. "</td>
    <td> <a href='transactions.php?trans=" . $row['clientid'] . "'>Afficher les transactions</a> </td>
    </tr><br>";  }
} else {
 /* echo "0 results";*/
}

$cnx->close();
?>

     </thead>
        
           
    </table>
   
</section>
<footer>
      <p>&#169; copyright-k-bank</p>
    </footer>

</body>
</html>
