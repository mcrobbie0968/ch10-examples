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

            $stmt = $pdo->prepare('INSERT INTO classics
                VALUES(:author,:title,:category,:year,:isbn)');
            $stmt->execute([
                'author' => 'Emily Brontë',
                'title' => 'Wuthering Heights',
                'category' => 'Classic Fiction',
                'year' => 1847,
                'isbn' => '9780553212587'
            ]);
            printf("%d Row inserted.\n", $stmt->rowCount());
            ?>
        </div>
    </body>
</html>
