<?php

include '../config/db.php';

//$nameerr = $pricerr = $qunerr = $diserr = '';
$names = $price = $discount = $quantity = '';
$error = array("namerr" => '', "pricerr" => '', "qunerr" => '');


//To add Item to the database
if (isset($_POST['Submit'])) {

    if (empty($_POST['itemName'])) {
        $error["namerr"] = "Name Is Required";
    } else {
        $names = htmlspecialchars($_POST['itemName']);
    }
    if (empty($_POST['itemPrice'])) {
        $error["pricerr"] = "Price is Required";
    } else {
        $price = htmlspecialchars($_POST['itemPrice']);
    }
    if (empty($_POST['itemQuntity'])) {
        $error["qunerr"] = "Quantity Is required";
    } else {
        $quantity = htmlspecialchars($_POST['itemQuntity']);
    }
    if (empty($_POST['itemDiscount'])) {
        $discount = 0;
    } else {
        $discount = htmlspecialchars($_POST['itemDiscount']);
    }

    if (array_filter($error)) {
        //Form Has Errors
    } else {

        $sql = "INSERT INTO item (name,price,quantity,discount) VALUES ('$names','$price',$quantity,$discount)";

        if (mysqli_query($conn, $sql)) {
            header('Location: ./admin.php');
            $name = $price = $discount = $quantity = '';
        } else {
            echo "Error " . mysqli_error($conn);
        }
    }
}
?>


<?php include '../Backend/Header.php' ?>





<form action="additem.php" method="POST" class="place-self-center outline outline-offset-2 outline-1">

    <div class="container flex flex-col px-10 py-10 space-y-4 w-96">


        <label>Enter Item Name:</label>
        <input type="text" name="itemName" value="<?php echo $names; ?>" class="outline outline-offset-2 outline-1">
        <span class="text-red-500"><?php echo $error["namerr"] ?  $error["namerr"] : '' ?></span>



        <!-- <label>Item Image</label> -->


        <label>Enter Item Price:</label>
        <input type="text" name="itemPrice" value="<?php echo $price; ?>" class="outline outline-offset-2 outline-1">
        <span class="text-red-500"> <?php echo $error["pricerr"] ?  $error["pricerr"] : '' ?></span>

        <label>Enter Item Quantity:</label>
        <input type="text" name="itemQuntity" value="<?php echo $quantity; ?>" class="outline outline-offset-2 outline-1">
        <span class="text-red-500"><?php echo $error["qunerr"] ?  $error["qunerr"] : '' ?></span>

        <label>Enter Item Discount:</label>
        <input type="text" name="itemDiscount" value="<?php echo $discount; ?>" class="outline outline-offset-2 outline-1">

        <div class="px-12 py-3 place-self-center">
            <input type="submit" value="Submit" class="btn btn-info btn-wide" name="Submit">
        </div>

    </div>
</form>





<?php include '../Temp/Footer.php' ?>