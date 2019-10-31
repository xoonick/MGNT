<!DOCTYPE html>
<script>
</script>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Index Page</title>

        <?php
        require_once('Backend/DB_Anbindung.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(isset($_POST['login'])) {
            $table = 'user';
            $checked = checkLogin($table, $username, $password);

            if($checked === true) {
                header('Location: Frontend/LoginGUI.php');
            } else {
                echo 'Die Anmeldedaten sind falsch';
            }
        }
        ?>

    </head>
    <body>
        <form action="" method="post">
            <p>Ihr Username: <input type="text" name="username" /></p>
            <p>Ihr Passwort: <input type="password" name="password" /></p>
            <p><input type="submit" name="login" /></p>
        </form>
    </body>
</html>