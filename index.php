<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>公司內部檔案管理系統</title>
    <style>
        body {
            font-family: "Segoe UI", "Microsoft JhengHei", sans-serif;
            background-color: #f1f3f6;
            color: #333;
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
            font-size: 1.6rem;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .container {
            flex: 1;
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }

        .intro {
            text-align: center;
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: 20px;
        }

        a.button {
            display: block;
            background-color: #34495e;
            color: white;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            font-size: 1.1rem;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #1abc9c;
        }

        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 0.9rem;
        }

        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 20px;
            }

            a.button {
                font-size: 1rem;
                padding: 12px;
            }

            .intro {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <header>公司內部檔案管理系統</header>

    <div class="container">
        <div class="intro">
            歡迎使用公司內部檔案管理系統。<br />
            您可以上傳、管理各類型文件，請選擇功能進行操作。
        </div>

        <div class="btn-group">
            <a href="./upload.php" class="button">📤 上傳檔案</a>
            <a href="./manage.php" class="button">📁 檔案管理</a>
        </div>
    </div>

    <footer>
        © 2025 公司名稱 | 檔案管理系統 v1.0 | 僅供內部使用
    </footer>
</body>

</html>