<?php
if (isset($_GET['submit'])) {
    $a = $_GET['a'];
    $b = $_GET['b'];
    $c = $_GET['c'];

    $discriminant = ($b * $b) - (4 * $a * $c);

    echo "<h1>" . $discriminant . "</h1>";
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