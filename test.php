<!DOCTYPE html>
<html lang="pl">

<head>
  <title>Dane</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php

$constr="host=localhost user=s45601  password=f5QZWqcn7";
$conn=pg_connect($constr);
if (!$conn)
 {
     print "Błąd: nie udało się połączyć z bazą<br>" ;
     exit;
 };

$sql1="SELECT idfilmu, idzamowienia,imie,nazwisko,email,ilosc,wybranadata, komentarz, rodzajbiletu, jedzenie FROM zamowienia WHERE idzamowienia=".$_POST['idzamowienia'].";";




$wynik1=pg_query($conn,$sql1);

if (!$wynik1) { 
        print "błąd w dostępie do tabeli zamowienia";
        exit;
    }

$lPoz=pg_NumRows($wynik1);


echo "<h1>Wyszukałeś id zamówienia ".$_POST['idzamowienia']."</h1>";
echo "<table><tr><td>Id Zamówienia</td><td>Id Filmu</td><td>Imię</td><td>Nazwisko</td><td>Email</td><td>Ilość biletów</td><td>Data Seansu</td><td>Rodzaj biletu</td><td>Komentarz</td></tr>";


for ($i=0; $i<$lPoz; $i++){
      $wiersz= pg_fetch_array($wynik1, $i); 
      echo "<tr><td>".$wiersz['idzamowienia']."</td><td>".$wiersz['idfilmu']."</td><td>".$wiersz['imie']."</td><td>".$wiersz['nazwisko']."</td><td>".$wiersz['email']."</td><td>".$wiersz['ilosc']."</td><td>".$wiersz['wybranadata']."</td><td>".$wiersz['rodzajbiletu']."</td><td>".$wiersz['komentarz']."</td></tr>";
    }

echo "</table>";


pg_close($conn);
?>

</body>
</html>