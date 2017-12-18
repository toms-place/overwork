<?php

require ("config.php");

//Note that we put extra quotes around values
$query="select name, customer_id, surname from customers";

$result = pg_query($query);

$row = pg_fetch_object($result);

while($row) {

    echo "<option name='c_$row->customer_id' value='$row->customer_id' class='getCustomerNamesAsOptions'>$row->name $row->surname</option>";

$row = pg_fetch_object($result);
}
pg_free_result($result);
pg_close($dbconn);
?>