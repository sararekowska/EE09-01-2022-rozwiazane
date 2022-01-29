<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div id="container">
        <div id="baner1">
            <h1>Nasze osiedle</h1>
        </div>
        <div id="baner2">

            <?php
            $conn=mysqli_connect('localhost','root','','portal');

            $query="SELECT COUNT(*) FROM dane";
            $result=mysqli_query($conn,$query);

            while($row=mysqli_fetch_assoc($result)){
                echo "<h5>Liczba użytkowników portalu:" . $row['COUNT(*)'] . "</h5>";
            }
            ?>

        </div>
    </div>
    <div id="container_2">
        <div id="lewy">
            <h3>Logowanie</h3>
            <form method="post">
                login:<br>
                <input type="text" name="login"><br>
                hasło:<br>
                <input type="password" name="haslo"><br>
                <input type="submit" value="Zaloguj" name="btn">
            </form>
        </div>
        <div id="prawy">
            <h3>Wizytówka</h3>
           
                <?php

                if(!empty($_POST['login']) && !empty($_POST['haslo'])){

                    $query1="SELECT haslo from uzytkownicy where login=\"{$_POST['login']}\"";
                    $result1=mysqli_query($conn,$query1);

                    if(mysqli_num_rows($result1)==0){
                        echo "login nie istnieje";
                    }
                    else{
                        $pass=$_POST['haslo'];
                        $pass=sha1($pass);
                        $login=$_POST['login'];

                        if(mysqli_num_rows($result1)==1)
                        {
                            while($row=mysqli_fetch_assoc($result1)){
                                if($pass==$row['haslo']){

                                    $query2="SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy JOIN dane ON dane.id=uzytkownicy.id WHERE uzytkownicy.login=\"{$login}\"";
                                    $result2=mysqli_query($conn,$query2);

                                    while($row=mysqli_fetch_assoc($result2)){
                                        $wiek=2022-$row['rok_urodz'];
                                        echo "<div id='wizytowka'>";
                                        echo "<img src=\"{$row['zdjecie']}\" alt='osoba'>";
                                        echo "<h4>{$row['login']} ({$wiek})</h4>";
                                        echo "<p>hobby: {$row['hobby']}</p>";
                                        echo "<h1><img src='icon-on.png'>{$row['przyjaciol']}</h1>";
                                        echo "<a href='dane.html'><button>Więcej informacji</button></a>";
                                        echo "</div>";
                                    }


                                }
                                else
                                echo "hasło nieprawidłowe";
                            }
                        }
                    }





                }


                mysqli_close($conn);
                ?>
            
        </div>
    </div>
    <div id="stopka">
        Stronę wykonał: 00000000000
    </div>
</body>
</html>