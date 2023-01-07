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





<form action="additem.php" method="POST" class="w-full">

    <!-- <div class="container flex flex-col px-10 py-10 space-y-4 w-96">


        <label>Enter Item Name:</label>
        <input type="text" name="itemName" value="<?php //echo $names; ?>" class="outline outline-offset-2 outline-1">
        <span class="text-red-500"><?php //echo $error["namerr"] ?  $error["namerr"] : '' ?></span>





        <label>Enter Item Price:</label>
        <input type="text" name="itemPrice" value="<?php //echo $price; ?>" class="outline outline-offset-2 outline-1">
        <span class="text-red-500"> <?php //echo $error["pricerr"] ?  $error["pricerr"] : '' ?></span>

        <label>Enter Item Quantity:</label>
        <input type="text" name="itemQuntity" value="<?php //echo $quantity; ?>" class="outline outline-offset-2 outline-1">
        <span class="text-red-500"><?php //echo $error["qunerr"] ?  $error["qunerr"] : '' ?></span>

        <label>Enter Item Discount:</label>
        <input type="text" name="itemDiscount" value="<?php //echo $discount; ?>" class="outline outline-offset-2 outline-1">

        <div class="px-12 py-3 place-self-center">
            <input type="submit" value="Submit" class="btn btn-info btn-wide" name="Submit">
        </div>

    </div> -->

    <div class="mx-auto w-4/5">
			<div class="flex justify-center px-6 my-12">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex gap-5">
					<!-- Col -->
					<div
						class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
					><img src="/Shop/images/addItem.png"></div>
					<!-- Col -->
					<div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
						<h3 class="pt-4 text-2xl text-center mb-3">Add New Items!</h3>
						<form class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
							<div class="mb-4 md:flex md:justify-between">
								<div class="mb-4 md:mr-2 md:mb-0">
									<label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
										Name
									</label>
									<input
										class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										id="firstName"
										type="text"
										placeholder="First Name"
									/>
                                    <?php echo $error["namerr"] ? '<p class="text-xs italic text-red-500">Please enter a name.</p>' : '' ?>
								</div>
								<div class="md:ml-2">
									<label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
										price
									</label>
									<input
										class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										id="lastName"
										type="text"
										placeholder="Last Name"
									/>
                                    <?php echo $error["pricerr"] ? '<p class="text-xs italic text-red-500">Please enter a price.</p>' : '' ?>
								</div>
							</div>
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                    Image URL
								</label>
								<input
									class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="email"
									type="email"
									placeholder="Email"
								/>
                                <?php echo $error["urlerr"] ? '<p class="text-xs italic text-red-500">Please enter a url.</p>' : '' ?>
							</div>
							<div class="mb-4 md:flex md:justify-between">
								<div class="mb-4 md:mr-2 md:mb-0">
									<label class="block mb-2 text-sm font-bold text-gray-700" for="password">
										Quantity
									</label>
									<input
										class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										id="password"
										type="text"
										placeholder="1"
									/>
                                    <?php echo $error["quanerr"] ? '<p class="text-xs italic text-red-500">Please enter quantity.</p>' : '' ?>
								</div>
								<div class="md:ml-2">
									<label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                                        Discount
									</label>
									<input
										class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										id="c_password"
										type="text"
										placeholder="5%"
									/>
                                    <?php echo $error["diserr"] ? '<p class="text-xs italic text-red-500">Please enter quantity.</p>' : '' ?>
								</div>
							</div>
							<div class="mb-6 text-center">
								<button
									class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
									type="button"
								>
                                    Add the product
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

</form>





<?php include '../Temp/Footer.php' ?>