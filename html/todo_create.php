<?php
require('dbconnect.php');
$todo = filter_input(INPUT_POST, 'todo', FILTER_SANITIZE_SPECIAL_CHARS);
$stmt = $db->prepare('INSERT INTO todos(todo) VALUES(?)');
if(!$stmt){
    die($db->error);
}
$stmt->bind_param('s',$todo);
$ret = $stmt->execute();
if($ret){
    header('Location: index.php');
}else{
    echo $db->error;

}
?>