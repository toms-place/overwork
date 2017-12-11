<?php
$dbconn = pg_connect("host=localhost dbname=h1553755 user=h1553755 password=h1553755");

//Note that we put extra quotes around values
$query="select * from worked where customer_id = all (
	select selectedcustomer from users
	where userid = 1
	);";

$result = pg_query($query);

$row = pg_fetch_object($result);

echo "<div class='row header'>
<div class='cell'>
    Date
</div>
<div class='cell'>
    Amount
</div>
<div class='cell'>
    Price
</div>
</div>";

while($row) {
echo "<div class='row'>"; 
echo "<div class='cell'> $row->date </div>";
echo "<div class='cell'> $row->minutesworked </div>";
echo "<div class='cell'> $row->price </div>"; 
echo "</div>";
$row = pg_fetch_object($result);
}
pg_free_result($result);
pg_close($dbconn);
?>