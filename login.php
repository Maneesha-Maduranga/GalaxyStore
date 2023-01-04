<?php
  session_start();

  include('./config/db.php');

  $email_msg = '';
  $err_email = '';
  $err_password = '';

  if(isset($_POST['Signin'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

  
    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

    $result = mysqli_query($conn, $query);

    $login = mysqli_fetch_all($result,MYSQLI_ASSOC);

    mysqli_free_result($result);

   //print_r($login);

    if(count($login) == 0){
      $err_email = "Invalid Email";
    }else{
      if($login[0]['password'] == $password){
        if($login[0]['user_type'] == 'admin'){
          $_SESSION['username'] = $login[0]['fname'];
          $_SESSION['id'] = $login[0]['id'];
          $_SESSION['usertype'] = $login[0]['user_type'];
          header('Location: ./Backend/admin.php');
        }else{
          $_SESSION['username'] = $login[0]['fname'];
          $_SESSION['id'] = $login[0]['id'];
          $_SESSION['usertype'] = $login[0]['user_type'];
          header('Location: index.php');
  
        }
  
      
      }
      $email_msg = $_POST["email"];
      $err_password = "Inavlid Password";
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
  <title>Login</title>
</head>

<body>

  <section class="h-screen">
    <div class="container px-6 py-12 h-full">
      <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
        <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
          <img src="./Images/front.svg" class="w-full" alt="Phone image" />
        </div>
        <div class="md:w-8/12 lg:w-5/12 lg:ml-20">
          <form  action="login.php"   method="post">
            <!-- Email input -->
            <div class="mb-6">
              <input type="email" name="email" value="<?php echo $email_msg;?>" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Email address" required />
              <span class="text-red-500 px-6"><?php echo $err_email; ?></span>
            </div>

            <!-- Password input -->
            <div class="mb-6">
              <input type="password" name="password" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Password" required />
              <span class="text-red-500 px-6"><?php echo $err_password; ?></span>
            </div>

            <div class="flex justify-between items-center mb-6">
              <div class="form-group form-check">
                <input type="checkbox" class="h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" id="exampleCheck3" checked />
                <label class="form-check-label inline-block text-gray-800" for="exampleCheck2">Remember me</label>
              </div>
              <a class="text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out">Forgot
                password?</a>
            </div>

           <input type="submit" value="Sign In" name="Signin" class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full" data-mdb-ripple="true" data-mdb-ripple-color="light">
            <p class="text-sm font-semibold mt-2 pt-1 mb-0">
              Don't have an account?
              <a href="./signUp.php" class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out">Register</a>
            </p>

          </form>
        </div>
      </div>
    </div>
    
  </section>
</body>

</html>