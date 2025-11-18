<?php
$order_name = "";
$quantity = 0;
$cash_paid = 0;
$total_cost = 0;
$change = 0;
$message = "";

if (isset($_POST['submit'])) {
    $menu_items = [
        "Burger" => 50,
        "Fries" => 75,
        "Steak" => 150
    ];

    $order_name = $_POST['order'];
    $quantity = $_POST['quantity'];
    $cash_paid = $_POST['cash'];

    $price_per_item = $menu_items[$order_name];
    $total_cost = $price_per_item * $quantity;
    $change = $cash_paid - $total_cost;

    if ($cash_paid < $total_cost) {
        $message = "Sorry, balance not enough.";
    }
} else {
    header('Location: index.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt</title>
    <style>
        body { 
            font-family: Arial, Helvetica, sans-serif; 
            margin: 0;
            padding: 20px;
        }
        .receipt-box { 
            border: 4px dotted black; 
            padding: 20px; 
            width: 90%;   
            margin: 0 auto; 
        }
        h1 { 
            text-align: center; 
            font-size: 60px;    
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 40px;
        }
        .line-item {
            font-size: 40px;    
            font-weight: bold;
            text-align: left;   
            margin-bottom: 20px;
            margin-left: 10px;
        }
        .date-time {
            font-size: 35px;
            font-weight: bold;
            font-style: italic;
            text-align: left;   
            margin-top: 40px;
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <?php if ($message): ?>
        <div class="receipt-box" style="border-color: red;">
            <div class="line-item"><?php echo $message; ?></div>
        </div>
    <?php else: ?>
        <div class="receipt-box">
            <h1>RECEIPT</h1>
            <div class="line-item">Total Price: <?php echo $total_cost; ?></div>
            <div class="line-item">You Paid: <?php echo $cash_paid; ?></div>
            <div class="line-item">CHANGE: <?php echo $change; ?></div>
            
            <div class="date-time">
                <?php 
                date_default_timezone_set('Asia/Manila'); 
                echo date("m/d/Y h:i:s a"); 
                ?>
            </div>
        </div>
    <?php endif; ?>

</body>
</html>