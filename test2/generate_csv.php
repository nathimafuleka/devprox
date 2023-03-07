<?php
// Create arrays of names and surnames
$names = array("Andre", "Tyron", "James", "Hall", "Rob", "Kate", "John", "Mike", "Bob", "Sandy", "Chris", "Sam", "Amy", "Alex", "Liz", "Michael", "Dave", "Rick", "Julie", "Karen"); 
$surnames = array("van Zuydam", "Smith", "Johnson", "Williams", "Brown", "Jones", "Miller", "Davis", "Garcia", "Rodriguez", "Wilson", "Martinez", "Anderson", "Taylor", "Thomas", "Hernandez", "Moore", "Martin", "Jackson", "Thompson"); 

function createCSV($num) {
  global $names;
  global $surnames;

  // Create the CSV file and write the header
  $file = fopen("output.csv", "w");
  fwrite($file, "Id,Name,Surname,Initials,Age,DateOfBirth\n");

  // Generate the records and write them to the file
  for ($i = 0; $i < $num; $i++) {
    // Generate random name, age & birthdate
    $name = $names[array_rand($names)];
    $surname = $surnames[array_rand($surnames)];
    $initials = substr($name, 0, 1);
    $age = rand(18, 65);
    $date = date("d/m/Y", strtotime("-$age years"));

    // Write the record to the file
    fwrite($file, "\"$i\",\"$name\",\"$surname\",\"$initials\",\"$age\",\"$date\"\n");
  }
  
  // Close the file
  fclose($file);

  echo "File generated";
}

if(isset($_POST['num_records'])) {
  $num_records = $_POST['num_records'];
  createCSV($num_records);
}
?>
