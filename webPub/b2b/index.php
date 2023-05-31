<?php
// Configuration de la base de données
$servername = "10.0.0.3";  // Nom du conteneur de base de données
$username = "lecteur";  // Nom d'utilisateur MySQL
$password = "lecteurpassword";  // Mot de passe MySQL
$dbname = "woodytoys";  // Nom de la base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour récupérer les données de la table products
$sql = "SELECT nom, prix, qty FROM products";
$result = $conn->query($sql);

// Affichage des données dans une table HTML
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Nom</th><th>Prix</th><th>Quantité</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["nom"]."</td><td>".$row["prix"]."</td><td>".$row["qty"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Fermeture de la connexion
$conn->close();
?>
