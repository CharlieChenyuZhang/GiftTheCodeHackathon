<?php
function countTicketsDB($conn, $seller_id){
$sql = "SELECT COUNT(*) as NumberOfOrders FROM Tickets Where Tickets.Seller_ID=$seller_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
return $row['NumberOfOrders'];
}

function countConfirmedTicketsDB($conn, $seller_id){
$sql = "SELECT COUNT(*) as NumberOfOrders FROM Tickets WHERE Tickets.Confirmed=1 AND Tickets.Seller_ID = $seller_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
return $row['NumberOfOrders'];
}

function totalValueSold($conn, $seller_id){
$sql = "select sum(price) as Totals from (Ticket_Type INNER JOIN Tickets ON 
Tickets.Ticket_Type_ID=Ticket_Type.id and Tickets.seller_id = $seller_id)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
return $row['Totals'];
}

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
echo "Connected successfully! <br>";

$sql = "SELECT * FROM Sellers";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each rows
  while($row = $result->fetch_assoc()) {
	  $TotalTickets = countTicketsDB($conn, $row["id"]);
	  $TotalConfirmedTickets = countConfirmedTicketsDB($conn, $row["id"]);
	  $TotalValueSold = totalValueSold($conn, $row["id"]);

      echo $row["FirstName"] . " " . $row["LastName"] . " " . $row["Email"] . " " . $row["Invites_Sent"] . 
       " " . '$TotalTickets' . " " . '$TotalConfirmedTickets' . " " . '$TotalValueSold' . " " .
      $row["Address1"] . " " . $row["Address2"] . " " . $row["City"] . " " . $row["Province"] . " " . 
      $row["Postal_Code"] . " " . $row["Phone"] . " " . $row["Email_Contact"]. " " . $row["Post_Contact"] . "<br>";
  }
} else {
  echo "0 results";
}
?>