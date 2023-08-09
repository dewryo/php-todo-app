<?php
require('dbconnect.php');
$stmt = $db->prepare('select * from todos where id = ?');
if(!$stmt){
    die($db->error);
}
#URLパラメータを受け取る処理
$id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($id,$todo,$created);
$result = $stmt->fetch();
if(!$result){
    die($db->error);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOedit</title>
</head>
<body>
     <!--編集/送信画面-->
   <h1>Edit</h1>
   <form action="todo_update.php" method="post">
   <input type="text" name="todo" value="<?php echo $todo; ?>">
   <input type="hidden" namne ="id" value="<?php echo $id; ?>">
   <button type="submit">編集</button>
   </form>

</body>
</html>