<?php
include('laczenie.php');
function odbierz_form()
 
	{
	
		// Wyrażenie regularne dla seansu
		$select=$_POST['select'];
			
		if ($select=="" || $select==null) 
		{	
			echo "<p>Błąd: Nie wybrałeś seansu.</p>";
			return;	
		}
		// Wyrażenie regularne dla imienia i nazwiska
		$imie=$_POST['imie'];
		if(!isset($imie))
		{
			echo "<p>Błąd: Proszę wpisać imię.</p>";
		  return;	
		}
		$nazwisko=$_POST['nazwisko'];
		if(!isset($nazwisko))
		{
			echo "<p>Błąd: Proszę wpisać nazwisko.</p>";
		  return;	
		}
 
		if(!preg_match('/^[A-ZŁŻ]{1}[a-ząśćźżółń]{2,}$/',$imie))
		{
			echo '<p>Zapisz poprawnie imię.</p>';
			return;
		}

		if(!preg_match('/^[A-ZŁŻ]{1}[a-ząśćźżółń]{2,}$/',$nazwisko))
		{
			echo '<p>Zapisz poprawnie nazwisko. </p>';
			return;
		}
 
		// Wyrażenie regularne dla email
 
		$email=$_POST['email'];
		if(!isset($email))
		{	
			echo "<p>Błąd: Proszę wpisać email.</p>";
		  return;	
		}		
		if (!preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',$email))
		{
			echo '<p>Wpisz poprawny adres email</p>';
			return;
		}

		// Wyrazenie regularne dla rodzaju biletu
		$bilet=$_POST['bilet'];
		if (!isset($bilet))
		{
		echo "<p> Błąd: Nie wybrałeś rodzaju biletu </p>";
		return;
		}

		// Wyrazenie regularne dla ilości biletów
		$ileBiletow=$_POST['ileBiletow'];
		if(!isset($ileBiletow))
		{
		echo "<p>Błąd: Proszę podać liczbę biletów</p>";
		return;	
		}
		if (!preg_match('/^[1-9][0-9]{0,1}$/',$ileBiletow) )
		{
			echo "<p>Błąd: Puste pole liczba biletów lub nieprawidłowy format liczby biletów. Można zakupić maksymalnie 99 biletów </p>";
		return;
		}


		// Wyrażenie regularne dla daty seansu
		$date=$_POST['date'];
		if (empty($date))	{
    	echo 'Błąd: Pole data seansu nie może być puste.';
    	return;
   		}


   		$dzisiejsza_data = date("Y-m-d");

   		if ($_POST["date"] <= $dzisiejsza_data)
   		{
   		echo 'Błąd: Nie można dokonać rezerwacji na dzisiaj lub na datę w przeszłości. Wybierz inną datę.';
    	return;
   		}


	// Wyrazenie regularne dla komentarza
		$komentarz=$_POST['komentarz'];
		if (!isset($komentarz))
		{
		echo "<p> Błąd: Wybierz czy chcesz dodać komentarz </p>";
		return;
		}
 
 
	$conn=login();
	if (!$conn )
	 {
 		print "Błąd: nie udało się połączyć z bazą<br>" ;
 		exit;
 	};	
 
	$sql="INSERT INTO zamowienia (idfilmu, imie, nazwisko, email, ilosc, wybranadata, komentarz, rodzajbiletu)
	VALUES('".$_POST["select"]."','".$_POST["imie"]."','".$_POST["nazwisko"]."','".$_POST["email"]."','".$_POST["ileBiletow"]."','".$_POST["date"]."','".$_POST["komentarzTak"]."','".$_POST["bilet"]."')";
 
	$wynik=pg_query($conn,$sql);
	if (!$wynik)
	{
	print "błąd w dostępie do tabeli zamowienia";
	exit;
	}
 
	echo'<p>Formularz został zapisany</p>';
 
 
	}
 
 
	odbierz_form()
 
?>