<?php
// Initialize variables to avoid "undefined" errors if accessed directly
$order_name = "";
$quantity = 0;
$cash_paid = 0;
$total_cost = 0;
$change = 0;
$message = "";

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // 1. Define the Menu and Prices (MUST be defined here as well)
    $menu_items = [
        "Burger" => 50,
        "Fries" => 75, // Updated price for Fries
        "Steak" => 150
    ];

    // 2. Get inputs from the POST request
    $order_name = $_POST['order'];
    $quantity = $_POST['quantity'];
    $cash_paid = $_POST['cash'];

    // 3. Calculate Costs
    $price_per_item = $menu_items[$order_name];
    $total_cost = $price_per_item * $quantity;
    $change = $cash_paid - $total_cost;

    // 4. Check for sufficient cash
    if ($cash_paid < $total_cost) {
        $message = "Sorry, cash is not enough.";
    }
} else {
    // If someone tries to access handleform.php directly without submitting the form
    header('Location: index.php'); // Redirect back to the order form
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt</title>
    <style>
        body { font-family: "Times New Roman", serif; padding: 20px; font-size: 24px; text-align: center; }
        .receipt-box { border: 2px dotted black; padding: 30px; display: inline-block; margin-top: 50px; }
        h1, h2, h3 { margin: 10px 0; }
    </style>
</head>
<body>

    <div class="receipt-box">
        <h1>RECEIPT</h1>
        
        <?php if ($message): // If there's an error message for insufficient cash ?>
            <h2 style="color:red;"><?php echo $message; ?></h2>
            <p>You need <?php echo $total_cost - $cash_paid; ?> more.</p>
            <p><a href="index.php">Go back to order</a></p>
        <?php else: // Display the full receipt ?>
            <h2>Total Price: <?php echo $total_cost; ?></h2>
            <h2>You Paid: <?php echo $cash_paid; ?></h2>
            <h2>CHANGE: <?php echo $change; ?></h2>
            
            <br>
            <p><?php echo date("m/d/Y h:i:s a"); ?></p> <?php endif; ?>
    </div>

</body>
</html>