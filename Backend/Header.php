<?php
session_start();

//Check If User session set or Not
if (!isset($_SESSION['username'])) {
  header('Location: /Shop/login.php');
}

//Check The user is Admin or not
if ($_SESSION['usertype'] != 'admin') {
  header('Location: /Shop/login.php');
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
              <a href="/Shop/Backend/admin.php">Home</a>
            </li>
            <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer active">
              <a href="/Shop/index.php">User view</a>
            </li>
            <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
              <a href="/Shop/Backend/additem.php">Add items</a>
            </li>
            <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
              <a href="">View items</a>
            </li>
        </ul>
    </nav>

    <!-- buttons --->
          <div class="w-3/12 flex justify-end">
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
          <form action="admin.php" method="POST">
          <button type="submit"
            value="logout" name="logout"
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
</header>