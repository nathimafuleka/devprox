
<?php
// Create two arrays
$names = array("Andre", "Tyron", "James", "Hall", "Rob", "Kate", "John", "Mike", "Bob", "Sandy", "Chris", "Sam", "Amy", "Alex", "Liz", "Michael", "Dave", "Rick", "Julie", "Karen"); 
$surnames = array("van Zuydam", "Smith", "Johnson", "Williams", "Brown", "Jones", "Miller", "Davis", "Garcia", "Rodriguez", "Wilson", "Martinez", "Anderson", "Taylor", "Thomas", "Hernandez", "Moore", "Martin", "Jackson", "Thompson"); 


function createCSV($num) {
  global $names;
  global $surnames;

  $csv = "Id,Name,Surname,Initials,Age,DateOfBirth\n";
  
  $records = array();
  $i = 0;
  
  while ($i < $num) {
    // Generate random name, age & birthdate
    $name = $names[rand(0, 19)];
    $surname = $surnames[rand(0, 19)];
    $initials = substr($name, 0, 1);
    $age = rand(18, 65);
    $date = date("d/m/Y", strtotime("-$age years"));

    // Check if record already exists
    $record = "$name $surname $age $date";
    if (!in_array($record, $records)) {
      // Add record to array
      array_push($records, $record);
      // Add row to csv
      $csv .= "\"$i\",\"$name\",\"$surname\",\"$initials\",\"$age\",\"$date\"\n";
      $i++;
    }
  }
  
  // Output csv
  $file = fopen("output.csv", "w");
  fwrite($file, $csv);
  fclose($file);

  echo "File generated";
}


if(isset($_POST['num_records'])) {
  $num_records = $_POST['num_records'];
  createCSV($num_records);
}
?>