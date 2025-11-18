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
            <td>75</td> </tr>
        <tr>
            <td>Steak</td>
            <td>150</td>
        </tr>
    </table>

    <form method="POST" action="handleform.php"> <label>Select an Order:</label>
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

</body>
</html>