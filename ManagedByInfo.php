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
echo "<input type=\"radio\" name=\"button\" value=\"button1\" id=\"button1\"> Print books managed by staff with names <br>";

echo "<input type=\"radio\" name=\"button\" value=\"button2\" id=\"button2\" > Print book title with ID <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button3\" id=\"button3\" > Print book title with managing staff name <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button4\" id=\"button4\" > Print No.of books managed by Staff ID 20033 <br>";
echo "<input type=\"submit\" value=\"Submit\">";
echo "</form>";

$selected= $_POST['button'];

 

// To print books managed by staff with names

 

if(isset($_POST['button'])) {

   if($selected == "button1"){

       echo"Printing books managed by staff with names";

        $sql = "SELECT ManagedBy.ISBNumber, StaffMembers.StaffName FROM `ManagedBy` INNER JOIN StaffMembers ON ManagedBy.StaffID=StaffMembers.StaffID";
         $result = $conn->query($sql);

          if ($result->num_rows > 0) {
                  // output data of each row

                echo "<table border = \"1\">";

               echo "<tr> <th> ISBNumber </th> <th>  StaffName </th>  </tr>";

                 while($row = $result->fetch_assoc()) {

                            echo "<tr> <td>". $row["ISBNumber"]. "</td> <td>  ". $row["StaffName"]. "</td> </tr>";

                  }

                  echo "</table>";

           }

    }

 

// To Print Book title with ID's

if($selected == "button2"){

  echo "Printing Book title with ID's";

  $sql = "SELECT ManagedBy.ISBNumber, Books.Title FROM `ManagedBy` INNER JOIN Books ON ManagedBy.ISBNumber=Books.ISBNumber";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> ISBNumber </th> <th> Title </th></tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["ISBNumber"]. "</td> <td>  ". $row["Title"]. "</td></tr>";

         }

         echo "</table>";

     }

}

  

 

// To Print Book title with managing staff name

if($selected == "button3"){

  echo "Printing Book title with managing staff name";

  $sql = "SELECT Books.Title, StaffMembers.StaffName FROM `ManagedBy` INNER JOIN Books ON ManagedBy.ISBNumber=Books.ISBNumber JOIN StaffMembers ON ManagedBy.StaffID=StaffMembers.StaffID";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> Title </th> <th> StaffName </th></tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["Title"]. "</td> <td>  ". $row["StaffName"]. "</td></tr>";

         }

         echo "</table>";

     }

}

 

//To Print No.of books managed by staff ID 20033

if($selected == "button4"){

  echo "Printing No.of books managed by staff ID 20033";

  $sql = "SELECT COUNT(ISBNumber)  FROM `ManagedBy` WHERE StaffID='20033'";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> COUNT(ISBNumber) </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["COUNT(ISBNumber)"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

}

$conn->close();

?>

{/source}