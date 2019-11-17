<?php
$emailAddress = $_POST['email'];
$userpassword =$_POST['password'];

$servername="localhost";
$username = "root";
$password = "";
$dbname = "assignment3";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn-> connect_error){
    die("connect error" . $conn->connect_error);
}
if (!isset($emailAddress, $userpassword)){
    die('Please complete the login form!');
}

if(empty($emailAddress) || empty($userpassword)){
    die('Please complete the login form!');
}

echo $emailAddress;
$userpassword2 = null;

$sql="SELECT Password FROM users where EmailAddress = '{$emailAddress}'";
$result = $conn -> query($sql);

if($result-> num_rows > 0){
    $row = $result->fetch_assoc();
   $userpassword2 = $row["Password"];    
}

$conn->close();


if($userpassword == $userpassword2){
    header("location:welcome.html");
}else{
    header("location:logerr.html");
}


?>