<?php
// If the submit button is clicked, calculate and show result immediately
if (isset($_GET['submit'])) {
    $a = $_GET['a'];
    $b = $_GET['b'];
    $c = $_GET['c'];

    // Formula: b^2 - 4ac
    $discriminant = ($b * $b) - (4 * $a * $c);

    // Show ONLY the number (as per your screenshot)
    echo "<h1>" . $discriminant . "</h1>";
    exit(); // Stop the rest of the page from loading
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Discriminant</title>
</head>
<body>
    <h1>Discriminant of a quadratic equation</h1>

    <form method="GET" action="">
        A <input type="number" name="a" placeholder="Value of a here"><br><br>
        B <input type="number" name="b" placeholder="Value of b here"><br><br>
        C <input type="number" name="c" placeholder="Value of c here"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>