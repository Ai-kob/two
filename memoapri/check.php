<!DOCTYPE HTML>
<html rang ="ja">
<head>
<meta charset ="UTF-8">
<title>ようこそ</title>
</head>
<body>    

<?php
$nickname = $_POST['nickname'];
$memo =$_POST['memo'];
    
$nickname = htmlspecialchars($nickname);
$memo = htmlspecialchars($memo);
    
    if($nickname ===''){
        print 'ニックネームが入力されていません。';
    }else{        
    print 'ようこそ!<br>';
    print $nickname;
    print ' 様<br>';
    }
    if($memo ===''){
        print'メモが入力されていません。';
    }else{
    print 'メモ『';
    print $memo;
    print '』<br>';
    }
    
if($nickname ==='' || $memo ===''){
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
}else{
    print '<form method="post" action="thanks.php">';
    print '<input name="nickname" type="hidden" value="'.$nickname.'">';
    print '<input name="memo" type="hidden" value="'.$memo.'">';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="ＯＫ">';
    print '</form>';
}

?>

</body>
</html>