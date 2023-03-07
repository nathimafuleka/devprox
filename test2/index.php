<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="post" action="generate_csv.php">
    <label for="num_records">Number of records:</label>
    <input type="number" name="num_records" min="1" max="1000000">
    <input type="submit" value="Generate CSV">
</form>
</body>
</html>