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
    // 檢查是否有上傳檔案
    print_r($_POST);
    // echo "<br>";
    print_r($_FILES);
    ?>
    <?php
    if (!empty($_FILES['name']['tmp_name'][0])) {

        if (isset($_FILES['name'])) {
            $name = $_FILES['name']['name'];
            $type = $_POST['type'];
            $description = $_POST['description'];
            $tmp_name = $_FILES['name']['tmp_name'];
            move_uploaded_file($tmp_name, './files/' . $name);
            $sql = "INSERT INTO files (`name`, `type`, `description`) VALUES ('$name', '$type', '$description')";
            $pdo->exec($sql);
        }
        // foreach ($_FILES['name']['tmp_name'] as $key => $tmp_name) {
        //     $name = $_FILES['name']['name'];
        //     $type = $_POST['type'];
        //     $description = $_POST['description'];

        //     move_uploaded_file($tmp_name, './files/' . $name);
        //     // $sql = "INSERT INTO files (`name`, `type`, `descrioption`) VALUES ('$name', '$type', '$description')";
        //     // $pdo->exec($sql);
        // }
    }

    header("Location: ./manage.php?msg=上傳成功");
    ?>

</body>

</html>