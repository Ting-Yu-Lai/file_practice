<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>上傳檔案 - 公司內部系統</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", "Microsoft JhengHei", sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #34495e;
            padding: 10px 20px;
        }

        nav a {
            color: #ecf0f1;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            flex: 1;
            max-width: 900px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        #More {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            margin-bottom: 20px;
        }

        #More:hover {
            background-color: #2980b9;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 20px;
            background-color: #fafafa;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        label {
            font-weight: bold;
        }

        input[type="file"],
        select,
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        textarea {
            resize: vertical;
            min-height: 60px;
        }

        .submit-btn {
            align-self: flex-start;
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #1e8449;
        }

        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 0.9rem;
            border-top: 1px solid #ddd;
        }

        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 20px;
            }

            nav a {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>公司內部檔案管理系統</h1>
    </header>

    <nav>
        <a href="./upload.php">📤 上傳檔案</a>
        <a href="./manage.php">📁 檔案管理</a>
    </nav>

    <div class="container">
        <button id="More">➕ 再加一筆</button>
        <form action="./upload_file.php" method="post" enctype="multipart/form-data">
            <div id="uploads">
                <div class="form-group">
                    <label for="name">選擇檔案：</label>
                    <input type="file" name="name[]" required>
                    <label for="type">檔案類型：</label>
                    <select name="type[]">
                        <option value="photo">📷 照片</option>
                        <option value="video">🎥 影片</option>
                        <option value="music">🎵 音樂</option>
                        <option value="document">📄 文件</option>
                    </select>
                    <label for="description">檔案描述：</label>
                    <textarea name="description[]" placeholder="請輸入檔案內容說明..."></textarea>
                </div>
            </div>
            <button type="submit" class="submit-btn">📤 送出</button>
        </form>
    </div>

    <footer>
        © 2025 公司名稱 | 檔案管理系統 v1.0 | 僅供內部使用
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $("#More").on("click", function() {
            let formGroup = `
        <div class="form-group">
          <label for="name">選擇檔案：</label>
          <input type="file" name="name[]" required>
          <label for="type">檔案類型：</label>
          <select name="type[]">
            <option value="photo">📷 照片</option>
            <option value="video">🎥 影片</option>
            <option value="music">🎵 音樂</option>
            <option value="document">📄 文件</option>
          </select>
          <label for="description">檔案描述：</label>
          <textarea name="description[]" placeholder="請輸入檔案內容說明..."></textarea>
        </div>`;
            $("#uploads").append(formGroup);
        });
    </script>
</body>

</html>