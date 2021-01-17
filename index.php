<?php
    //git에 올릴 때는 비밀번호 없애고 올리기
    $conn = mysqli_connect("localhost","root","","opentutorials");
    $sql = "SELECT * FROM topic";
    $result = mysqli_query($conn, $sql);
    $list = '';
    while($row = mysqli_fetch_array($result)){
        $list=$list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
    }
    $article = array(
        'title' => 'Welcome',
        'description' => 'Hello, Web!'
    );
    if(isset($_GET['id'])){
        $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $article['title'] = $row['title'];
        $article['description'] = $row['description'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta chraset="utf-8">
        <title>WEB</title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <ol>
            <?= $list;?>
        </ol>
        <a href = "create.php">create</a>
        <a href = "select.php">show</a>
        <h2><?=$article['title']?></h2>
        <?=$article['description']?>
    </body>
</html>