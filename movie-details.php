<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Szczegóły filmu</title>
</head>
<body>
    <?php
        if(isset($_GET['title']))
        {
            $sql = "SELECT title, content, a.username AS posted, b.username AS rented, c.username AS approved FROM `movies` LEFT JOIN users a ON posted_id = a.id LEFT JOIN users b ON rented_by = b.id LEFT JOIN users c ON approved_by = c.id WHERE title = '".$_GET['title']."'";
            include 'header.php';
            $x='tak';
            if(isset($row[0]['rented']))
                $x='nie';
            echo"
            <p>
                Tytuł: ".$row[0]['title'].", opis: ".$row[0]['content'].", właściciel: ".$row[0]['posted'].", dostępne: $x, zatwierdzone przez: ".$row[0]['approved']."
            </p>
            ";
        }
    ?>
</body>
</html>