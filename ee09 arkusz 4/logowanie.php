<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl4.css">
    <title>Forum o psach</title>
</head>

<body>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <main>  
    <div class="main-left">
        <img src="obraz.jpg" alt="foksterier">
    </div>
    <div class='main-right-up'>
        <h2>Zapisz się</h2>
        <form method='post'>
            login:&nbsp;<input name='login'>
            <br>
            hasło:&nbsp;<input type="password" name='haslo'>
            <br>
            powtórz hasło:&nbsp;<input type='password' name='haslo2'>
            <br>
            <input type="submit" value="Zapisz" name="zapisz">
        </form>
            <?php

                $conn = mysqli_connect('localhost', 'root', '', 'psy') or die("connection error");

                if(isset($_POST['zapisz']))
                {
                    if(!empty($_POST['login']) && !empty($_POST['haslo']) && !empty($_POST['haslo2']))
                {
                    $login=$_POST['login'];
                    $haslo=$_POST['haslo'];
                    $haslo2=$_POST['haslo2'];
                    $query = "SELECT login FROM `uzytkownicy` WHERE login='$login'";
                    $result=mysqli_query($conn,$query);

                    if(mysqli_num_rows($result) >=1)
                    {
                        echo "<p>Login występuje w bazie danych, konto nie zostało dodane</p>";
                    }
                    else
                    {
                        if($haslo==$haslo2)
                        {
                            $hash = sha1($haslo);
                            $query = "INSERT INTO uzytkownicy (login, haslo) VALUES ('" . $login . "','" . $hash . "')";
                            if (mysqli_query($conn, $query)) {
                                echo "<p>Konto zostało dodane</p>";
                            }
                        }
                        else
                        {
                            echo "<p>Hasła nie są takie same, konto nie zostało dodane</p>";
                        }
                    }
                }
                else
                {
                    echo "<p>Wypełnij wszystkie pola</p>";
                }
                }

                mysqli_close($conn);
            ?>
    </div>
    <div class='main-right-down'>
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </div>
    </main>
    <footer>Stronę wykonał: 000000000000</footer>
</body>
</html>
