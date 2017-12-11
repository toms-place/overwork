<?php
$dbconn = pg_connect("host=localhost dbname=h1553755 user=h1553755 password=h1553755");

//Note that we put extra quotes around values
$query="select name, customer_id from customers";

$result = pg_query($query);

$row = pg_fetch_object($result);

while($row) {

    echo "<option name='c_$row->customer_id' value='$row->customer_id' class='selectName'>$row->name</option>";

$row = pg_fetch_object($result);
}
pg_free_result($result);
pg_close($dbconn);
?>