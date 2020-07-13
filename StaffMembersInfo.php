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
echo "<input type=\"radio\" name=\"button\" value=\"button1\" id=\"button1\"> To print details of Staffmember Rachel Roy <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button2\" id=\"button2\" > Print No.of staffmembers whose Workinghours are 8 <br>";
echo "<input type=\"submit\" value=\"Submit\">";
echo "</form>";

$selected= $_POST['button'];

 

// To print details of Staffmember Rachel Roy

 

if(isset($_POST['button'])) {

   if($selected == "button1"){

       echo"Printing Rachel Roy details";

        $sql = "SELECT * FROM `StaffMembers` WHERE StaffName='Rachel Roy'";
         $result = $conn->query($sql);

          if ($result->num_rows > 0) {
                  // output data of each row

                echo "<table border = \"1\">";

               echo "<tr> <th> StaffID </th> <th> StaffName </th> <th> Position  </th> <th> Workinghours </th> </tr>";

                 while($row = $result->fetch_assoc()) {

                            echo "<tr> <td>". $row["StaffID"]. "</td> <td>  ". $row["StaffName"]. "</td> <td> " . $row["Position"] . "</td> <td>  ". $row["Workinghours"]. "</td> </tr>";

                  }

                  echo "</table>";

           }

    }

 

//To Print No.of Staffmembers whose Workinghours are 8

if($selected == "button2"){

  echo "Printing No.of Staffmembers whose Workinghours are 8";

  $sql = "SELECT COUNT(StaffID)  FROM `StaffMembers` WHERE Workinghours='8'";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> COUNT(StaffID) </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["COUNT(StaffID)"]. "</td> </tr>";

         }

         echo "</table>";

     }

} 

}

$conn->close();

?>

{/source}