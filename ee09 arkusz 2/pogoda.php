<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prognoza pogody Wrocław</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div class="header">
        <div class="lewy-header">
            <img src="logo.png" alt="meteo">
        </div>
        <div class="srodek-header">
            <h1>Prognoza dla Wrocławia</h1>
        </div>
        <div class="prawy-header">
            <p>maj, 2019 r.</p>
        </div>
    </div>
    <main>
        <table>
            <tr>
                <th>DATA</th>
                <th>TEMPERATURA W NOCY</th>
                <th>TEMPERATURA W DZIEN</th>
                <th>OPADY [mm/h]</th>
                <th>CISNIENIE [hPa]</th>
            </tr>
            <?php 
                $conn = mysqli_connect("localhost", "root", "", "prognoza") or die("connection failed");
                $query = "SELECT * FROM `pogoda` WHERE miasta_id=1 ORDER BY data_prognozy ASC";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>" . $row["data_prognozy"] . "</td><td>" . $row["temperatura_noc"] . "</td><td>" . $row["temperatura_dzien"] . "</td><td>" . $row["opady"] . "</td><td>" . $row["cisnienie"] . "</td></tr>";
                }

                mysqli_close($conn);
            ?>
        </table>
    </main>
    <div class="lewy">
        <img src="obraz.jpg" alt="Polska, Wroclaw">
    </div>
    <div class="prawy">
        <a href="./zapytania.txt">Pobierz kwerendy</a>
    </div>
    <footer>
        <p>Strone wykonal: 029293823902</p>
    </footer>
</body>
</html>