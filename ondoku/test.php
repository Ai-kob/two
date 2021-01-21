<?php 
$class = ['かえるのぴょん' , '白い花びら ' , '発見ノートを作ろう ' , '国語辞典の引き方' , 'うめぼしの働き' , 'めだか']  ;
$filename = 'new.text' ;
$log = date('y年m月d日 H:i:s')  . "\n";
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
    if (isset($_POST['kind'] ) === TRUE)  {
        $i = $_POST['kind'] ;
    }
    if($i === 'タイトルを選んでね！') {
        $error[] =  'エラー：タイトルを選んでからgo!!を押してね' ;
    }
    if (count($error) === 0)  {
    if (($fp = fopen($filename, 'a' )) !== FALSE)  {
       if (fwrite($fp,$i) === FALSE)  {
            print 'ファイル書き込み失敗:  ' . $filename;
        } 
        fclose($fp);
    }
    if (($fp = fopen($filename, 'a' )) !== FALSE)  {
        if (fwrite($fp, $log) === FALSE)  {
            print 'ファイル書き込み失敗:  ' . $filename;
        }
        fclose($fp) ;
    }  
    }
}
$data = [];
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
?>
<!DOCTYPE html>
<html rang = "ja" >
    <head>
        <meta charset = 'UTF-8' >
        <title>ファイト！恐竜育成音読リスト！</title>
        <style>
        html {
            font-family: Meiryo;
            text-align: center;
            margin: 0 auto 0 auto;
            max-width: 960px;
        }
        h1 {
            background-color: #66cdda;
            color: #ffff00;
            border: 3px solid;
            
        }
        .kako ol {
            padding-left: 0;
	        list-style:decimal;
	        display: inline-block;
        }
        .kako li {
            text-align:left;
        }
        .error {
            color:#dc143c;
            font-size: 25px;
	        
        }
        option {
            color:#696969;
        }
        .kind {
            font-size: 20px;
        }
        .kako p {
            border-bottom: 3px dotted #66cdaa;
        }
        .count {
            color:#1e90ff;
        }
       
        </style>
    </head>
        <body>
            <div class ="error">
            <?php if (!empty($error) ) { 
		     foreach ($error as $value)  
			 print $value ; 
		     } ?>
　　　　　　</div>
            <form method = "post" >
                <h1> ファイト！恐竜育成音読リスト！</h1>
                <div class ="kind">
                タイトル:
                <select name= "kind">
                    <option>タイトルを選んでね！</option>
　　　　　　　　　　　　<?php foreach($class as $value) {
　　　　　　　　　　　　?>
                    <option name= "kind" value= "<?php print $value; ?>" ><?php print $value; ?></option>
　　　　　　　　　　　　<?php                    
                         }
                        ?>
                </select>
                <input type = "submit" name = "submit" value = "go!!" ><br>
                </div>
            </form>
            <div class ="count">
                <?php if (count($data) <= 10): ?>
                    <p><?php print 'たまご！まだまだ頑張れ！' ; ?><br><img src= "tamago.png"></p>
                <?php elseif (count($data) <= 15): ?>
                    <P><?php print '赤ちゃん！ファイト～！' ; ?><br><img src="baby.png"></P>
                <?php elseif (count($data) <= 25): ?>
                    <p><?php print 'キッズ! 引き続き頑張れ！' ; ?><br><img src= "kids.png"></p>
                <?php elseif (count($data) === 50): ?>
                    <p><?php print '大人になりました！頑張ったね' ; ?><br><img src= "big.png" ></p>
                <?php endif ?>
            </div>
            <div class = "kako">
                <p>以下に<?php print '過去の履歴表示' ; ?></p>
            　　<ol>
                    <?php foreach ($data as $value): ?>
                    <li><?php print $value ; ?></li>
                    <?php endforeach ?>
                </ol>
            </div>
        </body>
</html>
