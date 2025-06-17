<?php

require_once "db.php";

$id = $_GET['id'] ?? null;
$row = find("files", $id);

del('files', $id);
header("location:manage.php?msg=檔案".$row['name']."刪除成功");
?>