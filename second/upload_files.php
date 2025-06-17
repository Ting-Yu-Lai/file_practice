<?php
print_r($_FILES);
echo "<br>";
print_r($_POST);
// Array ( [name] => Array ( [name] => 00.png [full_path] => 00.png [type] => image/png [tmp_name] => C:\xampp\tmp\phpF274.tmp [error] => 0 [size] => 452842 ) )
// Array ( [type] => image [description] => 00 )
require_once('./db.php');

if(!empty($_FILES['name']['tmp_name'])) {
    $name = $_FILES['name']['name'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $tmp_name = $_FILES['name']['tmp_name'];

    move_uploaded_file($tmp_name, "./files/. $name");
    $data = ['name'=> $name, 'type'=> $type, 'description'=> $description];
    insert('files', $data);
    header("location: ./manage.php?msg=上傳成功");
}
?>


