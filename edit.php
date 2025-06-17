<?php
require_once "db.php";
$row = find('files', $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./save.php" method="post" enctype="multipart/form-data">
        <?php
        switch ($row['type']) {
            case 'photo':
                echo "<img src='./files/" . $row['name'] . "' alt=''>";
                break;
            case 'document':
                echo "<img src='./icon/document.png' alt=''>";
                break;
            case 'video':
                echo "<img src='./icon/video.png' alt=''>";
                break;
            case 'music':
                echo "<img src='./icon/music.png' alt=''>";
                break;
            default:
                echo "<img src='./icon/others.png' alt=''>";
                break;
        }
        ?>
        <label for="name">重新上傳檔案</label>
        <input type="file" name="name" id="name" required>
        <br>
        <select name="type" id="type">
            <option value="photo" <?= ($row['type']=='photo') ? 'selected' : '';?>  >照片</option>
            <option value="video" <?= ($row['type']=='video') ? 'selected' : '';?>  >影片</option>
            <option value="music" <?= ($row['type']=='music') ? 'selected' : '';?>  >音樂</option>
            <option value="document" <?= ($row['type']=='document') ? 'selected' : '';?>  >文件</option>
        </select>
        <br>
        <textarea name="description" id="description"><?= $row['description']; ?></textarea>
        <br>
        <input type="hidden" name="id" value='<?=$row['id'];?>'>
        <button type="submit">修改檔案</button>
    </form>
    
</body>

</html>