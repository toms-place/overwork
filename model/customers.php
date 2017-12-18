<?php

require ("config.php");

$query="select name, surname, adress, registered_since from customers";

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
            Adress
        </div>
        <div class='cell'>
            Registered Since
        </div>
    </div>";

while($row) {
echo "<div class='row'>"; 
echo "<div class='cell'> $row->name </div>";
echo "<div class='cell'> $row->surname </div>";
echo "<div class='cell'> $row->adress </div>";
echo "<div class='cell'> $row->registered_since</div>"; 
echo "</div>";
$row = pg_fetch_object($result);
}
pg_free_result($result);
pg_close($dbconn);
?>