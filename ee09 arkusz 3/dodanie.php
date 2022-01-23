<?php
    $conn=mysqli_connect("localhost", "root", "", "ee09");
    $karetka=$_POST["karetka"];
    $ratownik1=$_POST["ratownik1"];
    $ratownik2=$_POST["ratownik2"];
    $ratownik3=$_POST["ratownik3"];
    
    $query="INSERT INTO `ratownicy`(`nrKaretki`, `ratownik1`, `ratownik2`, `ratownik3`) VALUES ($karetka,'$ratownik1','$ratownik2','$ratownik3')";
    $result=mysqli_query($conn,$query);
    
    echo "Do bazy zostało wysłane zapytanie: INSERT INTO `ratownicy`(`nrKaretki`, `ratownik1`, `ratownik2`, `ratownik3`) VALUES ($karetka,'$ratownik1','$ratownik2','$ratownik3')";
    mysqli_close($conn); 
?>