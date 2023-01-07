<?php include './Temp/Header.php' ?>

<?php
    include './config/db.php';
    $id = $_SESSION['id'];

    $sql = "SELECT fname,sname,email,user_type FROM users WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    $users= mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
?>

<!-- Display User details  -->
<div>
    <?php foreach($users as $user): ?>

        <div class="mx-auto right-0 mt-2 mb-4 w-2/5 flex flex-col justify-center">
                <div class="bg-white rounded overflow-hidden shadow-xl border hover:shadow-2xl">
                    <div class="text-center p-6 bg-teal-800 border-b">
                    (<svg aria-hidden="true" role="img" class="h-24 w-24 text-white rounded-full mx-auto" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M172 120a44 44 0 1 1-44-44a44 44 0 0 1 44 44Zm60 8A104 104 0 1 1 128 24a104.2 104.2 0 0 1 104 104Zm-16 0a88 88 0 1 0-153.8 58.4a81.3 81.3 0 0 1 24.5-23a59.7 59.7 0 0 0 82.6 0a81.3 81.3 0 0 1 24.5 23A87.6 87.6 0 0 0 216 128Z"></path></svg>
                    <p class="pt-2 text-lg font-semibold text-gray-50"><?php echo $user['fname']." ".$user['sname'] ?> </p>
                    <p class="text-sm text-gray-100 mb-2"><?php echo $user['email'] ?></p>
                    <p class="text-sm text-gray-100"><?php echo $user['user_type'] ?></p>
                    <div class="mt-5">
                        <a
                        class="border rounded-full py-2 px-4 text-xs font-semibold text-gray-100"
                        >
                        Manage your Account
                        </a>
                    </div>
                    </div>

                    <form action="index.php" method="POST">
                    <div class="flex items-center">
                        <button class="w-full px-4 py-2 pb-4 hover:bg-gray-100 flex flex-col items-center" type="submit" value="Logout" name="Logout" id="logout">
                            <p class="text-sm font-medium text-gray-800 leading-none"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="h-4 w-4 text-gray-800 fill-current animate-spin" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" d="M988 548c-19.9 0-36-16.1-36-36c0-59.4-11.6-117-34.6-171.3a440.45 440.45 0 0 0-94.3-139.9a437.71 437.71 0 0 0-139.9-94.3C629 83.6 571.4 72 512 72c-19.9 0-36-16.1-36-36s16.1-36 36-36c69.1 0 136.2 13.5 199.3 40.3C772.3 66 827 103 874 150c47 47 83.9 101.8 109.7 162.7c26.7 63.1 40.2 130.2 40.2 199.3c.1 19.9-16 36-35.9 36z"></path></svg> Logout
                                    </p>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
    

    <?php endforeach; ?>
</div>

<?php include './Temp/footer.php' ?>
