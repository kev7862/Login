<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
   ?>

   <!DOCTYPE html>
   <!DOCTYPE html>
   <html lang="en" dir="ltr">
     <head>
       <meta charset="utf-8">
       <title>Home</title>
     </head>
     <body>
       <h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
       <a href="logout.php">Logout</a>

     </body>
   </html>
<?php
}

else {
  header("Location: index.php");
  exit();
}
?>
