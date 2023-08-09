<?php
require('dbconnect.php');
$stmt = $db->prepare('update todos set todo=? where id=?');
if(!$stmt){
    echo $db->error;
}
$todo = filter_input(INPUT_POST, 'todo', FILTER_SANITIZE_SPECIAL_CHARS);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$stmt->bind_param('si',$todo,$id);
$success = $stmt->execute();
if($success){
    header('Location: index.php');
}else{
 echo $db->error;
}
?>