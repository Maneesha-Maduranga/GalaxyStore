<?php include './config/db.php' ?>

<?php

//To Load The Store Item 
  


$sql = "SELECT id,name,price,quantity,discount FROM item";

$result = mysqli_query($conn, $sql);

$item = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>






<?php include './Temp/header.php' ?>

<!-- Logout the User -->
<?php 

  if(isset($_POST['Logout'])){
    session_unset();
  }


?>

<div class="grid md:px-8 py-2 md:grid-cols-5 gap-2">

 

  <?php foreach ($item as $oneItem): ?>

    <form action="cart.php" method="POST">

      <div class="card w-64 p-3 bg-base-50 shadow-xl  sm:w-48px-2">

        <figure><img src="./img/phone.jpg" alt="Shoes" /></figure>
        <div class="card-body">
          <h6>
            <?php echo htmlspecialchars($oneItem['name']) ?>
          </h6>
          <p class="text-sm ..."> Price : <?php echo htmlspecialchars($oneItem['price']) ?> <br>
            Availble Item : <?php echo htmlspecialchars($oneItem['quantity']) ?> <br>
            Item Discount : <?php echo htmlentities($oneItem['discount']) ?>
          </p>
          <input type="text" placeholder="Enter Quantity" name="quantity"
            class="input input-bordered input-sm w-full max-w-xs" />
          <input type="hidden" name="id" value="<?php echo $oneItem['id'] ?>">
          <input type="hidden" name="Name" value="<?php echo $oneItem['name'] ?>">
          <input type="hidden" name="Price" value="<?php echo $oneItem['price'] ?>">
          <input type="hidden" name="Discount" value="<?php echo $oneItem['discount'] ?>">


          </p>
          <div class="card-actions justify-end">

            <input type="submit" name="Update" value="Add To Cart" class="btn  btn-info btn-xs">

          </div>
        </div>
      </div>
    </form>
    <?php endforeach; ?>

    
</div>





<?php include './Temp/footer.php' ?>