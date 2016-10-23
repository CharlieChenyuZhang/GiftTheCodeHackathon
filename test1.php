<?php

/*MySQL Code*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
echo "<br>";

//Check if the Database Exists
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
//$sql = "CREATE DATABASE dbname";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully!";
  echo "<br>";
  $conn = new mysqli($servername, $username, $password, $dbname);
} else {
  echo "Error creating database: " . $conn->error;
}

// sql to create table
if ($conn->query($sql) === TRUE) {
  echo "Table Exists";
  echo "<br>";
} else {
   // create a new table
   $sql = "CREATE TABLE MyGuests (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   firstname VARCHAR(30) NOT NULL,
   lastname VARCHAR(30) NOT NULL,
   email VARCHAR(50),
   reg_date TIMESTAMP
   )";
}

// check again
if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully!";
  echo "<br>";
} else {
  echo "Error creating table: " . $conn->error;
  echo "<br>";
}
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully!";
  echo "<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Select Data from Table
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();

/*E-mail Code
  error_reporting(-1);
  ini_set('display_errors', 'On');

  $headers = array("From: from@example.com",
  "Reply-To: replyto@example.com",
  "X-Mailer: PHP/" . PHP_VERSION
  );
  $headers = implode("\r\n", $headers);
  $didhappen = mail('mtang.test@gmail.com', 'test', 'test', $headers);

   if($didhappen) {
      echo 'true';
   } else {
      echo 'false';
   }
*/
?>