<!DOCTYPE html>
<html lang="pl">

<head>
	<title>Dane</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
//Uzupełnij string połączeniowy swoimi danymi
$constr="host=localhost user=s45601 password=f5QZWqcn7";
$conn=pg_connect($constr);
if (!$conn ){
     print "Błąd: nie udało się połączyć z bazą<br>" ;
     exit;
 };
$sql="SELECT idfilmu, idzamowienia,imie,nazwisko,email,ilosc,wybranadata, komentarz, rodzajbiletu, jedzenie FROM zamowienia;";



$wynik=pg_query($conn,$sql);

if (!$wynik) { 
		print "błąd w dostępie do tabeli zamowienia";
		exit;
	}

$lPoz=pg_NumRows($wynik);

echo "<h1>Lista rezerwacji</h1>";
echo "<table><tr><td>Id Zamówienia</td><td>Id Filmu</td><td>Imię</td><td>Nazwisko</td><td>Email</td><td>Ilość biletów</td><td>Data Seansu</td><td>Rodzaj biletu</td><td>Komentarz</td></tr>";

//pobieraj i wyświetlaj kolejne wiersze tabeli wynikowej

for ($i=0; $i<$lPoz; $i++){
  	$wiersz= pg_fetch_array($wynik, $i); 
  	echo "<tr><td>".$wiersz['idzamowienia']."</td><td>".$wiersz['idfilmu']."</td><td>".$wiersz['imie']."</td><td>".$wiersz['nazwisko']."</td><td>".$wiersz['email']."</td><td>".$wiersz['ilosc']."</td><td>".$wiersz['wybranadata']."</td><td>".$wiersz['rodzajbiletu']."</td><td>".$wiersz['komentarz']."</td></tr>"; 
}

echo "</table>";

?>
<div>
	<form name="test" action="test.php" method="post">
	<label>Szukaj rezerwacji po id zamówienia</label>
	<input type="text" name="idzamowienia">
	<button name="submit" type="submit">Wyślij</button>
	</form>
</div>
</body>
	
</html>