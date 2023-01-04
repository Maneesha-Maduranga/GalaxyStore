<?php

include '../config/db.php';

$values = array("name" => '', "price" => '', "quantity" => '', "discount" => '');

if (isset($_POST['Update'])) {

    $id = htmlspecialchars($_GET['id']);

    $sql = "SELECT * FROM item WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    $item = mysqli_fetch_all($result, MYSQLI_ASSOC);


    mysqli_free_result($result);

    $values["name"] = $item[0]['name'];
    $values["price"] = $item[0]['price'];
    $values["quantity"] = $item[0]['quantity'];
    $values["discount"] = $item[0]['discount'];


    //print_r($item);


}

if (isset($_POST["Edit"])) {
    $id = $_GET['id'];
    

    $name = htmlspecialchars($_POST['itemName']);
    $price = htmlspecialchars($_POST['itemPrice']);
    $quntity = htmlspecialchars($_POST['itemQuntity']);
    $dicsount = htmlspecialchars($_POST['itemDiscount']);

    $sql = "UPDATE item SET name='$name',price='$price',discount='$dicsount',quantity='$quntity' WHERE  id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Update')</script>";
        header('Location: ./admin.php');
    } else {
        echo "Error " . mysqli_error($conn);
    }
}



?>


<?php include '../Backend/Header.php'?>


<form action="editItem.php?id=<?php echo $item[0]['id']; ?>" method="POST" class="place-self-center outline outline-offset-2 outline-1">

    <div class="container flex flex-col px-10 py-10 space-y-4 w-96">

        <label>
            Item Name:
        </label>
        <input type="text" name="itemName" value="<?php echo $values["name"]; ?>" class="outline outline-offset-2 outline-1">
        <label>
            Item Price:
        </label>
        <input type="text" name="itemPrice" value="<?php echo $values["price"]; ?>" class="outline outline-offset-2 outline-1">
        <label>
            Item Quantity:
        </label>
        <input type="text" name="itemQuntity" value="<?php echo $values["quantity"]; ?>" class="outline outline-offset-2 outline-1">
        <label>
            Item Discount:
        </label>
        <input type="text" name="itemDiscount" value="<?php echo $values["discount"]; ?>" class="outline outline-offset-2 outline-1">
        <div class="px-12 place-self-center">
            <input type="submit" value="Update" class="btn btn-info btn-wide" name="Edit">
        </div>

    </div>

</form>



<?php include '../Temp/Footer.php' ?>