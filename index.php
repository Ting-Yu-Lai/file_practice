<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>公司內部檔案管理系統</title>
  <style>
    /* 整體背景與字型設定 */
    body {
      font-family: "Segoe UI", "Microsoft JhengHei", sans-serif;
      background-color: #f1f3f6;
      color: #333;
      margin: 0;
      padding: 0;
    }

    /* 頁首標題樣式 */
    header {
      background-color: #2c3e50;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 1.6rem;
      font-weight: bold;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    /* 主體容器 */
    .container {
      max-width: 600px;
      margin: 50px auto;
      background-color: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .btn-group {
      display: flex;
      flex-direction: column;
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

    /* RWD 手機適配 */
    @media (max-width: 600px) {
      .container {
        margin: 20px;
        padding: 20px;
      }

      a.button {
        font-size: 1rem;
        padding: 12px;
      }
    }
  </style>
</head>
<body>
  <header>公司內部檔案管理系統</header>
  <div class="container">
    <div class="btn-group">
      <a href="./upload.php" class="button">📤 上傳檔案</a>
      <a href="./manage.php" class="button">📁 檔案管理</a>
    </div>
  </div>
</body>
</html>
