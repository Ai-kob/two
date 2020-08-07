<!DOCTYPE html>
<html rang ="ja">
    <head>
        <meta charset ="UTF-8">
        <title>お疲れさま</title>
    </head>
    <body>
<?php
$filename = 'nikki.text';
$nikki = $_POST['nikki'];
$error = [];
$log = date('y年m月d日 H:i:s') ;
$pattern = "^(\s|　)+$";

if($nikki === '' || mb_ereg_match($pattern,$nikki)) {
    $error[] = 'エラー：日記を入力してね！';
}elseif (mb_strlen($nikki) > 100)  {
    $error[] = 'エラー：日記は１００文字以内で入力してね！';
}else{
    print '日記の入力が終わりました！';
    print '今日のおまけは↓↓';
}
if(!empty($error)) {
    foreach($error as $value) {
        print $value;
    }
}
if (count($error) === 0)  {
    if (($fp = fopen($filename, 'a' )) !== FALSE)  {
       if (fwrite($fp,$nikki) === FALSE)  {
            print 'ファイル書き込み失敗:  ' . $filename;
        } 
        fclose($fp);
    }
$nikki_log = " $log  \n" ;
    if (($fp = fopen($filename, 'a' )) !== FALSE)  {
        if (fwrite($fp, $nikki_log) === FALSE)  {
            print 'ファイル書き込み失敗:  ' . $filename;
        }
        fclose($fp) ;
    }  
}

$data = [] ;

if (is_readable($filename) === TRUE)  {
    if (($fp = fopen($filename, 'r' )) !== FALSE)  {
        while (($tmp = fgets($fp)) !== FALSE)  {
            $data[] = htmlspecialchars($tmp, ENT_QUOTES, 'UTF-8') ;
        }
        fclose($fp) ;
    }
} else {
    $data[] = 'ファイルがありません' ;
}
$image_rand = array(
    '<img src="ageha.png">',
    '<img src="monshiro.png">',
    '<img src="kokuwa.png">',
    '<img src="nokogiri.ong">',
    '<img src="kabuto.png">',
    '<img src="ichigogori.png">',
    '<img src="burugoori.png">',);
if(count($error)=== 0) {
    $image_rand = $image_rand[mt_rand(0, count($image_rand)-1)];
    print $image_rand;
}
?>
    </body>    
</html>
