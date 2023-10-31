<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <title>Liste</title>
</head>
<body>
   <h1>Liste</h1>
   <table>
    <tbody>
   <?php
    echo '<tr><td>ID</td><td>NOM</td></tr>';
    $pdo = null;
    try {
        echo 'Mon nom d\'utilisateur est ' .getenv('MYSQL_USER') . ' !';
        $pdo = new PDO("mysql:host=db;dbname=".$_ENV['BDD_DATABASE']."", $_ENV['BDD_USER'], $_ENV['BDD_PASSWORD']);
    } catch (Exception $e) {
        echo $e;
    }
    $res = array();
    if (isset($pdo)) {
        $stmt = $pdo->query("SELECT * FROM Data ORDER BY nom");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            echo '<tr><td>', $row['id'], '</td><td>', $row['nom'], '</td></tr>';
    } else {
        echo '<tr><td>0</td><td>Aucun</td></tr>';
    }
   ?>
     </tbody>
    </table>
</body> 
</html>
