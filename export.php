<?php
/*MySQL Code*/
$servername = "localhost";
$username = "root";
$password = "test";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
echo "<br>";

$sql = "SELECT * FROM Buyers
INTO OUTFILE 'C:\Documents and Settings\All Users\Application Data\Buyers.csv'
FIELDS ESCAPED BY ','
TERMINATED BY ','
ENCLOSED BY '\"'
LINES TERMINATED BY '\r\n';
";
$result = $conn->query($sql);
echo "Outputted Buyers <br>";

header('Location: secondharvestdash.html');
?>
