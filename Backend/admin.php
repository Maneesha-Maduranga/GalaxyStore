<?php

include '../config/db.php';

include '../Backend/Header.php';


//Make Queary For Fething Data From Db
$sql = "SELECT * FROM item";

$result = mysqli_query($conn, $sql);

$item = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>


<?php

  //Logout Logic
  if(isset($_POST['logout'])){
    session_unset();
  
  }

?> 

<?php


//For The Item Delete from the Database
if (isset($_POST['Remove'])) {

  echo '<script>alert("Are Your Shuwar")</script>';

  $id = htmlspecialchars($_GET['id']);

  $sql = "DELETE FROM item WHERE id=$id";

  if (mysqli_query($conn, $sql)) {
    header('Location: ./admin.php');
  } else {
    echo "Error";
  }
}

?>









  <!-- items are not in the database -->
  <?php if (count($item) == 0) : ?>
    
    <div class="card w-96 bg-base-100 shadow-xl place-self-center">
      <figure class="px-10 pt-10">
        <img src="./img/Notfound.png" alt="Shoes" class="rounded-xl" />
      </figure>
      <div class="card-body items-center text-center">
        <h2 class="card-title">No Item Found</h2>
        <div class="card-actions">
          <a href="addItem.php" class="btn btn-primary">ADD</a>
        </div>
      </div>
    </div>
    <?php else : ?>
      <!-- items are in the database -->
      <div class="grid md:px-8 py-2 md:grid-cols-5 gap-2">
      <?php foreach ($item as $oneItem) : ?>


        <div class="card w-64 p-3 bg-base-50 shadow-xl  sm:w-48px-2">
          <figure><img src="./img/phone.jpg" alt="Shoes" /></figure>
          <div class="card-body">
            <h6><?php echo htmlspecialchars($oneItem['name']) ?></h6>
            <p class="text-sm ..."> Price : <?php echo htmlspecialchars($oneItem['price']) ?> <br>
              Discount :<?php echo htmlspecialchars($oneItem['discount']) ?> <br>
              Quantity :<?php echo htmlspecialchars($oneItem['quantity']) ?> <br>


            </p>
            <div class="card-actions justify-end">
              <form action="admin.php?id=<?php echo $oneItem['id']; ?>" method="post">
                <input type="submit" name="Remove" value="Remove" class="btn btn-outline btn-error btn-xs">
              </form>
              <form action="editItem.php?id=<?php echo $oneItem['id']; ?>" method="post">
                <input type="submit" name="Update" value="Update" class="btn  btn-info btn-xs">
              </form>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
      </div>
    <?php endif; ?>






    <?php include '../Temp/Footer.php' ?>