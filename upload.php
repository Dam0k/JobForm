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
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $message = $_POST["message"];
    $gender = $_POST["gender"];
    $terms = isset($_POST["terms"]) ? 1 : 0;

    $file_path = "";
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = __DIR__ . "/uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        $file_path = $target_file;
    }

    $sql = "INSERT INTO responses (fname, lname, email, phone, address, dob, message, gender, file_path, terms)
            VALUES ('$fname', '$lname', '$email', '$phone', '$address', '$dob', '$message', '$gender', '$file_path', $terms)";

    if ($conn->query($sql) === TRUE) {
        echo "Data byla úspěšně uložena.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
