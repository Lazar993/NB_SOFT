<?php

$connection = mysqli_connect('localhost', 'root', '', 'test');

$query1 = 'SELECT firstname, lastname FROM user WHERE dateCreate>=DATE_ADD(CURDATE(), INTERVAL -2 DAY)';
$result1 = mysqli_query($connection, $query1);

if(!$result1) {
    die('Query filed' . mysqli_error());
}

$query2 = 'SELECT u.firstname, u.lastname, p.id, SUM(p.price) FROM user u INNER JOIN product p';
$result2 = mysqli_query($connection, $query2);

if(!$result2) {
    die('Query filed' . mysqli_error());
}

$query3 = 'SELECT * FROM user u WHERE 2 <= (SELECT COUNT(*) FROM orders o WHERE u.id=o.userId)';
$result3 = mysqli_query($connection, $query3);

if(!$result3) {
    die('Query filed' . mysqli_error());
}

$query4 = 'SELECT u.firstname, u.lastname, o.id, COUNT(o.val) FROM user u INNER JOIN orders o';
$result4 = mysqli_query($connection, $query4);

if(!$result4) {
    die('Query filed' . mysqli_error());
}

$query5 = 'SELECT u.firstname, u.lastname FROM user u WHERE 2 <= (SELECT COUNT(o.val) FROM orders o)';
$result5 = mysqli_query($connection, $query5);

if(!$result5) {
    die('Query filed' . mysqli_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peti zadatak</title>
</head>
<body>
<div>
<h3> Prva grupa </h3>
<h4> a) </h4>
    <?php
        while($row = mysqli_fetch_assoc($result1)) {
            ?>
            <pre>
            <?php
            print_r($row);
            ?>
            </pre>

            <?php

        }
    ?>
</div>
<div>
<h4> b) </h4>
<?php
        while($row = mysqli_fetch_assoc($result2)) {
            ?>
            <pre>
            <?php
            print_r($row);
            ?>
            </pre>

            <?php

        }
    ?>
</div>
<div>
<h3> Druga grupa </h3>
<h4> c) </h4>
<?php
        while($row = mysqli_fetch_assoc($result3)) {
            ?>
            <pre>
            <?php
            print_r($row);
            ?>
            </pre>

            <?php

        }
    ?>
</div>
<div>
<h4> d) </h4>
<?php
        while($row = mysqli_fetch_assoc($result4)) {
            ?>
            <pre>
            <?php
            print_r($row);
            ?>
            </pre>

            <?php

        }
    ?>
</div>
<div>
<h4> e) </h4>
<?php
        while($row = mysqli_fetch_assoc($result5)) {
            ?>
            <pre>
            <?php
            print_r($row);
            ?>
            </pre>

            <?php

        }
    ?>
</div>
</body>
</html>