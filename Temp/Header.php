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
<div class="flex flex-col h-screen justify-between">
<header class="header sticky top-0 bg-white shadow-md flex items-center justify-between px-8 py-02 mb-6">
    <!-- logo -->
    <h1 class="w-3/12">
        <a href="/Shop/index.php" class="flex gap-5">
          <img src="https://cdn-icons-png.flaticon.com/512/3594/3594083.png" alt="Logo" class="h-10 w-10 hover:text-green-500 duration-200">
          <p class="text-4xl font-bold tracking-tight hover:text-green-500 duration-200">GalaxyStore </p>
        </a>
    </h1>

    <!-- navigation -->
    <nav class="nav font-semibold text-lg">
        <ul class="flex items-center">
            <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer active">
              <a href="/Shop/index.php">Home</a>
            </li>
            <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
              <a href="">Orders</a>
            </li>
            <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
              <a href="">Contact</a>
            </li>
        </ul>
    </nav>

    <!-- buttons --->
    <?php
      if(isset($_SESSION["username"])) {
        echo '
          <div class="w-3/12 flex justify-end">
              <a href="/Shop/cart.php">
                  <svg class="h-8 p-1 mr-3 hover:text-green-500 duration-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18 fa-7x"><path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z" class=""></path></svg>
              </a>
              <!--<a href="">
              <svg class="h-8 hover:text-green-500 duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              </a> -->
  <div>
    <div class="dropdown relative">
      <button
        class="
          mr-8
          dropdown-toggle
          font-medium
          text-xs
          leading-tight
          uppercase
          transition
          duration-150
          ease-in-out
          flex
          items-center
          whitespace-nowrap
        "
        type="button"
        id="dropdownMenuButton1"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
              <svg class="h-8 hover:text-green-500 duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
      </button>
      <ul
        class="
          hidden
          dropdown-menu
          min-w-max
          absolute
          bg-white
          text-base
          z-50
          float-left
          py-2
          list-none
          text-left
          rounded-lg
          shadow-lg
          mt-6
          mr-5
          bg-clip-padding
          border-none
        "
        id="items"
        aria-labelledby="dropdownMenuButton1"
      >
        <li>
          <a
            class="
              dropdown-item
              text-sm
              py-2
              px-6
              font-normal
              block
              w-full
              whitespace-nowrap
              bg-transparent
              text-gray-700
              hover:bg-gray-100
            "
            href="#"
            >profile</a
          >
        </li>
        <li>
          <form action="index.php" method="POST">
          <button type="submit"
            value="Logout" name="Logout"
            id="logout"
            class="
              dropdown-item
              text-sm
              py-2
              px-6
              font-normal
              block
              w-full
              whitespace-nowrap
              bg-transparent
              text-gray-700
              hover:bg-gray-100
            "
            >Logout</button
          >
          </form>
        </li>
      </ul>
    </div>
  </div>
          </div>
        ';
      }
      else{
        echo '
          <div class="w-3/12 flex justify-end">
          <a
              href="/Shop/signUp.php"
              class="inline-block px-7 py-2 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out mr-5"
            >
              Signup
          </a>
          <a
              href="/Shop/login.php"
              class="inline-block px-7 py-2 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            >
              Login
          </a>
          </div>
        ';
      }
    ?>
</header>