{source}

<?php

$servername = "localhost";
$username = "group2";
$password = "group2";

$dbname = "group2";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);

}

echo "<form method = \"POST\" action=\"\">";
echo "<input checked=\"\" type=\"radio\" name=\"button\" value=\"button1\" id=\"button1\"> print all ISBNumbers of books<br>";
echo "<input type=\"radio\" name=\"button\" value=\"button2\" id=\"button2\" > print all memberIDs who borrowed books <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button3\" id=\"button3\" > print dates on which books were borrowed <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button4\" id=\"button4\" >print memberIDs who have borrowed books between dates 2020-01-31 and 2020-02-28 <br>";

echo "<input type=\"radio\" name=\"button\" value=\"button5\" id=\"button5\" >print all the books which were borrowed between 2020-02-02 and 2020-02-04<br>";

echo "<input type=\"radio\" name=\"button\" value=\"button6\" id=\"button6\" >Print all the dates between 2020-02-03 and 2020-02-04 when books were borrowed. <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button7\" id=\"button7\" >print How many books were borrowed in year place a year or date in here ex: 2019<br>";
echo "<input type=\"radio\" name=\"button\" value=\"button8\" id=\"button8\" > Print the book having ISBNumber 101 which is borrowed by member of (ID: 710986)<br>";

echo "<input type=\"submit\" value=\"Submit\">";
echo "</form>";

$selected= $_POST['button'];

 

 

// To print all ISBNumbers of books

if(isset($_POST['button'])) {

if($selected == "button1"){

echo "Printing all ISBNumbers of books";

$sql = " SELECT ISBNumber FROM `Borrowed`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> ISBNumber </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["ISBNumber"]. "</td> </tr>";

}

echo "</table>";

}

}

// print all memberIDs who borrowed books

 

if($selected == "button2"){

echo "Printing all memberIDs who borrowed books";

$sql = " SELECT MemberID FROM `Borrowed`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr><th> MemberID </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["MemberID"]. "</td> </tr>";

}

echo "</table>";

}

}

// To print dates on which books were borrowed

 

if($selected == "button3"){

echo "Printing all the dates on which books were borrowed";

$sql = " SELECT BorrowedDate FROM `Borrowed`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> BorrowedDate </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["BorrowedDate"]. "</td> </tr>";

}

echo "</table>";

}

}

// To print memberIDs who have borrowed books between dates 2020-01-31 and 2020-02-28
if($selected == "button4"){

echo "Printing memberIDs who have borrowed books between dates 2020-01-31 and 2020-02-28";
$sql = " SELECT MemberID FROM `Borrowed` WHERE BorrowedDate BETWEEN '2020-01-31' and '2020-02-28'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> MemberID </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["MemberID"]. "</td> </tr>";

}

echo "</table>";

}

}

// To print all the books which were borrowed between 2020-02-02 and 2020-02-04


if($selected == "button5"){

echo "Printing all the books which were borrowed between 2020-02-02 and 2020-02-04";
$sql = " SELECT ISBNumber FROM `Borrowed` WHERE BorrowedDate BETWEEN '2020-02-02' and '2020-02-04' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> ISBNumber </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["ISBNumber"]. "</td> </tr>";

}

echo "</table>";

}

}

// To Print all the dates between 2020-02-03 and 2020-02-04 when books were borrowed.

if($selected == "button6"){

echo "Printing all the dates between 2020-02-03 and 2020-02-04 when books were borrowed.";
$sql = " SELECT BorrowedDate FROM `Borrowed` WHERE BorrowedDate BETWEEN '2020-02-02' and '2020-02-04' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> BorrowedDate </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["BorrowedDate"]. "</td> </tr>";

}

echo "</table>";

}

}

// To Print How many books were borrowed in year place a year or date in here ex: 2019
if($selected == "button7"){

echo "Printing How many books were borrowed in year place a year or date in here ex: 2019";
$sql = " SELECT COUNT(ISBNumber) FROM `Borrowed` WHERE BorrowedDate BETWEEN '2020-02-04' AND '2020-12-08'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> ISBNumber </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["COUNT(ISBNumber)"]. "</td> </tr>";

}

echo "</table>";

}

}

// Print the book having ISBNumber 101 which is borrowed by member of (ID: 710986)

if($selected == "button8"){

echo "Printing book having ISBNumber 101 which is borrowed by member of (ID: 710986)";

$sql = " SELECT ISBNumber, MemberID FROM `Borrowed` WHERE ISBNumber='101' AND MemberID = 710986";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> ISBNumber </th> <th> MemberID </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["ISBNumber"]. "</td><td>". $row["MemberID"]. "</td> </tr>";

}

echo "</table>";

}

}

}

$conn->close();

?>

{/source}
