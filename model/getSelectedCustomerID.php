<?php

require ("config.php");

//Note that we put extra quotes around values
$query="select customer_id from customers
where customer_id = all (
	select selectedcustomer from users
	where userid = 1
	);";

$result = pg_query($query);

$row = pg_fetch_object($result);

while($row) {
	echo "$row->customer_id";
	$row = pg_fetch_object($result);
}

pg_free_result($result);
pg_close($dbconn);
?>