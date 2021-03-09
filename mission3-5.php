<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission3-4.3.php</title>
    </head>
    <body>
       
            
       <?php
        $name=$_POST[name];
        $comment=$_POST[comment];
        $dele=$_POST[dele];
        $edinum=$_POST[edinum];
        $edi=$_POST[edi];
        $fname="mission3-4.3.txt";
        if(file_exists($fname)){
        $i=count(file($fname))+1;
        $lines=file($fname,FILE_IGNORE_NEW_LINES);}
        else{$i=1;}
        $date=date("Y年m月d日 H時i分s秒");
        $pass1=$_POST[pass1];
        $pass2=$_POST[pass2];
        $pass3=$_POST[pass3];
        ?>
        
        
        <form action="" method="post">
            名前：<input type="text" name="name" value="<?php 
            if($pass3=="pass3"){
            if($edinum!=""){
        if(file_exists($fname))
        {$lines=file($fname,FILE_IGNORE_NEW_LINES);}
        {foreach($lines as $line){
        $line_array=explode("<>",$line);
        if($line_array[0]==$edinum)
        {$ediname=$line_array[1];
        echo $ediname;
        }}}}}
            ?>"><br>
            コメント：<input type="text" name="comment" value="<?php 
            if($pass3=="pass3"){
            if($edinum!=""){
        if(file_exists($fname))
        {$lines=file($fname,FILE_IGNORE_NEW_LINES);}
        {foreach($lines as $line){
        $line_array=explode("<>",$line);
        if($line_array[0]==$edinum)
        {$edicom=$line_array[2];
        echo $edicom;
        }}}}}
            ?>"><br>
            パスワード：<input type="text" name="pass1">
            <input type="submit" name="sub">
            
            <input type="hidden" name="edi" value="<?php echo $_POST[edinum];?>">
        </form>
        <form action="" method="post">
            削除したい番号：<input type="number" name="dele"><br>
            パスワード：<input type="text" name="pass2">
            <input type="submit" name="sub" value="削除"><br>
        </form>
        <form action="" method="post">
            編集したい番号：<input type="number" name="edinum"><br>
            パスワード：<input type="text" name="pass3">
            <input type="submit" name="sub" value="編集"><br>
            編集対象：<?php if($pass3=="pass3")echo $_POST[edinum];?>
            <input type="hidden" name="edi" value=
            "<?php if($pass3=="pass3")echo $_POST[edinum];?>"><br>
        </form>
        
        
        
        
        <?php
        if(empty($pass3)){}
        elseif($pass3!="pass3"){echo "パスワードが違います<br>";}
        
        if($edi!=""){
         
        if(file_exists($fname)){
        $ftarget=file($fname);
        $ftarget[$edi-1]="$edi<>$name<>$comment<>$date".PHP_EOL;
        // $fnameに$ftarget[?]が書き込まれる。
        // 要するに、$ftarget[$edinumj]の部分だけ書き換わる
        file_put_contents($fname,$ftarget);
        
        }
        }
        
        if(empty($pass2)){}
        elseif($pass2!="pass2"){echo "パスワードが違います<br>";}
        else{
        if($dele!=""){
        $fp=fopen($fname,"w");
        foreach($lines as $line){
        $line_array=explode("<>",$line);
        {if($line_array[0]==$dele){continue;}
        fwrite($fp,$line.PHP_EOL);}}
        fclose($fp);
        }}
        
       
        if(empty($pass1)){}
        elseif($pass1!="pass1"){echo "パスワードが違います<br>";}
        else{
        if($name==""){}
        elseif($comment==""){}
        else{
            $fp=fopen($fname,"a");
            fwrite($fp,"$i<>$name<>$comment<>$date".PHP_EOL);
            fclose($fp);}
        }
            
        if(file_exists($fname))
        {$lines=file($fname,FILE_IGNORE_NEW_LINES);}
        {foreach($lines as $line){
        $line_array=explode("<>",$line);
        echo "$line_array[0] $line_array[1] $line_array[2] $line_array[3]<br>";}}
        
        ?>
    </body>
</html>