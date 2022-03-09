<?php
include 'config.php';
$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*.pkg')));
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Installed Packages</title>
<link rel="shortcut icon" href="sys.pkg.png?rev=<?=time();?>" type="image/x-icon">
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
    $packageID = basename($value, '.pkg');
    $fileTitle = 'Remove: '.$packageID;
    $fileIcon = 'sys.pkg.png';
    $fileLink = "get('d', '', '".$packageID."', 'from', '', 'here');";
?>
<img class='hover' style="height:15%;position:relative;" onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" title="<?=$fileTitle;?>" src="<?=$fileIcon;?>?rev=<?=time();?>" onclick="<?=$fileLink;?>">
<?php } ?>
<img class='hover' style="height:15%;position:relative;" onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" title="Restart" src="sys.home.png?rev=<?=time();?>" onclick="window.location.href = 'index.php';">
</p>
</div>
<audio id="soundPlayer" <?php if (!$sounds) { ?>muted="muted"<?php } ?>>
</body>
</html>
