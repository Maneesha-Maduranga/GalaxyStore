<?php


include("./config/db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $sname = $_POST["sname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!is_numeric($fname) && !is_numeric($sname)) {
        $query = "INSERT INTO users (fname, sname, email, password) VALUES ('$fname', '$sname', '$email', '$password')";

        mysqli_query($conn, $query);
        header("Location: login.php");
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sign Up</title>
</head>

<body>
    <div class="container flex flex-col md:flex-row sm:flex-col sm:justify-center sm:items-center px-6 py-12 h-full">
        <!-- component -->
        <div class="md:w-8/12 lg:w-6/12 mb-5 sm:mb-12 md:mb-0">
            <img src="./Images/registerImage.jpg" class="w-full" alt="Register image" />
        </div>
        <div class="w-full sm:w-1/2 md:w-1/2 py-1 sm:py-10 px-5 md:px-10 ">
            <div class="text-center mb-10">
                <h1 class="font-bold text-3xl text-gray-900">REGISTER</h1>
                <p>Enter your information to register</p>
            </div>
            <form method="post">
                <div>
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">First name</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="mdi mdi-account-outline text-gray-400 text-lg"></i>
                                </div>
                                <input type="text" name="fname"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="Lucifer" required>
                            </div>
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Last name</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="mdi mdi-account-outline text-gray-400 text-lg"></i>
                                </div>
                                <input type="text" name="sname"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="Devon" required>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Email</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="mdi mdi-email-outline text-gray-400 text-lg"></i>
                                </div>
                                <input type="email" name="email"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="luciferdevon@example.com" required>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-12">
                            <label for="" class="text-xs font-semibold px-1">Password</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i>
                                </div>
                                <input type="password" name="password"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="************" required>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-1">
                            <button type="submit"
                                class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">REGISTER
                                NOW</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-grey-dark mt-6 text-center mb-5">
                Already have an account?
                <a class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out"
                    href="./login.php">
                    Log in
                </a>
            </div>
        </div>
    </div>
</body>

</html>