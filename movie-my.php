<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moje filmy</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    <p>
        Moje filmy:<br>
        <?php
            session_start();
            $sql = "SELECT title, content, posted_id FROM `movies` WHERE posted_id = ".$_SESSION['id'];
            include('header.php');
            $row = $res->fetch_all(MYSQLI_ASSOC);
            if($row != NULL)
            {
                for($i=0;$i<mysqli_num_rows($res);$i++)
                {
                    echo"
                    <p>
                        Tytuł: <a href='movie-details.php?title=".$row[$i]['title']."'>".$row[$i]['title']."<a/>, opis: ".$row[$i]['content']."
                    </p>";
                }
            }
        ?>
    </p>
</body>
</html>