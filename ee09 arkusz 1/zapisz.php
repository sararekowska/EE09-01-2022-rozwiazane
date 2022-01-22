<?php 
    $conn = mysqli_connect("localhost", "root", "", "wedkowanie2") or die("connection error");
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];
    $query = "INSERT INTO `karty_wedkarskie`(`imie`, `nazwisko`, `adres`, `data_zezwolenia`, `punkty`) VALUES ('" . $imie . "','" . $nazwisko . "','" . $adres . "', NULL,NULL)";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
?>