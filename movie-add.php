<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodawanie nowego filmu</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    <?php
        session_start();
        if(isset($_GET['done']))
        {
            echo "<p>Film został pomyślnie dodany</p>";
            $sql = "INSERT INTO movies VALUES (NULL, '".$_POST['name']."', '".$_POST['content']."', ".$_SESSION['id'].", NULL, NULL)";
            $con = new mysqli("localhost","root","","mydb");
            $res = $con->query($sql);
            $con->close();
            echo"
            <form action='index.php'><input type='submit' value='Powróć do menu'></form>
            ";
        }
        else if(isset($_SESSION['id']))
        {
            echo"
            <form method='POST' action='movie-add.php?done=true'>
                Podaj tytuł filmu:
                <input type='text' name='name'><br>
                Podaj opis filmu:
                <input type='text' name='content'><br>
                <input type='submit' value='Prześlij'>
            </form>";
        }
    ?>
</body>
</html>