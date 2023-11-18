
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
    <!-- <h1>Clients</h1> -->

    <table >
        <thead>
            <tr >
                <th>ID</th>
                <th>Montant</th>
                <th>Type</th>
                <th>Client ID</th>
               
            </tr>
<?php
$sql = "SELECT id, montant, types, clientid FROM transactions";
$result = $cnx->query($sql);
if (isset($_GET['trans']))
{
    $id = $_GET['trans'];
    $sql = "SELECT * FROM transactions WHERE clientid = $id";
    $result = $cnx->query($sql);
}
if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>" . $row["id"]. " </td>
    <td> " . $row["montant"]. "</td>
    <td> " . $row["types"]. " </td>
    <td> " . $row["clientid"]. "</td>

    </tr>
    </tr><br>";  
 }
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


