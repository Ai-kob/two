<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html rang ="ja">
<head>
<meta charset="UTF-8">
<title>入力完了</title>
</head>
<body>

<?php
$dsn = 'mysql:dbname=phpkiso;host=localhost';
$user = 'root';
$password = '';
$dbh =new PDO($dsn,$user,$password);
$dbh -> query('SET NAMES utf8');
    
$nickname = $_POST['nickname'];
$memo = $_POST['memo'];
    
$nickname = htmlspecialchars($nickname);
$memo = htmlspecialchars($memo);
    
    print $nickname.'様<br>';
    print 'メモの登録が完了しました！<br>';
    print '『'.$memo.'』';
    
$sql = 'INSERT INTO memo(nickname,memo) VALUES("'.$nickname.'","'.$memo.'")';
$stmt = $dbh -> prepare($sql);
$stmt -> execute();
    
$dbh = null;
?>
</body>
</html>

