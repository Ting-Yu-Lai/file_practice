<?php
$dsn = "mysql:host=localhost;dbname=upload_db;charset=utf8";
$pdo = new PDO($dsn, 'root', '');

function array2sql($array) {
    $tmp = [];
    foreach ($array as $key => $value) {
        $tmp[] = "`$key`='$value;";
    }
    return $tmp;
}

function insert($table, $data) {
    global $pdo;
    $keys = array_keys($data);
    $sql = "INSERT INTO $table (`" . join("`,`", $keys) . "`) VALUES ('" . join("','", $data) . "')";
    return $pdo->exec($sql);
}


?>