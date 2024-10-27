<!DOCTYPE html>
<html>
    <head>
        <title>PHP, MySQL and JavaScript</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <?php
            require_once 'login.php';

            try {
                $pdo = new PDO($attr, $user, $pass, $opts);
            } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), (int) $e->getCode());
            }

            $user = mysql_fix_string($pdo, $_POST['user']);
            $pass = mysql_fix_string($pdo, $_POST['pass']);
            $query = "SELECT * FROM users WHERE user=$user AND pass=$pass";

            // Etc...

            function mysql_fix_string($pdo, $string) {
                return $pdo->quote($string);
            }
            ?>
        </div>
    </body>
</html>
