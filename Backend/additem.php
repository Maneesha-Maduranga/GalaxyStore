<?php

include '../config/db.php';

//$nameerr = $pricerr = $qunerr = $diserr = '';
$names = $price = $discount = $quantity = '';
$error = array("namerr" => '', "pricerr" => '', "qunerr" => '', "urlerr" => '', "diserr" => '');


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

    if (empty($_POST['itemUrl'])) {
        $error["urlerr"] = "URL Is required";
    } else {
        $url = htmlspecialchars($_POST['itemUrl']);
    }

    if (array_filter($error)) {
        //Form Has Errors
    } else {

        $sql = "INSERT INTO item (name,price,quantity,discount,url) VALUES ('$names','$price','$quantity','$discount','$url')";

        if (mysqli_query($conn, $sql)) {
            header('Location: /Shop/Backend/admin.php');
            $name = $price = $discount = $quantity = '';
        } else {
            echo "Error " . mysqli_error($conn);
        }
    }
}
?>

<?php include '../Backend/Header.php' ?>

<form action="additem.php" method="POST" class="w-full">

    <div class="mx-auto w-4/5">
			<div class="flex justify-center px-6 my-12">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex gap-5">
					<!-- Col -->
					<div
						class="w-full h-auto hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
					><img src="/Shop/images/addItem.png"></div>
					<!-- Col -->
					<div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
						<h3 class="pt-4 text-2xl text-center mb-3">Add New Items!</h3>
						<form class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
							<div class="mb-4 md:flex md:justify-between">
								<div class="mb-4 md:mr-2 md:mb-0">
									<label class="block mb-2 text-sm font-bold text-gray-700" for="ItemName">
										Name
									</label>
									<input
										class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										id="name"
										type="text"
										placeholder="Item Name"
                                        name="itemName"
									/>
                                    <?php echo $error["namerr"] ? '<p class="text-xs italic text-red-500">Please enter a name.</p>' : '' ?>
								</div>
								<div class="md:ml-2">
									<label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
										price
									</label>
									<input
										class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										id="price"
										type="text"
										placeholder="Item Price"
                                        name="itemPrice"
									/>
                                    <?php echo $error["pricerr"] ? '<p class="text-xs italic text-red-500">Please enter a price.</p>' : '' ?>
								</div>
							</div>
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                    Image URL
								</label>
								<input
									class="w-full px-3 py-2 mb-0 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="url"
									type="text"
									placeholder="Item Image URL"
                                    name="itemUrl"
								/>
                                <?php echo $error["urlerr"] ? '<p class="text-xs italic text-red-500">Please enter a url.</p>' : '' ?>
							</div>
							<div class="mb-4 md:flex md:justify-between">
								<div class="mb-4 md:mr-2 md:mb-0">
									<label class="block mb-2 mt-1 text-sm font-bold text-gray-700" for="password">
										Quantity
									</label>
									<input
										class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										id="quantity"
										type="text"
										placeholder="1"
                                        name="itemQuntity"
									/>
                                    <?php echo $error["qunerr"] ? '<p class="text-xs italic text-red-500">Please enter quantity.</p>' : '' ?>
								</div>
								<div class="md:ml-2">
									<label class="block mb-2 mt-1 text-sm font-bold text-gray-700" for="c_password">
                                        Discount
									</label>
									<input
										class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										id="discount"
										type="text"
										placeholder="0%"
                                        name="itemDiscount"
									/>
                                    <?php echo $error["diserr"] ? '<p class="text-xs italic text-red-500">Please enter quantity.</p>' : '' ?>
								</div>
							</div>
							<div class="mb-6 text-center">
								<button
									class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
									type="submit"
                                    name="Submit"
                                    value="Submit"
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