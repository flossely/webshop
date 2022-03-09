<?php
include 'config.php';
$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*.app')));
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>All Applications</title>
<link rel="shortcut icon" href="sys.apps.png?rev=<?=time();?>" type="image/x-icon">
<?php include 'appstyle.php'; ?>
<script src="jquery.js?rev=<?=time();?>"></script>
<script src="base.js?rev=<?=time();?>"></script>
<script>
window.onload = function() {
    document.getElementById('enterSeq').focus();
}
</script>
</head>
<body>
<div class='top'>
<p align="center">
<?php include 'getman.php'; ?>
</p>
</div>
<div class='panel'>
<p align="center">
<?php
foreach ($list as $key=>$value) {
    $fileContent = file_get_contents($value);
    $fileExp = explode('=||=', $fileContent);
    $fileTitle = $fileExp[0];
    $fileIcon = (file_exists($fileExp[1])) ? $fileExp[1] : 'sys.app.png';
    $fileLink = $fileExp[2];
?>
<img class='hover' style="height:15%;position:relative;" title="<?=$fileTitle;?>" onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" src="<?=$fileIcon;?>?rev=<?=time();?>" onclick="<?=$fileLink;?>">
<?php } ?>
<img class='hover' onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" style="height:15%;position:relative;" title="Restart" src="sys.home.png?rev=<?=time();?>" onclick="window.location.href = 'index.php';">
</p>
</div>
<audio id="soundPlayer" <?php if (!$sounds) { ?>muted="muted"<?php } ?>>
</body>
</html>
