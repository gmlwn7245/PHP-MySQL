<?php
    require('connect-DB.php');
    $filtered = array(
        'title'=>mysqli_real_escape_string($conn, $_POST['title']),
        'description'=>mysqli_real_escape_string($conn, $_POST['description']),'author_id'=>mysqli_real_escape_string($conn, $_POST['author_id'])
    );
    
    $sql = "
        INSERT INTO topic 
            (title, description, created, author_id) VALUES(
                '{$filtered['title']}',
                '{$filtered['description']}',
                NOW(),
                {$filtered['author_id']}
            )
    ";
    
    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo "저장하는 과정에서 문제가 발생하였습니다. 관리자에게 문의해주세요.";
        error_log(mysqli_error($conn));
    } else {
        header('Location: index.php');
    }
?>