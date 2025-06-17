<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>上傳檔案</title>
</head>

<body>
    <h1>上傳檔案</h1>
    <form action="./upload_file.php" method="post" enctype="multipart/form-data">
        <label for="name">選擇檔案:</label>
        <input type="file" name="name" id="name" required>
        <select name="type" id="type">
            <option value="photo">照片</option>
            <option value="video">影片</option>
            <option value="music">音樂</option>
            <option value="document">文件</option>
        </select>
        <br>
        <textarea name="description" id="description" placeholder="描述檔案"></textarea>
        <button type="submit">送出</button>
    </form>
</body>

</html>