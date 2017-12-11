<?php

require ("config.php");

//Note that we put extra quotes around values
$query="select date, minutesworked, price from worked where customer_id = all (
	select selectedcustomer from users
	where userid = 1
    )";

$result = pg_query($query);

$row = pg_fetch_object($result);

echo "<div class='row header'>
<div class='cell'>
    Date
</div>
<div class='cell'>
    minutes
</div>
<div class='cell'>
    total Price
</div>
</div>";

while($row) {
echo "<div class='row'>"; 
echo "<div class='cell'> $row->date </div>";
echo "<div class='cell'> $row->minutesworked minutes </div>";
echo "<div class='cell'> $row->price </div>"; 
echo "</div>";
$row = pg_fetch_object($result);
}
pg_free_result($result);
pg_close($dbconn);


//sum
require ("config.php");

$query2="select sum(price) as sum from worked where customer_id = all (
    select selectedcustomer from users
    where userid = 1
    );";

$result2 = pg_query($query2);

$row = pg_fetch_object($result2);

while($row) {
    echo "<div class='row'>";
    echo "<div class='cell sum'>  </div>";
    echo "<div class='cell sum'> SUMME: </div>";
    echo "<div class='cell sum'> $row->sum </div>"; 
    echo "</div>";
    $row = pg_fetch_object($result2);
    }

pg_free_result($result2);
pg_close($dbconn);

?>