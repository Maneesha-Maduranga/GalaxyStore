<?php 
    include './config/db.php';
    include './Temp/header.php';

    if (isset($_SESSION['username'])) {
        $userid = $_SESSION["id"];

        $cartDetails = "SELECT * FROM orders WHERE user_id = $userid ";
        $details = mysqli_query($conn, $cartDetails);

        $orderItems = mysqli_fetch_all($details, MYSQLI_ASSOC);
        mysqli_free_result($details);

    } else {
        header('Location: login.php');
    }
?>
<?php if (count($orderItems) == 0) : ?>

    <div class="place-self-center  ">
        <div class="w-96 bg-base-100 shadow-2xl border rounded-md">
            <div class="card-body items-center text-center">
                <img src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg?w=740&t=st=1673106018~exp=1673106618~hmac=1b443761bd5c70813b68a3bfd7a2ff1b1f8ef207b33b216a8b83e0c962841ecd" 
                    alt="emtpy image"
                >
                <h2 class="card-title">Order Are Not Available</h2>
                <div class="card-actions">
                    <a href="index.php" class="btn btn-info">Return To Shop</a>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="w-full flex justify-center items-center ">
        <table class="w-11/12 shadow-md border rounded-xl">

            <thead class="bg-teal-100 p-6 mb-3 h-16 rounded-xl">
                <tr>
                    <th >Order ID</th>
                    <th>Item</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $itemIds = array();
            foreach ($orderItems as $item1) : 
            if (count($itemIds) == 0) {
                $order_id = $item1['order_id'];
                array_push($itemIds, $item1['order_id']);
            }
            elseif (in_array($item1['order_id'], $itemIds)) {
                continue;
            }
            else {
                $order_id = $item1['order_id'];
                array_push($itemIds, $item1['order_id']);
            }
            ?>
            <tr class="border-b border-gray-300 hover:bg-gray-200 h-10">
            <td class="text-center"><?php echo $item1['order_id'] ?></td>
                    <td class="text-center">
            <?php foreach ($orderItems as $item2):
                if ($order_id == $item2['order_id']) { ?>
                    <span><?php echo $item2['item'] ?></span>
                    <span class="ml-5"><?php echo $item2['quantity'] ?></span><br>
                <?php } endforeach; ?>
                    </td>
            <td class="text-center"><?php echo $item1['price'] ?></td>
                </tr>
        
        <?php $itemIds = array(); endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>


<?php include './Temp/footer.php' ?>