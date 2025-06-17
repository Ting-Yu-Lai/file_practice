<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>上傳檔案</title>
    <style>
        .form-group {
            /* display: flex; */
        }
    </style>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>
    <h1>上傳檔案</h1>
    <button id="More">再加一筆</button>
    <form action="./upload_file.php" method="post" enctype="multipart/form-data">
        <div id="uploads">
            <div class="form-group">
                <label for="name">選擇檔案:</label>
                <input type="file" name="name[]" id="name" required>
                <select name="type[]" id="type">
                    <option value="photo">照片</option>
                    <option value="video">影片</option>
                    <option value="music">音樂</option>
                    <option value="document">文件</option>
                </select>
                <br>
                <textarea name="description[]" id="description" placeholder="描述檔案"></textarea>
                <button type="submit">送出</button>
            </div>
        </div>

    </form>

    <script>
        $("#More").on("click", function() {
                    let formgroup = `<div class="form-group">
            <label for="name">選擇檔案:</label>
            <input type="file" name="name[]" id="name" required>
            <select name="type[]" id="type">
                <option value="photo">照片</option>
                <option value="video">影片</option>
                <option value="music">音樂</option>
                <option value="document">文件</option>
            </select>
            <br>
            <textarea name="description[]" id="description" placeholder="描述檔案"></textarea>
        </div>`
            $("#uploads").append(formgroup);
            $(".form-group").removeClass("display-flex")
            $(".form-group").addClass("display-flex")
    })
    </script>
</body>

</html>