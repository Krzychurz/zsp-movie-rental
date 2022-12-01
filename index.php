<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Strona główna</title>
</head>

<body>
    <?php
        $in = false;
        $con = new mysqli("localhost","root","","mydb");
        $sql = "SELECT id, username, is_admin, password FROM users";
        $res = $con->query($sql);
        $row = $res->fetch_all(MYSQLI_ASSOC);
        session_start();
        if(isset($_SESSION['id']))
        {
            echo "<p>Zalogowano jako ";
            for($i=0;$i<count($row);$i++)
            {
                if($_SESSION['id'] == $row[$i]['id'])
                {
                    echo $row[$i]['username']."</p>";
                    $in = true;
                }
                echo "
                <form action='".session_destroy()."'>
                    <input type='submit' value='Wyloguj'>
                </form>";
            }
        }
        if($in == false)
            {
                echo "<p>Genialna strona z wypożyczonymi filmami</p>";
                echo "
                <form action='login.php'>
                    <input type='submit' value='Zaloguj'>
                </form>";
            }
        $con->close();
    ?>
    <form action="register.php">
        <input type="submit" value="Rejestruj">
    </form>
    <form action="movie-search.php" method="GET">
        Wyszukaj film:
        <input type="text" name="tytul">
        <input type="submit" value="Znajdź">
    </form>
</body>

</html>