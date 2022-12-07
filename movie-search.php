<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wyszukaj film</title>
</head>
<body>
    <?php
        if(isset($_GET['title']))
        {
            $sql = "SELECT title, username FROM `movies` JOIN users ON users.id = posted_id WHERE title = '".$_GET['title']."'";
            include 'header.php';
            echo "
            <p>
                Tytuł: <a href='movie-details.php?title=".$_GET['title']."'>".$row[0]['title']."</a>, właściciel: ".$row[0]['username']."
            </p>
            ";
        }
    ?>
</body>
</html>