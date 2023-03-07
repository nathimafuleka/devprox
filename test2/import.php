<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "devprox2";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error() . "<br />\n");
}

// Create table
$sql = "CREATE TABLE csv_import (
    Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(30) NOT NULL,
    Surname VARCHAR(30) NOT NULL,
    Initials CHAR(1) NOT NULL,
    Age INT(3) UNSIGNED NOT NULL,
    DateOfBirth DATE NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table csv_import created successfully<br />\n";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br />\n";
}

  // Check if the file was uploaded without errors
    if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        // Validate the file type and size
        $file_name = $_FILES["file"]["name"];
        $file_size = $_FILES["file"]["size"];
        $file_tmp = $_FILES["file"]["tmp_name"];
        $file_type = $_FILES["file"]["type"];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $valid_extensions = array("csv");
        $max_size = 10 * 1024 * 1024; // 10 MB

        if(in_array($file_ext, $valid_extensions) && $file_size <= $max_size) {
            // Open the file for reading
            $handle = fopen($file_tmp, "r");

            // Prepare the insert statement
            $stmt = mysqli_prepare($conn, "INSERT INTO csv_import (Id, Name, Surname, Initials, Age, DateOfBirth) VALUES (?, ?, ?, ?, ?, ?)");

            // Loop through the file and insert the data into the database
            while(($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $id = $data[0];
                $name = $data[1];
                $surname = $data[2];
                $initials = $data[3];
                $age = $data[4];
                $dob = date("Y-m-d", strtotime($data[5]));

                mysqli_stmt_bind_param($stmt, "isssis", $id, $name, $surname, $initials, $age, $dob);
                mysqli_stmt_execute($stmt);
            }

            // Close the file and the statement
            fclose($handle);
            mysqli_stmt_close($stmt);

            echo "Data imported successfully<br />\n";
        } else {
            echo "Error uploading file: invalid file type or size<br />\n";
        }
    } else {
        echo "Error uploading file: " . $_FILES["file"]["error"] . "<br />\n";
    }

// Count number of records imported
$sql = "SELECT COUNT(*) FROM csv_import";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$num_records = $row[0];

echo "Number of records imported: " . $num_records . "<br />\n";

mysqli_close($conn);
?>
