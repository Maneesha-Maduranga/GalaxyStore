<?php

include '../config/db.php';
include '../Backend/Header.php';

$getOrders = "SELECT users.id, orders.id AS oid, users.fname, users.sname, orders.order_id, orders.quantity, users.email, orders.item, orders.price FROM orders INNER JOIN users ON orders.user_id = users.id";

$result = mysqli_query($conn, $getOrders);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
?>

<?php
if (isset($_POST["removeItem"])) {
    $oid = $_POST['order_id'];
    $sql = "DELETE FROM orders WHERE id=$oid";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error";
    }
}
?>

<?php
if (!count($orders) == 0) { ?>
<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4 ">
    <div class="flex flex-col justify-center h-full ">
        <!-- Table -->
        <div class="w-11/12 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800 text-xl">Confirmed Orders</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Order ID</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Email</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Item</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">quantity</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Price</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center"></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">

<?php
    foreach ($orders as $order) {
        ?>

                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800"><?php echo $order['fname'] ." ". $order['sname'];?></div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left"><?php echo $order['order_id']." ";?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium text-teal-800"><?php echo $order['email']?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center"><?php echo $order['item']?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center"><?php echo $order['quantity']?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center"><?php echo $order['price']?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">
                                        <div class="flex space-x-2 justify-center">
  <div>
    <form action="viewOrders.php" method="post">
    <button type="submit" name="removeItem" value="removeItem" class="inline-block rounded-full bg-teal-500 text-white leading-normal uppercase shadow-md hover:bg-teal-800 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-9 h-9 flex justify-center items-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>

    </button>
    <input type="text" class="hidden" value="<?php echo $order['oid']; ?>" name="order_id">
    </form>
  </div>
</div>
                                    </div>
                                </td>
                            </tr>

<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
} else {
?>
    <div class="place-self-center	">
        <div class="w-96 bg-base-100 shadow-2xl border rounded-md">
            <div class="card-body items-center text-center">
                <img src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-536.jpg?w=740&t=st=1673271242~exp=1673271842~hmac=bab3b2fd26fb34cfb1beb983342180f61f2630913a8d8faebf13e16e76bdea49" 
                    alt="emtpy image"
                >
                <h2 class="card-title">No Any Confirmed Orders</h2>
                <div class="card-actions">
                    <a href="/Shop/Backend/admin.php" class="btn btn-info">Return To Home</a>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<?php include '../Temp/Footer.php' ?>
