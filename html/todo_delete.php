<?php
require('dbconnect.php');
$stmt = $db->prepare('delete from todos where id=?');
if(!$stmt){
    echo $db->error;
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$stmt->bind_param('i',$id);
$success = $stmt->execute();
if($success){
    header('Location: index.php');
}else{
 echo $db->error;
}
?>