<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodawanie nowego filmu</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_GET['done']))
        {
            echo "<p>Film został pomyślnie dodany</p>";
        }
        else if(isset($_SESSION['id']))
        {
            echo"
            <form method='POST'>
                Podaj tytuł filmu:
                <input type='text' name='name'><br>
                Podaj opis filmu:
                <input type='text' name='content'><br>
                <input type='submit' value='Prześlij'>
            </form>";
            $sql = "INSERT INTO movies VALUES (NULL, '".$_POST['name']."', '".$_POST['content']."', ".$_SESSION['id'].", NULL, NULL)";
            include 'header.php';
            $con->close();
            header("location: movie-add.php?done=true");
        }
    ?>
</body>
</html>