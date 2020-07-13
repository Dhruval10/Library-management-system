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
echo "<input type=\"radio\" name=\"button\" value=\"button1\" id=\"button1\"> Print details of member Mia Brooks <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button2\" id=\"button2\" > Print Member names with ID's <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button3\" id=\"button3\" > Print Members names registered by 20031 staff ID <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button4\" id=\"button4\"> No.of members whose validity is untill 2020-12-31 <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button5\" id=\"button5\" > No.of members taken care by 20031 staff ID <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button6\" id=\"button6\" >  Print Member ID & Name with registered Staffmember Name <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button7\" id=\"button7\" >  Print Member Name with registered Staff position <br>";
echo "<input type=\"submit\" value=\"Submit\">";
echo "</form>";

$selected= $_POST['button'];

 

//To print details of member Mia Brooks 

if(isset($_POST['button'])) {

   if($selected == "button1"){

       echo"Printing details of Mia Brooks";

        $sql = "SELECT * FROM `Members` WHERE Name='Mia Brooks'";
         $result = $conn->query($sql);

          if ($result->num_rows > 0) {
                  // output data of each row

                echo "<table border = \"1\">";

               echo "<tr> <th> MemberID </th> <th> Name </th> <th> MembershipType  </th> <th> Validity </th> <th> ContactNO </th> <th> Email </th> <th> StaffID </th> </tr>";

                 while($row = $result->fetch_assoc()) {

                            echo "<tr> <td>". $row["MemberID"]. "</td> <td> " . $row["Name"] . "</td> <td>  ". $row["MembershipType"]. "</td> <td> " . $row["Validity"] . "</td> <td> " . $row["ContactNO"] . "</td> <td> " . $row["Email"] . "</td> <td> " . $row["StaffID"] . "</td> </tr>";

                  }

                  echo "</table>";

           }

    }

 

// To Print Member names with ID's

if($selected == "button2"){

  echo "Printing Member names with ID's";

  $sql = "SELECT Name, MemberID FROM `Members`";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr> <th> Name </th> <th> MemberID </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["Name"]. "</td> <td>  ". $row["MemberID"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

 

 

//To Print Member names registered by staff ID 20031

if($selected == "button3"){

  echo "Printing members names registered by staff ID 20031";

  $sql = "SELECT Name FROM `Members` WHERE StaffID='20031'";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr><th> Name </th></tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["Name"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

 

 

//To Print No.of members whose validity is untill 2020-12-31

if($selected == "button4"){

  echo "Printing No.of members whose validity is untill 2020-12-31";

  $sql = "SELECT COUNT(Validity) FROM `Members` WHERE Validity BETWEEN '2020-02-20' AND '2020-12-31'";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr> <th> COUNT(Validity) </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["COUNT(Validity)"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

 

// To Print No.of Members taken care by Staff ID 20031

if($selected == "button5"){

  echo "Printing No.of Members taken care by Staff ID 20031";

  $sql = "SELECT COUNT(MemberID) FROM `Members` WHERE StaffID='20031'";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr> <th> COUNT(MemberID) </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["COUNT(MemberID)"]. "</td> </tr>";

         }

         echo "</table>";

     }

  }

 

//To Print Member ID & Name with staffmember Name

if($selected == "button6"){

  echo "Printing Member ID & Name with staffmember name";

  $sql = "SELECT Members.MemberID, Members.Name, StaffMembers.StaffName FROM `Members` INNER JOIN StaffMembers ON Members.StaffID=StaffMembers.StaffID";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr> <th> MemberID </th> <th> Name </th> <th> StaffName </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["MemberID"]. "</td> <td>". $row["Name"]. "</td> <td>". $row["StaffName"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

 

// To Print  Name with registered staff position

if($selected == "button7"){

  echo "Printing Member name with registered staff position";

  $sql = "SELECT Members.Name, StaffMembers.Position FROM `Members` INNER JOIN StaffMembers ON Members.StaffID=StaffMembers.StaffID";
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

       echo "<table border = \"1\">";

       echo "<tr> <th> Name </th> <th> Position </th> </tr>";

       while($row = $result->fetch_assoc()) {

             echo "<tr> <td>". $row["Name"]. "</td> <td>". $row["Position"]. "</td> </tr>";

         }

         echo "</table>";

     }

}

}

$conn->close();

?>

{/source}