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
echo "<input checked=\"\" type=\"radio\" name=\"button\" value=\"button1\" id=\"button1\"> print all the memberIDs who have returned books<br>";
echo "<input type=\"radio\" name=\"button\" value=\"button2\" id=\"button2\" > print all the books which were returned<br>";
echo "<input type=\"radio\" name=\"button\" value=\"button3\" id=\"button3\" > print all the dates when books were returned<br>";
echo "<input type=\"radio\" name=\"button\" value=\"button4\" id=\"button4\" >print memberIDs who have returned books between date 2020-01-31 and 2020-02-28<br>";

echo "<input type=\"radio\" name=\"button\" value=\"button5\" id=\"button5\" >print all the books which are returned between 2020-01-31 and 2020-02-28 <br>";

echo "<input type=\"radio\" name=\"button\" value=\"button6\" id=\"button6\" >print all the dates between 2020-02-02 and 2020-02-04 when all the books where returned <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button7\" id=\"button7\" >print How many books were returned in year place a year or date in here ex: 2019<br>";
echo "<input type=\"radio\" name=\"button\" value=\"button8\" id=\"button8\" > Print the book having ISBNumber 100 which is returned by member of (ID: 710986)<br>";

echo "<input type=\"submit\" value=\"Submit\">";
echo "</form>";

$selected= $_POST['button'];

// print all the memberIDs who have returned books
if(isset($_POST['button'])) {

if($selected == "button1"){

echo "Printing all the memberIDs who have returned books ";

$sql = " SELECT MemberID FROM `Returned`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> MemberID</th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["MemberID"]. "</td> </tr>";

}

echo "</table>";

}

}

// print all the books which were returned

if($selected == "button2"){

echo "Printing all the books which were returned ";

$sql = " SELECT ISBNumber FROM `Returned`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr><th> ISBNumber </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["ISBNumber"]. "</td> </tr>";

}

echo "</table>";

}

}

// print all the dates when books were returned

if($selected == "button3"){

echo "Printing all the dates when books were returned ";
$sql = " SELECT returnDate FROM `Returned`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> returnDate </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["returnDate"]. "</td> </tr>";

}

echo "</table>";

}

}

// print memberIDs who have returned books between date 2020-01-31 and 2020-02-28
if($selected == "button4"){

echo "Printing memberIDs who have returned books between date 2020-01-31 and 2020-02-28";
$sql = " SELECT MemberID FROM `Returned` WHERE ReturnDate BETWEEN '2020-01-31' and '2020-02-28' ";
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

// print all the books which are returned between 2020-01-31 and 2020-02-28

if($selected == "button5"){

echo "Printing all the books which are returned between 2020-01-31 and 2020-02-28";
$sql = " SELECT ISBNumber FROM `Returned` WHERE ReturnDate BETWEEN '2020-01-31' and '2020-02-28' ";
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

// print all the dates between 2020-02-02 and 2020-02-04 when all the books where returned
if($selected == "button6"){

echo "Printing all the dates between 2020-02-02 and 2020-02-04 when all the books where returned ";
$sql = " SELECT ReturnDate FROM `Returned` WHERE ReturnDate BETWEEN '2020-02-02' and '2020-02-04'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> ReturnDate </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["ReturnDate"]. "</td> </tr>";

}

echo "</table>";

}

}

// print How many books were returned in year place a year or date in here ex: 2019
if($selected == "button7"){

echo "Printing How many books were returned in year place a year or date in here ex: 2019";
$sql = " SELECT COUNT(ISBNumber) FROM `Returned` WHERE ReturnDate BETWEEN '2020-02-04' AND '2020-12-08'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> COUNT(ISBNumber) </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["COUNT(ISBNumber)"]. "</td> </tr>";

}

echo "</table>";

}

}

// Print the book having ISBNumber 100 which is returned by member of (ID: 710986)

if($selected == "button8"){

echo "Printing the book having ISBNumber 100 which is returned by member of (ID: 710986)";

$sql = " SELECT ISBNumber, MemberID FROM `Returned` WHERE ISBNumber='100' AND MemberID = 710986";
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

 