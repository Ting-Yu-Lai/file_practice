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
    <a href="./upload.php">新增檔案</a>
    <?php
    $sql = "SELECT * FROM files";
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php
    $total_rows = $pdo->query("SELECT COUNT(*) FROM files")->fetchColumn();
    $div = 5;
    $pages = ceil($total_rows / $div);
    $now = $_GET['p'] ?? 1;
    $start = ($now - 1) * $div;
    ?>
    <div class="pages">
        <a href="?p=1">第一頁</a>
        <?php
        if ($now - 1 > 0) {
            echo "<a href='?p=" . ($now - 1) . "'> << </a>";
        } else {
            echo "<a href='#'> << </a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            echo "<a href='?p=$i'> $i </a>";
        }

        if ($now + 1 <= $pages) {
            echo "<a href='?p=" . ($now + 1) . "'> >> </a>";
        } else {
            echo "<a href='#'> >> </a>";
        }
        ?>

        <a href="?p=<?= $pages; ?>">最後頁</a>
    </div>


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
        <p> <?= $row['name']; ?> </p>
        <p>
            <?= $row['description']; ?>
        </p>
        <button type="button" onclick="location.href='edit.php?id=<?= $row['id']; ?>'">edit</button>
        <button type="button" onclick="location.href='del.php?id=<?= $row['id']; ?>'">delete</button>

    <?php endforeach; ?>

</body>

</html>