<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "devprox";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST["name"];
$surname = $_POST["surname"];
$idno = $_POST["idno"];
$dob = date("Y-m-d", strtotime($_POST["dob"]));

// Check if ID number already exists in the database
$sql = "SELECT * FROM people WHERE idno='$idno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // ID number already exists, inform user and repopulate form
  echo "ID number already exists in the database";
  // Repopulate form
} else {
  // ID number doesn't exist, insert new record into the database
  $sql = "INSERT INTO people (name, surname, idno, dob) VALUES ('$name', '$surname', '$idno', '$dob')";

  if ($conn->query($sql) === TRUE) {
    echo "Record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
