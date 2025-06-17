<?php
$dsn = "mysql:host=localhost; dbname=upload_db; charset=utf8;";
$pdo = new PDO($dsn, 'root','');

function array2sql($array) {
    $tmp = [];
    foreach ($array as $key => $value) {
        $tmp[]= "`$key`='$value'";
    }
    return $tmp;
}

function find($table,$id) {
    global $pdo;
    if (is_array($id)) {
        $tmp = array2sql($id);
        $sql = "SELECT * FROM $table WHERE". join(" AND ", $tmp);
    } else {
        $sql = "SELECT * FROM $table WHERE $id";
    }
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function update($table,$data) {
    global $pdo;
    $tmp = array2sql($data);

    $sql = "UPDATE $table SET ". join(" , ",$tmp) . "
                            WHERE `id`='{$data['id']}'";
    
    return $pdo->exec($sql);
}

function insert($table, $data) {
    global $pdo; 
    $keys = array_keys($data);

    $sql = "INSERT INTO $table (`" .join("`,`", $keys). "`) values ('" . join("','", $data)."')";
    return $pdo->exec($sql);
}

function save($table,$data) {
    if(isset($data['id'])) {
        update($table, $data);
    } else {
        insert($table, $data);
    }
}

function del($table,$id) {
    global $pdo;
    $sql = "DELETE FROM $table WHERE ";
    if(is_array($id)) {
        $tmp[] = array2sql($id);
        $sql .= join(" AND ",$tmp);
    } else {
        $sql .= "id='$id'";  
    }
    return $pdo->exec($sql);
}
?>