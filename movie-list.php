<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista filmów</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    <p>
        Lista filmów:
        <?php
        session_start();
        $x = "funk('all')";
        $y = "funk('accepted')";
        $z = "funk('unaccepted')";
        if(isset($_SESSION['admin']))
        echo"
        <script>
        function funk(wejscie)
        {
            if(wejscie=='accepted')
            {
                document.getElementById('a').style.display = 'inherit';
                document.getElementById('b').style.display = 'none';
            }
            else if(wejscie=='unaccepted')
            {
                document.getElementById('a').style.display = 'none';
                document.getElementById('b').style.display = 'inherit';
            }
            else
            {
                document.getElementById('a').style.display = 'inherit';
                document.getElementById('b').style.display = 'inherit';
            }
        }
        </script>
        <br><input type='button' onclick=$x value='Wszystkie filmy'>
        <br><input type='button' onclick=$y value='Zatwierdzone filmy'>
        <br><input type='button' onclick=$z value='Niezatwierdzone filmy'>
        ";
        ?>
        <?php
            $sql = "SELECT title, content, approved_by, username FROM `users` RIGHT JOIN `movies` ON users.id = approved_by";
            include('header.php');
            $row = $res->fetch_all(MYSQLI_ASSOC);
            if($row != NULL)
            {
                for($i=0;$i<mysqli_num_rows($res);$i++)
                {
                    if($row[$i]['approved_by'])
                    echo"
                    <p id='a'>
                        Tytuł: <a href='movie-details.php?title=".$row[$i]['title']."'>".$row[$i]['title']."<a/>, zatwierdzone przez: ".$row[$i]['username']."
                    </p>";
                    elseif(isset($_SESSION['admin']))
                    echo"
                    <p id='b'>
                        Tytuł: <a href='movie-details.php?title=".$row[$i]['title']."'>".$row[$i]['title']."<a/>, zatwierdzone: nie
                    </p>";
                }
            }
        ?>
    </p>
</body>
</html>