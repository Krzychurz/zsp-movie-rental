<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wyszukaj film</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    <?php
        if(isset($_GET['title']))
        {
            $sql = "SELECT title, username, approved_by FROM `movies` JOIN users ON users.id = posted_id WHERE title LIKE '%".$_GET['title']."%'";
            $con = new mysqli("localhost","root","","mydb");
            $res = $con->query($sql);
            $row = $res->fetch_assoc();
            if($row != NULL && $row['approved_by'] != NULL)
            {
                echo "
                <p>
                    Tytuł: <a href='movie-details.php?title=".$_GET['title']."'>".$row['title']."</a>, właściciel: ".$row['username']."
                </p>
                ";
            }
            else
            {
                echo"Nie znaleziono filmu";
            }
        }
    ?>
</body>
</html>