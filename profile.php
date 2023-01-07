
<?php include './Temp/Header.php' ?>

<?php
    include './config/db.php';
    $id = $_SESSION['id'];

    $sql = "SELECT fname,sname,email FROM users WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    $users= mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

?>

<!-- 
Display User Result ]
-->
<p>
    <?php foreach($users as $user): ?>

        <h2><?php echo $user['fname']; ?></h2>
        <h2><?php echo $user['sname']; ?></h2>
        <h2><?php echo $user['email']; ?></h2>
       
    

    <?php endforeach; ?>
</p>






<?php include './Temp/footer.php' ?>
