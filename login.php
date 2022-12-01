<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <?php
    if(isset($_POST['login']) && isset($_POST['pass']))
    {
        $con = new mysqli("localhost","root","","mydb");
        $sql = "SELECT id, username, is_admin, password FROM users";
        $res = $con->query($sql);
        $row = $res->fetch_all(MYSQLI_ASSOC);

        for($i=0;$i<count($row);$i++)
        {
            if($_POST['login']==$row[$i]['username'] && $_POST['pass']==$row[$i]['password'])
            {
                session_start();
                $_SESSION['id'] = $row[$i]['id'];
                header('location: index.php');
            }
        }
        $con->close();
    }
    ?>
    <form method="POST">
        Login:
        <input type="text" name="login"><br>
        Hasło:
        <input type="password" name="pass"><br>
        <input type="submit" value="Zatwierdź">
    </form>
</body>

</html>