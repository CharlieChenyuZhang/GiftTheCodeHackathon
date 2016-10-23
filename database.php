<?php

/*MySQL Code*/
$servername = "localhost";
$username = "root";
$password = "test";
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
 echo "<br>";
}

// sql to create Donor table
   $sql = "CREATE TABLE Raffles (
   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   RaffleName VARCHAR(30) NOT NULL,
   Sellers INT(11) NOT NULL,
   Buyers INT(11) NOT NULL,
   Start_Date DATE,
   End_Date DATE,
   Total_Amount DOUBLE,
   reg_date TIMESTAMP
   )";
if ($conn->query($sql) === TRUE) {
  echo "Raffles Table Created";
  echo "<br>";
} else {
 echo "Error creating table: " . $conn->error;
  echo "<br>";
}

// sql to create Admin table
   $sql = "CREATE TABLE Admin (
   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   Login VARCHAR(30) NOT NULL,
   Password VARCHAR(30) NOT NULL,
   reg_date TIMESTAMP
   )";
if ($conn->query($sql) === TRUE) {
  echo "Admin Table Created";
  echo "<br>";
} else {
 echo "Error creating table: " . $conn->error;
  echo "<br>";
}

// sql to create Donor table
   $sql = "CREATE TABLE Buyers (
   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   FirstName VARCHAR(30) NOT NULL,
   LastName VARCHAR(30) NOT NULL,
   Email VARCHAR(30) NOT NULL,
   Address1 VARCHAR(30),
   Address2 VARCHAR(30),
   City VARCHAR(30),
   Province VARCHAR(30),
   Postal_Code VARCHAR(30),
   Country VARCHAR(30),
   Phone VARCHAR(30),
   Email_Contact TINYINT(1),
   Post_Contact TINYINT(1),
   Sellers_ID INT(11),
   Donation TINYINT (1),
   Means_of_Payment TINYINT (1),
   reg_date TIMESTAMP
   )";
if ($conn->query($sql) === TRUE) {
  echo "Donor Table Created";
  echo "<br>";
} else {
 echo "Error creating table: " . $conn->error;
  echo "<br>";
}

// sql to create Seller table
   $sql = "CREATE TABLE Sellers (
   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   Email VARCHAR(30) NOT NULL,
   uid VARCHAR(30) NOT NULL,
   FirstName VARCHAR(30) NOT NULL,
   LastName VARCHAR(30) NOT NULL,
   Address1 VARCHAR(30),
   Address2 VARCHAR(30),
   City VARCHAR(30),
   Province VARCHAR(30),
   Postal_Code VARCHAR(30),
   Country VARCHAR(30),
   Phone VARCHAR(30),
   Invites_Sent INT(11),
   Email_Contact TINYINT(1),
   Post_Contact TINYINT(1),
   reg_date TIMESTAMP
   )";
if ($conn->query($sql) === TRUE) {
  echo "Buyer Table Created";
  echo "<br>";
} else {
   // create a new table
 echo "Error creating table: " . $conn->error;
 echo "<br>";
}

// sql to create Tickets table
   $sql = "CREATE TABLE Tickets (
   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   Seller_ID INT(11) NOT NULL,
   Buyer_ID INT(11) NOT NULL,
   Ticket_Type_ID TINYINT(1) NOT NULL,
   Confirmed TINYINT(1),
   Receipt TINYINT(1),
   reg_date TIMESTAMP
   )";
if ($conn->query($sql) === TRUE) {
  echo "Tickets Table Created";
  echo "<br>";
} else {
   // create a new table
 echo "Error creating table: " . $conn->error;
 echo "<br>";
 }

// sql to create Ticket_Type table
   $sql = "CREATE TABLE Ticket_Type (
   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   Price DOUBLE NOT NULL,
   reg_date TIMESTAMP
   )";

if ($conn->query($sql) === TRUE) {
  echo "Ticket_Type Table Created";
  echo "<br>";
} else {
   // create a new table
 echo "Error creating table: " . $conn->error;
 echo "<br>";
}

/*
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully!";
  echo "<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
*/

//Select Data from Table
/*
$sql = "SELECT id, firstname, lastname FROM Tickers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each rows
  while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
*/

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
