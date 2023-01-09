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
    $values["url"] = $item[0]['url'];

}

if (isset($_POST["Edit"])) {
    $id = $_GET['id'];
    

    $name = htmlspecialchars($_POST['itemName']);
    $price = htmlspecialchars($_POST['itemPrice']);
    $quntity = htmlspecialchars($_POST['itemQuntity']);
    $dicsount = htmlspecialchars($_POST['itemDiscount']);
    $url = htmlspecialchars($_POST['itemUrl']);

    $sql = "UPDATE item SET name='$name',price='$price',discount='$dicsount',quantity='$quntity',url='$url' WHERE  id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Update')</script>";
        header('Location: ./admin.php');
    } else {
        echo "Error " . mysqli_error($conn);
    }
}



?>


<?php include '../Backend/Header.php'?>


<form action="editItem.php?id=<?php echo $item[0]['id']; ?>" method="POST" class="place-self-center">

    <div class="mx-auto w-4/5">
			<div class="flex justify-center px-6 my-6">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex gap-5">
					<!-- Col -->
					<div
						class="w-full h-auto hidden lg:block lg:w-5/12 bg-cover rounded-l-lg items-center justify-center"
					><img src="/Shop/Backend/img/update-item.png" class="mt-10"></div>
					<!-- Col -->
					<div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
						<h3 class="pt-4 text-2xl text-center mb-3">Update your items</h3>
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
                                        value="<?php echo $values["name"]; ?>" 
                                        name="itemName"
									/>
                                    <?php //echo $error["namerr"] ? '<p class="text-xs italic text-red-500">Please enter a name.</p>' : '' ?>
								</div>
								<div class="md:ml-2">
									<label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
										price
									</label>
									<input
										class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										id="price"
										type="text"
                                        value="<?php echo $values["price"]; ?>" 
                                        name="itemPrice"
									/>
                                    <?php //echo $error["pricerr"] ? '<p class="text-xs italic text-red-500">Please enter a price.</p>' : '' ?>
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
                                    value="<?php echo $values["url"]; ?>" 
                                    name="itemUrl"
								/>
                                <?php //echo $error["urlerr"] ? '<p class="text-xs italic text-red-500">Please enter a url.</p>' : '' ?>
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
                                        value="<?php echo $values["quantity"]; ?>" 
                                        name="itemQuntity"
									/>
                                    <?php //echo $error["qunerr"] ? '<p class="text-xs italic text-red-500">Please enter quantity.</p>' : '' ?>
								</div>
								<div class="md:ml-2">
									<label class="block mb-2 mt-1 text-sm font-bold text-gray-700" for="c_password">
                                        Discount
									</label>
									<input
										class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										id="discount"
										type="text"
                                        value="<?php echo $values["discount"]; ?>" 
                                        name="itemDiscount"
									/>
                                    <?php //echo $error["diserr"] ? '<p class="text-xs italic text-red-500">Please enter quantity.</p>' : '' ?>
								</div>
							</div>
							<div class="mb-6 text-center">
								<button
									class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
									type="submit"
                                    name="Edit"
                                    value="Update"
								>
                                    Update the product
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

</form>

<?php include '../Temp/Footer.php' ?>