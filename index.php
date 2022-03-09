<?php
include 'config.php';
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Webshop</title>
<link rel="shortcut icon" href="favicon.png?rev=<?=time();?>" type="image/x-icon">
<?php include 'appstyle.php'; ?>
<script src="jquery.js?rev=<?=time();?>"></script>
<script src="base.js?rev=<?=time();?>"></script>
<script>
window.onload = function() {
    playAudio(soundPlayer, "bootup.flac?rev=<?=time();?>");
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
<img style="height:16%;position:relative;" src="favicon.png?rev=<?=time();?>">
</p>
<h1 align="center">Welcome to Webshop</h1>
<p align="center">
<input type='button' class='actionLineButtonGreen' onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" value='Proceed' onclick="window.location.href = 'apps.php';">
<input type='button' class='actionLineButtonRed' onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" value='Update' onclick="get('i','','from','webshop','','flossely');">
</p>
<p align="center">
<img class='hover' onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" style="height:15%;position:relative;" title="All Applications" src="sys.apps.png?rev=<?=time();?>" onclick="window.location.href = 'apps.php';">
<img class='hover' onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" style="height:15%;position:relative;" title="Installed Packages" src="sys.pkg.png?rev=<?=time();?>" onclick="window.location.href = 'packages.php';">
<img class='hover' onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" style="height:15%;position:relative;" title="Update Webshop" src="sys.upd.png?rev=<?=time();?>" onclick="get('i','','from','webshop','','flossely');">
<img class='hover' onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" style="height:15%;position:relative;" title="Exit" src="sys.exit.png?rev=<?=time();?>" onclick="window.location.href = '../';">
</p>
</div>
<audio id="soundPlayer" <?php if (!$sounds) { ?>muted="muted"<?php } ?>>
</body>
</html>
