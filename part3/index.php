<?php
// Initialize variables to avoid "undefined" errors before form submission
$message = "";

if (isset($_POST['submit'])) {
    // 1. Define the Menu and Prices
    $menu_items = [
        "Burger" => 50,
        "Fries" => 25,
        "Steak" => 150
    ];

    // 2. Get inputs
    $order = $_POST['order'];
    $quantity = $_POST['quantity'];
    $cash = $_POST['cash'];

    // 3. Calculate Costs
    $price = $menu_items[$order];
    $total_cost = $price * $quantity;
    $change = $cash - $total_cost;

    // 4. Logic: Do they have enough money?
    if ($cash >= $total_cost) {
        $message = "
        <h2>The total cost is " . $total_cost . "</h2>
        <h2>Your change is " . $change . "</h2>
        <h3>Thanks for your order!</h3>";
    } else {
        $message = "<h2 style='color:red'>Sorry, balance not enough.</h2>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order System</title>
    <style>
        body { font-family: "Times New Roman", serif; padding: 20px; font-size: 20px; }
        .border-box { border: 2px solid black; display: inline-block; padding: 15px; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 15px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        select, input { margin-bottom: 10px; width: 200px; font-size: 18px; }
    </style>
</head>
<body>

<div class="border-box">
    <h2 style="text-align: center; margin-top: 0;">Menu</h2>
    <table>
        <tr>
            <th>Order</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>Burger</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Fries</td>
            <td>25</td>
        </tr>
        <tr>
            <td>Steak</td>
            <td>150</td>
        </tr>
    </table>

    <form method="POST" action="">
        <label>Select an Order:</label>
        <select name="order">
            <option value="Burger">Burger</option>
            <option value="Fries">Fries</option>
            <option value="Steak">Steak</option>
        </select>
        <br>

        <label>Quantity:</label>
        <input type="number" name="quantity" required>
        <br>

        <label>Cash:</label>
        <input type="number" name="cash" required>
        <br><br>

        <div style="text-align: center;">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
</div>

<?php echo $message; ?>

</body>
</html>