<?php
$dsn = "mysql:host=localhost;dbname=upload_db;charset=utf8";
$pdo = new PDO($dsn, 'root', '');
?>
<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <title>檔案管理系統</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: "Segoe UI", "Microsoft JhengHei", sans-serif;
      background-color: #f2f4f8;
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
      max-width: 1000px;
      margin: 30px auto;
      background-color: white;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .top-bar {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 20px;
    }

    .top-bar a {
      background-color: #3498db;
      color: white;
      padding: 10px 16px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .top-bar a:hover {
      background-color: #1abc9c;
    }

    .file-item {
      display: flex;
      align-items: flex-start;
      border-bottom: 1px solid #ddd;
      padding: 15px 0;
      gap: 20px;
    }

    .file-item img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 6px;
    }

    .file-info {
      flex: 1;
    }

    .file-info p {
      margin: 4px 0;
      color: #333;
    }

    .file-actions {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .file-actions button {
      padding: 8px 14px;
      border: none;
      border-radius: 6px;
      font-size: 0.95rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .file-actions button:first-child {
      background-color: #f39c12;
      color: white;
    }

    .file-actions button:first-child:hover {
      background-color: #e67e22;
    }

    .file-actions button:last-child {
      background-color: #e74c3c;
      color: white;
    }

    .file-actions button:last-child:hover {
      background-color: #c0392b;
    }

    .pages {
      text-align: center;
      margin-top: 30px;
    }

    .pages a {
      margin: 0 5px;
      padding: 6px 12px;
      text-decoration: none;
      background-color: #ecf0f1;
      color: #333;
      border-radius: 4px;
    }

    .pages a:hover {
      background-color: #3498db;
      color: white;
    }

    footer {
      background-color: #2c3e50;
      color: white;
      text-align: center;
      padding: 15px 0;
      font-size: 0.9rem;
    }

    @media (max-width: 768px) {
      .file-item {
        flex-direction: column;
        align-items: flex-start;
      }

      .file-actions {
        flex-direction: row;
      }
    }
  </style>
</head>

<body>
  <header>公司內部檔案管理系統 - 管理頁面</header>

  <div class="container">
    <div class="top-bar">
      <a href="./upload.php">➕ 新增檔案</a>
    </div>

    <?php
    $total_rows = $pdo->query("SELECT COUNT(*) FROM files")->fetchColumn();
    $div = 5;
    $pages = ceil($total_rows / $div);
    $now = $_GET['p'] ?? 1;
    $start = ($now - 1) * $div;

    $sql = "SELECT * FROM files ORDER BY id DESC LIMIT $start, $div";
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php foreach ($rows as $row): ?>
      <div class="file-item">
        <?php
        if ($row['type'] === 'photo') {
          echo "<img src='./files/{$row['name']}' alt='file'>";
        } else {
          $icon = match ($row['type']) {
            'document' => 'icon/document.png',
            'video' => 'icon/video.png',
            'music' => 'icon/music.png',
            default => 'icon/others.png'
          };
          echo "<img src='$icon' alt='icon'>";
        }
        ?>
        <div class="file-info">
          <p><strong><?= htmlspecialchars($row['name']) ?></strong></p>
          <p><?= nl2br(htmlspecialchars($row['description'])) ?></p>
        </div>
        <div class="file-actions">
          <button onclick="location.href='edit.php?id=<?= $row['id'] ?>'">編輯</button>
          <button onclick="if(confirm('確定刪除這筆資料？')) location.href='del.php?id=<?= $row['id'] ?>'">刪除</button>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="pages">
      <a href="?p=1">第一頁</a>
      <?php if ($now > 1): ?>
        <a href="?p=<?= $now - 1 ?>">&laquo;</a>
      <?php endif; ?>
      <?php for ($i = 1; $i <= $pages; $i++): ?>
        <a href="?p=<?= $i ?>"><?= $i ?></a>
      <?php endfor; ?>
      <?php if ($now < $pages): ?>
        <a href="?p=<?= $now + 1 ?>">&raquo;</a>
      <?php endif; ?>
      <a href="?p=<?= $pages ?>">最後頁</a>
    </div>
  </div>

  <footer>
    © 2025 公司名稱 | 檔案管理系統 v1.0 | 僅供內部使用
  </footer>
</body>

</html>
