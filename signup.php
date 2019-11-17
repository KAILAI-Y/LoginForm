<?php
$firstName = $_POST['firstname'];
$lastName =$_POST['lastname'];
$userName =$_POST['username'];
$emailAddress =$_POST['email'];
$password1 =$_POST['setpassword'];
$password2 =$_POST['setpassword2'];
$active = 1;
$date = Date('Y-m-d');

$servername="localhost";
$username = "root";
$password = "";
$dbname = "assignment3";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn-> connect_error){
    die("connect error" . $conn->connect_error);
}


if(empty($firstName) || empty($lastName) || empty($userName) || empty($emailAddress) ||empty($password1) ||empty($password2)){
    die('Please complete the registration form!');
}

if($password2 !== $password1){
    die('Please insert same password!');
}


$sql="INSERT INTO users".
        "(FirstName, LastName, UserName, EmailAddress, Password, Active, MemberSince)".
        "VALUES ".
        "('$firstName', '$lastName', '$userName', '$emailAddress', '$password1', '$active', '$date' )";


mysqli_select_db($conn, 'users');
$resultA = $conn -> query($sql);
if(!$resultA ){
    die('Error:(' . mysqli_error($conn));
}
header("location:welcome.html");
mysqli_close($conn);
?>
