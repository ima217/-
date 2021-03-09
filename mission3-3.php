<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission3-4.3.php</title>
    </head>
    <body>
        <form action="" method="post">
            名前：<input type="text" name="name"><br>
            コメント：<input type="text" name="comment"><br>
            削除したい番号：<input type="number" name="dele"><br>
                  <input type="submit" name="sub">
        </form>
        <?php
        $name=$_POST[name];
        $comment=$_POST[comment];
        $dele=$_POST[dele];
        $fname="mission3-3.3.txt";
        if(file_exists($fname)){
        $i=count(file($fname))+1;
        $lines=file($fname,FILE_IGNORE_NEW_LINES);}
        else{$i=1;}
        $date=date("Y年m月d日 H時i分s秒");
        
        if($dele!=""){
        if(file_exists($fname)){
        $ftarget=file($fname);
        $ftarget[$dele-1]="";
        // $fnameに$ftarget[?]が書き込まれる。
        // 要するに、$ftarget[$edinumj]の部分だけ書き換わる
            file_put_contents($fname,$ftarget);}}
        
        if($name==""){}
        elseif($comment==""){}
        else{
            $fp=fopen($fname,"a");
            fwrite($fp,"$i<>$name<>$comment<>$date".PHP_EOL);
            fclose($fp);}
            
        if(file_exists($fname))
        {$lines=file($fname,FILE_IGNORE_NEW_LINES);}
        {foreach($lines as $line){
        $line_array=explode("<>",$line);
        echo "$line_array[0] $line_array[1] $line_array[2] $line_array[3]<br>";}}
        
        ?>
    </body>
</html>
