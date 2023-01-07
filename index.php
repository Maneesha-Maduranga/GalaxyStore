<?php include './config/db.php' ?>

<?php
//To Load The Store Item 
$sql = "SELECT id,name,price,quantity,discount FROM item";

$result = mysqli_query($conn, $sql);

$item = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>


<!-- Logout the User -->
<?php
if (isset($_SESSION['usertype'])) {
  if (($_SESSION["usertype"] == "admin")) {
    include "/Shop/Backend/Header.php";
  }
  include "/Shop/Backend/Header.php";
}
else {
    include './Temp/header.php';
}
?>
<?php

if (isset($_POST['Logout'])) {
  session_unset();
  echo "<script>window.location = './index.php'</script>";
  die();
}

?>

<div class="w-full bg-teal-200 flex mb-10 items-center justify-between">
  <div class="w-full h-full bg-white flex justify-end">
  <div class="w-11/12 h-full flex flex-col items-center justify-center rounded-tr-3xl rounded-b-xl rounded-tl-xl bg-teal-200">
  <p class="text-8xl mb-4">Save Big</p>
  <p class="text-2xl text-center font-serif text-slate-600">Get the latest phones with <br> the biggest <span class="text-red-900">discounts!!</span></p>
  </div>
</div>
  <div class="rounded-bl-full bg-white w-full h-full">
  <img src="/Shop/images/front-cover.png">
  </div>
</div>

<div class="grid md:px-8 py-2 md:grid-cols-5 gap-10">

  <?php foreach ($item as $oneItem): ?>

    <form action="cart.php" method="POST">

      <div class="w-64 p-3 bg-base-50 shadow-xl  sm:w-48px-2 hover:-translate-y-1 border rounded-lg">

        <figure><img src="/Shop/Backend/img/phone.jpg" alt="Shoes" /></figure>
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