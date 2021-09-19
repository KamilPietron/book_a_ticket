<?php
function login()
{
$constr="host=localhost user={username} password={password}";
$conn=pg_connect($constr);
if (!$conn )
 {
     print "Błąd: nie udało się połączyć z bazą<br>" ;
     exit;
 };
return $conn;
}
?>