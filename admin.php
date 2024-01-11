<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "admin") {
        echo "Přihlášení úspěšné!";
    } else {
        echo "Neplatné uživatelské jméno nebo heslo.";
    }
}

$sql_select = "SELECT * FROM responses";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    echo "<h2>Všechny odpovědi:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "Jméno: " . $row["fname"] . " " . $row["lname"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Telefon: " . $row["phone"] . "<br>";
        echo "Adresa: " . $row["address"] . "<br>";
        echo "Datum narození: " . $row["dob"] . "<br>";
        echo "Zpráva: " . $row["message"] . "<br>";
        echo "Pohlaví: " . $row["gender"] . "<br>";
        echo "Soubor: <a href='" . $row["file_path"] . "' target='_blank'>Otevřít soubor</a><br>";
        echo "Souhlas s podmínkami: " . ($row["terms"] ? "Ano" : "Ne") . "<br>";
        echo "Vytvořeno: " . $row["created_at"] . "<br>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "Žádné odpovědi nebyly nalezeny.";
}

$conn->close();
?>