<?php include './config/db.php' ?>

<?php include './Temp/header.php' ?>

<?php
if (isset($_SESSION['username'])) {
    if (isset($_POST['id'])) {
        $item_id = htmlspecialchars($_POST['id']);
        $name = $_POST['Name'];
        $price = $_POST['Price'];
        $discount = $_POST['Discount'];
        $quantity = $_POST['quantity'] == ""? 1 : $_POST["quantity"];
        $userid = $_SESSION["id"];

        $addToCartSql = "INSERT INTO cart (item_id,name,price,quantity,discount,user_id,shipped) VALUES ('$item_id','$name','$price','$quantity','$discount','$userid','false')";

        if (mysqli_query($conn, $addToCartSql)) {
        } else {
            "Error " . mysqli_error($conn);
        }
    }
} else {
    header('Location: login.php');
}




//For Remove Item From The Cart

if (isset($_POST['Delete'])) {

    $id = mysqli_real_escape_string($conn, $_POST['itemId']);

    $sql = "DELETE FRom cart WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Remove The Item From Cart');</script>";
    } else {
    }
}


if (isset($_SESSION["username"])) {

    $userid = $_SESSION["id"];

    //To View Item in shopping Cart
    $sql = "SELECT * FROM cart WHERE user_id = $userid ";

    $result = mysqli_query($conn, $sql);

    global $cartItems;
    $cartItems = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $_SESSION['length'] = count($cartItems) + 1;

    mysqli_free_result($result);
}

if (isset($_POST['submitOrders'])) {

    $total = $_POST["subTotal"];
    $order_id = $_SESSION["id"] . $total . strval(rand(5, 10));
    $user_id = $_SESSION['id'];
    foreach ($cartItems as $item) {
        $name = $item['name'];
        $quan = $item['quantity'];
        $item_id = $item['item_id'];
        $orderQuery = "INSERT INTO orders (order_id,user_id,item,quantity,price) VALUES ('$order_id','$user_id','$name','$quan','$total')";
        // $updateCart = "UPDATE cart SET shipped = 'true' WHERE item_id = '$item_id'";
        $updateCart = "DELETE FROM cart WHERE user_id = $user_id";
        if (mysqli_query($conn, $orderQuery)) {
            mysqli_query($conn, $updateCart);
        } else {
            "Error " . mysqli_error($conn);
        }
    }
    echo "<script>window.location = '/Shop/orders.php'</script>";
    die();
}
?>




<?php
$items = false;
foreach ($cartItems as $item) {
    if ($item['shipped'] == 'false') {
        $items = true;
    }
}
if ( $items == false) : 
?>

    <div class="place-self-center	">
        <div class="w-96 bg-base-100 shadow-2xl border rounded-md">
            <div class="card-body items-center text-center">
                <img src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg?w=740&t=st=1673106018~exp=1673106618~hmac=1b443761bd5c70813b68a3bfd7a2ff1b1f8ef207b33b216a8b83e0c962841ecd" 
                    alt="emtpy image"
                >
                <h2 class="card-title">Your Cart Is Currently Empty</h2>
                <div class="card-actions">
                    <a href="index.php" class="btn btn-info">Return To Shop</a>
                </div>
            </div>
        </div>
    </div>


<?php else : ?>

    <div class="px-4 ">
        <table class="w-full shadow-md">

            <thead class="bg-teal-100 p-6 mb-3 h-16 rounded-xl">
                <tr>
                    <th >Product</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $subTotal = 0 ?>
                <?php foreach ($cartItems as $item) : ?>
                    <?php
                    if ($item['shipped'] == 'false') {
                    $subTotal = $subTotal + ($item['price'] - $item['discount']) * $item['quantity'];

                    ?>

                    <tr class="h-16 hover:bg-slate-50 border-b border-slate-200">
                        <td class="text-center"><img src="./img/phone.jpg" class="w-20" alt=""></td>
                        <td class="text-center"><?php echo $item['name']; ?></td>
                        <td class="text-center"><?php echo $item['quantity']; ?></td>
                        <td class="text-center"><?php echo $item['price']; ?></td>
                        <td class="text-center">
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="itemId" value="<?php echo $item['id']; ?>">
                                <input type="submit" value="Remove" class="btn btn-outline btn-error btn-xs" name="Delete">
                            </form>
                        </td>
                    </tr>

                <?php } endforeach; ?>

        </table>

    </div>
    <div class="place-self-end mt-3 p-3">
        <div class="border border-base-300 bg-base-100 rounded-box w-64 place-self-end flex flex-col justify-center p-3 shadow-xl">
            <div class="collapse-title text-xl font-medium pl-3">
                Sub Total
            </div>
            <form action="cart.php" method="POST">
                <div class="">
                    <p class="mb-3">Rs: <?php echo $subTotal; ?></p>
                    <input class="hidden" value="<?php echo $subTotal; ?>" id="subTotal" name="subTotal">
                    <button type="submit" class="btn btn-success" name="submitOrders" id="placeOrder" > Place The Order</button>
                </div>
            </form>
                </div>
    </div>
<?php endif; ?>

</body>



<?php include './Temp/footer.php' ?>