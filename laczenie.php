<?php
function login()
{
$constr="host=localhost user=s45601 password=f5QZWqcn7";
$conn=pg_connect($constr);
if (!$conn )
 {
     print "Błąd: nie udało się połączyć z bazą<br>" ;
     exit;
 };
return $conn;
}
?>