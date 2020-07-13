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
echo "<input checked=\"\" type=\"radio\" name=\"button\" value=\"button1\" id=\"button1\"> print all the books that authors have written<br>";
echo "<input type=\"radio\" name=\"button\" value=\"button2\" id=\"button2\" > print all the authorIDs who have written books<br>";
echo "<input type=\"radio\" name=\"button\" value=\"button3\" id=\"button3\" > Print all the books whose author have authorID=1000<br>";
echo "<input type=\"radio\" name=\"button\" value=\"button4\" id=\"button4\" >Print all the book written by authors with BookID=100<br>";


echo "<input type=\"submit\" value=\"Submit\">";
echo "</form>";

$selected= $_POST['button'];

// print all the books that authors have written

if(isset($_POST['button'])) {

if($selected == "button1"){

echo "Printing all the books that authors have written ";

$sql = " SELECT BookID FROM `WrittenBy`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> BookID</th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["BookID"]. "</td> </tr>";

}

echo "</table>";

}

}

// print all the authorIDs who have written books
if($selected == "button2"){

echo "Printing all the authorIDs who have written books";

$sql = " SELECT authorID FROM `WrittenBy`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr><th> authorID </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["authorID"]. "</td> </tr>";

}

echo "</table>";

}

}

// Print all the books whose author have authorID=1000

if($selected == "button3"){

echo "Printing all the books whose author have authorID=1000";
$sql = " SELECT BookID FROM `WrittenBy` WHERE AuthorID=1000";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> BookID </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["BookID"]. "</td> </tr>";

}

echo "</table>";

}

}

// Print all the book written by authors with BookID=100

if($selected == "button4"){

echo "Printing all the book written by authors with BookID=100";
$sql = " SELECT AuthorID, BookID FROM `WrittenBy` WHERE BookID='100'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

echo "<table border = \"1\">";

echo "<tr> <th> authorID </th> <th> bookID </th> </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr> <td>". $row["AuthorID"]. "</td> <td>". $row["BookID"]. "</td> </tr>";

}

echo "</table>";

}

}


}

$conn->close();

?>

{/source}

 