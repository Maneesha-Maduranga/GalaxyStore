<?php
session_start();

$name = '';

//To Display username in the Navbar
if (isset($_SESSION["username"])) {
  $name = $_SESSION["username"];
  
}
//echo  $_SESSION['usertype'];

?>



<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GalaxyStore</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.43.2/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>
  <div class="flex flex-col justify-between h-screen">
    <div class="navbar bg-base-100">
      <div class="navbar-start">
        <div class="dropdown">
          <label tabindex="0" class="btn btn-ghost btn-circle">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
          </label>
          <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          <form action="index.php" method="POST">
            <li><a href="cart.php">View Cart</a></li>
            <li><input type="submit" value="Logout" name="Logout" class="btn btn-info px-2"></li>
          </form>
          </ul>
        </div>
      </div>
      <div class="navbar-center">
        <a class="btn btn-ghost normal-case text-xl" href="index.php">Galaxy Store<img src="https://cdn-icons-png.flaticon.com/512/2991/2991473.png" alt="" class="px-2 w-12"></a>
      </div>
      <div class="navbar-end">

        <div class="px-2">
          <h3 >
            <?php
              if(!(isset($_SESSION["Logout"]))){
                echo "Welcome ".$name;
              }
              else{
                echo "Welcome";
              }

          ?>
          </h3>
        </div>
       
      </div>
    </div>