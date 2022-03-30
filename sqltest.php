<?php
    require_once 'login.php';

    try {
        $pdo = new PDO($attr,$user,$pass,$opts);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(),$e->getCode());
    }

    if(isset($_POST['delete'])&& isset($_POST['isbn'])){
        $isbn=get_post($pdo,'isbn');
        $query ="delete from classics where isbn=$isbn";
        $result=$pdo->query($query);
    }
    if(isset($_POST['author'])&& isset($_POST['title'])&& isset($_POST['category'])&& isset($_POST['year']) && isset($_POST['isbn'])){
        $author = get_post($pdo,'author');
        $title= get_post($pdo, 'title');
        $category = get_post($pdo, 'category');
        $year = get_post($pdo,'year');
        $isbn = get_post($pdo,'isbn');

        $query = "insert into classics values"."($author,$title,$category,$year,$isbn)";
        $result=$pdo->query($query);
    }
    echo <<<_END
    <form action='sqltest.php' method="post">
    <pre>
    Author <input type="text" name="author">
    Title <input type="text" name="title">
    Category <input type="text" name="category">
    Year <input type="text" name="year">
    isbn <input type="text" name="isbn">
    <input type="submit" value="ADD RECORD">
    </pre>
    </form>
    
    
    _END;
    $query = "select * from classics";
    $result = $pdo->query($query);
    while($row =$result->fetch()){
        $r0=htmlspecialchars($row['author']);
        $r1=htmlspecialchars($row['title']);
        $r2=htmlspecialchars($row['category']);
        $r3=htmlspecialchars($row['year']);
        $r4=htmlspecialchars($row['isbn']);

        echo <<<_END
        <pre>
        Author $r0
        title $r1
        category $r2
        year $r3;
        isbn $r4;
        </pre>
        <form action='sqltest.php' method='post'>
        <input type='hidden' name='delete' value='yes'>
        <input type='hidden' name='isbn' value='$r4'>
        <input type="submit" value='DELETE RECORD'>
        
               
        </form>
        
        _END;

        
    }
    function get_post($pdo,$var)
    {
         return $pdo->quote($_POST[$var]);
    }





















?>

