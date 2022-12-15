<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Strona główna</title>
    <link rel='stylesheet' href='style.css'>
</head>

<body>
    <?php
        $in = false;
        $sql = "SELECT id, username, is_admin, password FROM users";
        session_start();
        $con = new mysqli("localhost","root","","mydb");
        $res = $con->query($sql);
        $row=$res->fetch_all(MYSQLI_ASSOC);
        if(isset($_SESSION['id']))
        {
            echo "<p>Zalogowano jako ";
            for($i=0;$i<count($row);$i++)
            {
                if($_SESSION['id'] == $row[$i]['id'] && $row[$i]['is_admin'] == false)
                {
                    echo $row[$i]['username']."</p>";
                    $in = true;
                    echo "
                    <form method='POST'>
                        <input type='submit' value='Wyloguj' name='logout'>
                    </form>";
                    echo "
                    <form action='movie-list.php'>
                        <input type='submit' value='Lista filmów'>
                    </form>";
                    echo "
                    <form action='movie-add.php'>
                        <input type='submit' value='Dodaj film'>
                    </form>";
                    echo "
                    <form action='movie-my.php'>
                        <input type='submit' value='Moje filmy'>
                    </form>";
                }
                else if($_SESSION['id'] == $row[$i]['id'] && $row[$i]['is_admin'] == true)
                {
                    echo $row[$i]['username']."</p>";
                    $in = true;
                    echo "
                    <form method='POST'>
                        <input type='submit' value='Wyloguj' name='logout'>
                    </form>";
                    echo "
                    <form action='movie-list.php'>
                        <input type='submit' value='Lista filmów'>
                    </form>";
                    echo "
                    <form action='movie-my.php'>
                        <input type='submit' value='Moje filmy'>
                    </form>";
                }
                if(isset($_POST['logout']))
                {
                    session_destroy();
                    header("location: logout.php");
                }
                if($in)
                    break;
            }
        }
        if($in == false)
            {
                echo "<p>Genialna strona z wypożyczonymi filmami</p>";
                echo "
                <form action='login.php'>
                    <input type='submit' value='Zaloguj'>
                </form>
                <form action='register.php'>
                <input type='submit' value='Rejestruj'>
                </form>";
            }
        $con->close();
    ?>
    <form action="movie-search.php" method="GET">
        Wyszukaj film:
        <input type="text" name="title">
        <input type="submit" value="Znajdź">
    </form>
</body>

</html>