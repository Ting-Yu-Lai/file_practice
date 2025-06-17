<?php
$dsn = "mysql:host=localhost;dbname=upload_db;charset=utf8";
$pdo = new PDO($dsn, 'root', '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM files";
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php foreach ($rows as $key => $row): ?>
        <?php
        $row['id'];
        if ($row['type'] == 'photo') {
            echo "<img src='./files/" . $row['name'] . "' alt='' style='width:50px;'>";
        } else {
            switch ($row['type']) {
                case 'document':
                    echo "<img src='icon/document.png' style='width:50px;'>";
                    break;
                case 'video':
                    echo "<img src='icon/video.png' style='width:50px;'>";
                    break;
                case 'music':
                    echo "<img src='icon/music.png' style='width:50px;'>";
                    break;
                default:
                    echo "<img src='icon/others.png' style='width:50px;'>";
            }
        }
        ?>
        <p> <?= $row['name'];?> </p>
        <p>
            <?=$row['description'];?>
        </p>
        <button type="button">edit</button>
        <button type="button">delete</button>

    <?php endforeach; ?>

</body>

</html>