<?php

require ("config.php");

//Note that we put extra quotes around values
$query="SELECT 
	(SELECT name
	 FROM customers
	 WHERE customer_id = all (
		SELECT selectedcustomer
		FROM users
		WHERE userid = 1)),
	(SELECT surname
	 FROM customers
	 WHERE customer_id = all (
		SELECT selectedcustomer
		FROM users
		WHERE userid = 1)),
	COALESCE((sum(worked.price)), CAST(0 as money)) - COALESCE((SELECT sum(payment.amount)
	 FROM payment
	 NATURAL JOIN customers
	 WHERE customer_id = all (
		SELECT selectedcustomer FROM users
		WHERE userid = 1)), CAST(0 as money))
	 AS openAccount
FROM worked
NATURAL JOIN customers
WHERE customer_id = all (
SELECT selectedcustomer FROM users
WHERE userid = 1);
";

$result = pg_query($query);

$row = pg_fetch_object($result);

echo "<div class='row header'>
<div class='cell'>
    Name
</div>
<div class='cell'>
    Surname
</div>
<div class='cell'>
    OpenAccount
</div>
</div>";

while($row) {
echo "<div class='row'>"; 
echo "<div class='cell'> $row->name </div>";
echo "<div class='cell'> $row->surname </div>";
echo "<div class='cell'> $row->openaccount </div>"; 
echo "</div>";
$row = pg_fetch_object($result);
}
pg_free_result($result);
pg_close($dbconn);
?>