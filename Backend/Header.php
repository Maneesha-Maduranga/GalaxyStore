<?php
session_start();

//Check If User session set or Not
if (!isset($_SESSION['username'])) {
  header('Location: ../login.php');
}

//Check The user is Admin or not
if ($_SESSION['usertype'] != 'admin') {
  header('Location: ../login.php');
}


?>



<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GalaxyStore | Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.43.2/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>
  <div class="flex flex-col justify-between h-screen">
    <div class="navbar bg-base-100">
      <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl">Galaxy Store</a>
      </div>
      <div class="flex-none">
        <form action="admin.php" method="POST">
          <ul class="menu menu-horizontal px-1">
            <li><a href="../index.php">View Site</a></li>
            <li><a href="./additem.php">Add Item</a></li>
            <li><a href="#">View Purchase Item</a></li>
            <li>

              <input type="submit" name="logout" class="btn btn-info" value="Log out">

            </li>
          </ul>
        </form>
      </div>
    </div>