<html>
<body style=" background-color:#F39C12 ;
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

    <style>
        button a{
           text-decoration:none;
   

        }
    </style>

<div class="box">
<form action="new_png.php" method="post">
    <h2 style="background-color:black;width:100%;text-align:center;color:white;padding:5px">Enter Passenger Details</h2>

<?php 

session_start();

require "db.php";

if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 

$mobile=$_POST["mno"];
$pwd=$_POST["password"];

$query = mysqli_query($conn,"SELECT * FROM user WHERE user.mobileno=$mobile AND user.password='".$pwd."' ") or die(mysql_error());
if(mysqli_num_rows($query) == 0)
{
 echo "No such login !!! <br> ";
 echo " <br><a href=\"http://localhost/railway/enquiry_result.php\">Go Back!!!</a> <br>";
 die();
}

$row = mysqli_fetch_array($query);
$temp=$row['id'];
//echo $temp;
//echo $_SESSION["doj"];
$_SESSION["id"] = "$temp";
$tno=$_POST["tno"];
$_SESSION["tno"] = "$tno";
$class=$_POST["class"];
$_SESSION["class"] = "$class";
$nos=$_POST["nos"];
$_SESSION["nos"] = "$nos";

echo "<table>";

for($i=0;$i<$nos;$i++) 
{
echo "<tr><td><input type='text' name='pname[]' placeholder=\"Passenger Name\" required></td><br><br> ";
echo "<td><input type='text' name='page[]' placeholder=\"Passenger Age\" required></td><br><br>";
echo "<td><input type='text' name='pgender[]' placeholder=\"Passenger Gender\" required></td></tr><br><br> ";
}

echo "</table>";

//Enter Train No: <input type="text" name="tno" required><br>
//Enter Class: <input type="text" name="class" required><br>

echo "<button><a href=\"http://localhost/railway/enquiry.php\">Back to Enquiry</a></button>";

$conn->close(); 

?>
</div>

<br><br><input type="submit" value="Book">

</body>
</html>
