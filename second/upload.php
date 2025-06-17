<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>上傳檔案</title>
</head>

<body>
    <form action="./upload_files.php" method="post" enctype="multipart/form-data">
    <label for="name">選擇檔案:</label>
    <input type="file" name="name" id="name" required>
    <select name="type" id="type">
        <option value="image">照片</option>
        <option value="video">影片</option>
        <option value="music">音樂</option>
        <option value="document">文件</option>
    </select>
    <textarea name="description" id="description"></textarea>
    <button type="submit">上傳</button>
    </form>
</body>

</html>