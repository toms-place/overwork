<?php

require ("config.php");

//Note that we put extra quotes around values
$query="select name, surname from customers
where customer_id = all (
	select selectedcustomer from users
	where userid = 1
	);";

$result = pg_query($query);

$row = pg_fetch_object($result);

while($row) {
	echo "$row->name $row->surname";
	$row = pg_fetch_object($result);
}

pg_free_result($result);
pg_close($dbconn);
?>