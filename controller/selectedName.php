<?php
$dbconn = pg_connect("host=localhost dbname=h1553755 user=h1553755 password=h1553755");

//Note that we put extra quotes around values
$query="select name from customers
where customer_id = all (
	select selectedcustomer from users
	where userid = 1
	);";

$result = pg_query($query);

$row = pg_fetch_object($result);

while($row) {
echo "$row->name";
$row = pg_fetch_object($result);
}
pg_free_result($result);
pg_close($dbconn);
?>