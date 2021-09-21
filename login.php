
<?php

//connecting the login page with db page
session_start();
include "db_connect.php";

//validating data entered in the form
if (isset($_post['uname']) && isset($_post['password'])) {
  function validate($data){
    $data = trim($data);
    $data= stripslashes($data);
    $data = htmlspecialchar($data);

    return data;
  }
}

//Creating variables for username and password
$uname = validate($_post['uname']);
$password = validate($_post['password']);

//checking if the input field is empty
if (empty($uname)) {
  header("Location: index.php?erro=Username is required");
  exit();
}

//Checking if the password field is empty
elseif (empty($password)) {
   header("Location: index.php?erro=Password is required");
   exit();
}

//Importing Data from Database
$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_row($result) === 1) {
  $row = mysqli_fetch_assoc($result);
  if ($row['user_name'] === $uname && $row['password'] === $password) {
    echo "Login Successful";
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['id'] = $row['id'];

    header("Location: home.php");
    exit();

  }

  else {
    header("Location: index.php?error=Incorrect Username or Password");
    exit();
  }
}
else {
  header("Location: index.php");
  exit();
}


 ?>
