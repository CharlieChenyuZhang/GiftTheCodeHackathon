<?php
//Calculate Number of Tickets, Pass a connection
function countTicketsDB($conn){
$sql = "SELECT COUNT(*) as NumberOfOrders FROM Tickets";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "Total Tickets: " . $row['NumberOfOrders'];
}

//Calculate Number of Buyer for a given seller
function countBuyersDB($conn,$seller_id){
$sql = "SELECT COUNT(*) as NumberOfBuyers FROM Buyers where Buyers.Sellers_ID='$seller_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "Total Tickets: " . $row['NumberOfBuyers'];
}

function countSellersDB($conn,$seller_id){
$sql = "SELECT COUNT(*) as NumberOfSellers FROM Sellers";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "Total Tickets: " . $row['NumberOfSellers'];
}

function totalValueSold($conn){
$sql = "select sum(price) as Totals from (Ticket_Type INNER JOIN Tickets ON Tickets.Ticket_Type_ID=Ticket_Type.id)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "Total Tickets: " . $row['Totals'];
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
echo "Connected successfully!";
echo "<br>";

countTicketsDB($conn);
countBuyersDB($conn, 2);
countSellersDB($conn, 2);
totalValueSold($conn);

$conn->close();
?>