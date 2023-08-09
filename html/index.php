<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO-app</title>
</head>
<body>
    <!--入力/送信画面-->
   <h1>TODO</h1>
   <form action="todo_create.php" method="post">
   <input type="text" name="todo">
   <button type="submit">追加</button>
   </form>

   <?php
   #DB接続
   require('dbconnect.php');
   $success = $db;
   if(!$success){
    echo $db->error;}
   ?>

   <?php
   #todoリスト一覧表示
   $todos = $db->query('select * from todos order by id desc');
   if(!$todos){
    echo $db->error;
    }
    while ($todo = $todos->fetch_assoc()):?>
    <ul>
        <li><?php echo htmlspecialchars($todo["todo"]);?>
            <a href="update.php?=id<?php echo $todo["id"];?>">編集</a>
            <a href="delete.php?=id<?php echo $todo["id"];?>">削除</a>
        </li>
    </ul>
    <?php endwhile; ?>
</body>
</html>