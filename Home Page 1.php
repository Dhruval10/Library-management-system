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

 

echo "<table>";

echo " <td> <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/author';\" value=\"Author\"/></button> </td>";

echo " <td> <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/books';\" value=\"Books\"/></button> </td>";

echo " <td> <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/table';\" value=\"Borrowed\"/></button> </td>";

echo " <td> <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/managedby';\" value=\"ManagedBy\"/></button> </td>";

echo " <td> <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/members';\" value=\"Members\"/></button> </td>";

echo " <td> <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/publication';\" value=\"Publication\"/></button> </td>";

echo " <td> <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/returned';\" value=\"Returned\"/></button> </td>";

echo " <td> <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/staffmembers';\" value=\"StaffMembers\"/></button> </td>";

echo " <td> <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/written-by';\" value=\"WrittenBy\"/></button> </td>";

echo "</table>";

 

echo "Catagory <br>";

 

echo "<form method = \"POST\" action=\"\">";
echo "<input type=\"radio\" name=\"button\" value=\"button1\" id=\"button1\"> Information about Author<br>";
echo "<input type=\"radio\" name=\"button\" value=\"button2\" id=\"button2\" > Information about Books <br>";
echo "<input type=\"radio\" name=\"button\" value=\"button3\" id=\"button3\" > Information about Borrowed<br>";
echo "<input type=\"radio\" name=\"button\" value=\"button4\" id=\"button4\"> Information about ManagedBy<br>";
echo "<input type=\"radio\" name=\"button\" value=\"button5\" id=\"button5\" > Information about Members<br>";

echo "<input type=\"radio\" name=\"button\" value=\"button6\" id=\"button6\" > Information about Publication <br>";

echo "<input type=\"radio\" name=\"button\" value=\"button7\" id=\"button7\" > Information about Returned<br>";

echo "<input type=\"radio\" name=\"button\" value=\"button8\" id=\"button8\" > Information about Staff Members <br>";

echo "<input type=\"radio\" name=\"button\" value=\"button9\" id=\"button9\" > Information about WrittenBy<br>";

 


echo "<input type=\"submit\" value=\"Submit\">";
echo "</form>";

$selected= $_POST['button'];

 

if(isset($_POST['button'])) {

if($selected == "button1"){

//echo " <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/home/newtable/authoninfo';\" value=\"AuthorInfo\"> </button> ";

header("Location: https://cs643.cs.csusm.edu/group2/index.php/home/newtable/authoninfo"); 
exit();

}

if($selected == "button2"){

//echo " <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/home/newtable/booksnew';\" value=\"BooksInfo\"> </button> ";

header("Location: https://cs643.cs.csusm.edu/group2/index.php/home/newtable/booksnew"); 
exit();

}

if($selected == "button3"){

//echo " <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/home/newtable/borrowedinfo';\" value=\"BorrowedInfo\"> </button> ";

header("Location: https://cs643.cs.csusm.edu/group2/index.php/home/newtable/borrowedinfo"); 
exit();

}

if($selected == "button4"){

//echo " <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/home/newtable/managedbyinfo';\" value=\"ManagedBy\"> </button> ";

header("Location: https://cs643.cs.csusm.edu/group2/index.php/home/newtable/managedbyinfo"); 
exit();

}

if($selected == "button5"){

//echo " <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/home/newtable/membersinfo';\" value=\"MembersInfo\"> </button> ";

header("Location: https://cs643.cs.csusm.edu/group2/index.php/home/newtable/membersinfo"); 
exit();

}

if($selected == "button6"){

//echo " <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/home/newtable/publicationinfo';\" value=\"PublicationInfo\"> </button> ";

header("Location: https://cs643.cs.csusm.edu/group2/index.php/home/newtable/publicationinfo"); 
exit();

}

if($selected == "button7"){

//echo " <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/home/newtable/returnedinfo';\" value=\"ReturnedInfo\"> </button> ";

header("Location: https://cs643.cs.csusm.edu/group2/index.php/home/newtable/returnedinfo"); 
exit();

}

if($selected == "button8"){

//echo " <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/home/newtable/staffmembersinfo';\" value=\"StaffMembersInfo\"> </button> ";

header("Location: https://cs643.cs.csusm.edu/group2/index.php/home/newtable/staffmembersinfo"); 
exit();

}

if($selected == "button9"){

//echo " <input type=\"button\" onclick=\"window.location.href = 'https://cs643.cs.csusm.edu/group2/index.php/home/newtable/writtenbyinfo';\" value=\"WrittenByInfo\"> </button> ";

header("Location: https://cs643.cs.csusm.edu/group2/index.php/home/newtable/writtenbyinfo"); 
exit();

}

 

}

 

$conn->close();

?>

{/source}