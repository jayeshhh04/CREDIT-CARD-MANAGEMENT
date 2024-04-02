<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "creditcard";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Separate the form data
$holderInfo = array(
    'card-holder' => $_POST['card-holder'],
    'card-number' => $_POST['card-number'],
    'expiry-date' => $_POST['expiry-date'],
    'cvv' => $_POST['cvv']
);


// Insert into personal_info table
$sql_holder = "INSERT INTO information (card_holder, card_number, expiry_date, cvv)
        VALUES ('" . $holderInfo['card-holder'] . "', '" . $holderInfo['card-number'] . "', '" . $holderInfo['expiry-date'] . "', '" . $holderInfo['cvv'] . "')";

if ($conn->query($sql_holder) === TRUE) {
    echo "Personal information stored successfully<br>";
} else {
    echo "Error: " . $sql_holder . "<br>" . $conn->error;
}


$conn->close();
?>